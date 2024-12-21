<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = WordResource::collection(Word::paginate(15));
        return Inertia::render('Words/Index', [
            'words' => $words,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $previous = $request->query('previous');
        $bookId = $request->query('bookId');
        $indexNo = $request->query('indexNo');
        $fromLinesCreate = $request->query('fromLinesCreate');
        if ($fromLinesCreate) {
            $nameOfPreviousRoute = 'lines.create';
        } else {
            $nameOfPreviousRoute = 'words.index';
        }
        $listOfPartOfSpeech = $this->getListOfPoses();
        return Inertia::render('Words/Create', [
            'list_of_part_of_speech' => $listOfPartOfSpeech,
            'previousUrl' => $previous,
            'nameOfPreviousRoute' => $nameOfPreviousRoute,
            'bookId' => $bookId,
            'indexNo' => $indexNo,
        ]);
    }

    public function getListOfPoses()
    {
        $theList = Word::select('part_of_speech')->distinct()->pluck('part_of_speech');

        return $theList;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request)
    {
        $nameToReturn = $request->nameOfPreviousRoute;
        // dd($nameToReturn);
        $bookId = $request->bookId;
        $indexNo = $request->indexNo;
        // dd($request);
        $validated = [
            'english' => $request->english,
            'part_of_speech' => $request->part_of_speech,
        ];
        // $previousUrl = $request->previous;
        $word = Word::create($validated);
        // $redirectTo = $previousUrl ?? '/dashboard';
        $newWordId = $word->id;
        $message =  '新しい単語が保存されました。';

        // return redirect()
        //     ->to($redirectTo)
        //     ->with('message', $message)
        //     ->with('newWordId', $newWordId);
        return to_route($nameToReturn, [
            'nextBookId' => $bookId,
            'nextIndexNo' => $indexNo,
            'newWordId' => $newWordId,
        ])->with($message);
    }

    public function storeFromCreateLine(StoreWordRequest $request)
    {
        $word = Word::create([
            'english' => $request->english,
            'part_of_speech' => $request->part_of_speech,
        ]);

        $newWordId = $word->id;
        $message = '新しい単語が保存されました。';

        return redirect()->route('lines.create', [
            'newWordId' => $newWordId,
            'nextBookId' => $request->nextBookId,
            'nextIndexNo' => $request->nextIndexNo,
        ])->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        //
    }
}
