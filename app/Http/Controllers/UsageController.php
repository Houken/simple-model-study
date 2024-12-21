<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsageRequest;
use App\Http\Requests\UpdateUsageRequest;
use App\Models\Usage;
use Inertia\Inertia;

class UsageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usage $usage)
    {
        //
    }

    public function showOrderTestList()
    {
        $usages = Usage::paginate(15);
        return Inertia::render('Usages/OrderTest', [
            'usages' => $usages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usage $usage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsageRequest $request, Usage $usage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usage $usage)
    {
        //
    }
}
