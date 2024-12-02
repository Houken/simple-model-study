<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\LineResource;
use App\Models\Book;
use App\Models\Line;
use App\Models\Usage;
use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\CssSelector\Node\FunctionNode;

class LineController extends Controller
{
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
        } else if ($request->wordId) {
            // 絞り込み文字列はないが、wordの指定がある場合
            $words = [];
            $wordId = $request->wordId;
            $word = Word::findOrFail($wordId);
        } else {
            // 絞り込みも指定もない場合
            $words = [];
            $word = [];
        }
        $books = Book::all();
        return Inertia::render('Lines/Create', [
            'books' => $books,
            'words' => $words,
            'word' => $word,
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

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Line $line)
    {
        $line = new LineResource(Line::findOrFail($line->id));

        return Inertia::render('Lines/Show', ['line' => $line]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Line $line)
    {
        //
    }
}
