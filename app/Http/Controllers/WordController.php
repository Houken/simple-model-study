<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use App\Models\Word;
use Inertia\Inertia;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Words/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request)
    {
        // dd($request);
        $validated = [
            'english' => $request->english,
            'part_of_speech' => $request->part_of_speech,
        ];
        $word = Word::create($validated);
        // dd($word);
        $redirectTo = session()->get('redirect_to') ?? '/dashboard';
        $newWordId = $word->id;

        return redirect($redirectTo)->with([
            'success' => '新しい単語が保存されました。',
            'new_word_id' => $newWordId,
        ]);
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
