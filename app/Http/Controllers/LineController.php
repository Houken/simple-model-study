<?php

namespace App\Http\Controllers;

use App\Helpers\RouteHelper;
use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\LineResource;
use App\Models\Book;
use App\Models\Line;
use App\Models\Usage;
use App\Models\Word;
use App\Traits\HasPreviousRouteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use LengthException;
use Symfony\Component\CssSelector\Node\FunctionNode;

class LineController extends Controller
{
    use HasPreviousRouteInfo;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $linesQuery = Line::bookFilter($request);
        $wordFilter = $request->wordFilter;
        $this->applyLineFilterByWord($linesQuery, $wordFilter);
        $lines = LineResource::collection($linesQuery->paginate(15));
        $books = BookResource::collection(Book::all());
        // dd($lines);
        return Inertia::render('Lines/Index', [
            'lines' => $lines,
            'books' => $books,
        ]);
    }

    protected function applyLineFilterByWord($query, $search)
    {
        return $query->whereHas('word', function ($query) use ($search) {
            if ($search) {
                $query->whereLike('english', "$search%");
            }
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        if ($request->wordFilter) {
            // wordsの絞り込み文字列がある場合
            $wordsQuery = Word::query();
            $wordFilter = $request->wordFilter;
            $this->applyWordFilter($wordsQuery, $wordFilter);
            $words = $wordsQuery->limit(10)->get();
            $word = [];
        } else if ($request->newWordId) {
            // 絞り込み文字列はないが、wordの指定がある場合
            $words = [];
            $wordId = $request->newWordId;
            $word = Word::findOrFail($wordId);
        } else {
            // 絞り込みも指定もない場合
            $words = [];
            $word = [];
        }
        $books = Book::all();
        $nextBookId = $request->nextBookId ? intval($request->nextBookId) : 0;
        $nextIndexNo = $request->nextIndexNo ? intval($request->nextIndexNo) : 0;
        $wordController = new WordController();
        $listOfPoses = $wordController->getListOfPoses();
        return Inertia::render('Lines/Create', [
            'books' => $books,
            'words' => $words,
            'word' => $word,
            'nextBookId' => $nextBookId,
            'nextIndexNo' => $nextIndexNo,
            'listOfPoses' => $listOfPoses,
        ]);
    }

    public function recreate(Request $request)
    {
        // 遷移元を取得
        $previousRouteAndParams = $this->getPreviousRouteAndParams();
        // Booksドロップダウン用のデータを用意
        $books = Book::all();
        // 新規word作成用の品詞リストを用意
        $wordController = new WordController;
        $listOfPoses = $wordController->getListOfPoses();
        // Create Next用のprop
        $nextBookId = intval($request->nextBookId) ?? null;
        $nextIndexNo = intval($request->nextIndexNo) ?? null;

        // wordの絞り込み処理
        if ($request->wordFilter) {
            $wordsQuery = Word::query();
            $wordFilter = $request->wordFilter;
            $this->applyWordFilter($wordsQuery, $wordFilter);
            $words = $wordsQuery->limit(10)->get();
        } else {
            $words = [];
        }

        return Inertia::render('Lines/Recreate', [
            'books' => $books,
            'listOfPoses' => $listOfPoses,
            'words' => $words,
            'nextBookId' => $nextBookId,
            'nextIndexNo' => $nextIndexNo,
            'previousRouteAndParams' => $previousRouteAndParams,
        ]);
    }

    protected function applyWordFilter($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            if ($search) {
                $query->whereLike('english', "$search%");
            }
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLineRequest $request)
    {
        $line = new Line();
        $line->fill([
            'book_id' => $request->book_id,
            'word_id' => $request->word_id,
            'index_no' => $request->index_no,
            'definition' => $request->definition,
        ]);
        $usages = $request->usages;

        $line->save();
        if ($usages) {
            foreach ($usages as $usageData) {
                $usage = new Usage($usageData);
                $usage->line()->associate($line); // Lineと関連付ける
                $usage->save();
            }
        }

        return redirect()->route('lines.show', ['line' => $line]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Line $line)
    {
        $line = new LineResource(Line::findOrFail($line->id));
        $bookId = $line->book_id;
        $nextIndex = $line->index_no + 1;
        $nextLineExists = Line::where('book_id', $bookId)->where('index_no', $nextIndex)->exists();

        return Inertia::render('Lines/Show', ['line' => $line, 'nextLineExists' => $nextLineExists]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Line $line)
    {
        $line = new LineResource(Line::findOrFail($line->id));
        $books = BookResource::collection(Book::all());

        return Inertia::render('Lines/Edit', ['line' => $line, 'books' => $books,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLineRequest $request, Line $line)
    {
        try {
            DB::transaction(function () use ($request, $line) {
                // Lineの更新
                $line->update([
                    'book_id' => $request->book_id,
                    'word_id' => $request->word_id,
                    'index_no' => $request->index_no,
                    'definition' => $request->definition,
                ]);

                // Usageの更新
                $this->updateLineUsages($line, $request->usages);
            });

            session()->flash('message', 'Lineを更新しました。');
            return to_route('lines.show', $line)
                ->with('message', 'Lineを更新しました。');
        } catch (\Throwable $th) {
            session()->flash('error', 'Lineの更新に失敗しました。');
            return redirect(route('lines.index'));
        }
    }

    public function updateLineUsages(Line $line, array $usages)
    {
        // dd($line, $usages);
        foreach ($usages as $usage) {
            if (!isset($usage['id'])) {
                // 新規追加
                $line->usages()->create([
                    'example' => $usage['example'],
                    'translation' => $usage['translation'],
                ]);
            } else {
                // 既存レコードの更新
                Usage::where('id', $usage['id'])
                    ->update([
                        'example' => $usage['example'],
                        'translation' => $usage['translation'],
                    ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Line $line)
    {
        //
    }
}
