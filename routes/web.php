<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\WordController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/lines/reorder-test', [LineController::class, 'reorderTest'])->name('lines.reorderTest');
    Route::get('/lines/create', [LineController::class, 'create'])->name('lines.create');
    Route::resource('/lines', LineController::class)->except(['create']);
    // Route::get('/words/create', function () {
    //     session(['redirect_to' => url()->previous()]);
    //     return app(WordController::class)->create();
    // })->name('words.create');
    Route::put('/word/store-from-line', [WordController::class, 'storeFromCreateLine'])->name('word.storeFromLine');
    Route::resource('/words', WordController::class);
    // ->except(['create']);
    Route::resource('/books', BookController::class)->except(['create']);
    Route::get('/usages/order-test-list', [UsageController::class, 'showOrderTestList'])->name('usages.orderTestList');
    Route::resource('/usages', UsageController::class)->except(['create']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
