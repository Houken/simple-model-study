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

Route::get('/test-word-ej', [LineController::class, 'standardTest'])->name('test.word.ej');
Route::get('/test-word-je', [LineController::class, 'standardTestJe'])->name('test.word.je');
Route::get('/test-usage-ej', [LineController::class, 'usagesTest'])->name('test.usage.ej');

// Route::get('/test-word-ej', [LineController::class, 'standardTest'])->name('testWordEj');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/lines/neo-show/{line}', [LineController::class, 'neoShow'])->name('lines.neoShow');

    Route::get('/tests', function () {
        return Inertia::render('Tests');
    })->name('tests');
    Route::get('/lines/final-check', [LineController::class, 'finalCheck'])->name('lines.finalCheck');
    Route::get('/lines/reorder-test', [LineController::class, 'reorderTest'])->name('lines.reorderTest');
    Route::get('/lines/standard-test', [LineController::class, 'standardTest'])->name('lines.standardTest');
    // /lines/neo-show/{id}にアクセスがあったら、LineControllerのneoShowメソッドを実行して一つのLineインスタンスを表示する
    Route::resource('/lines', LineController::class);
    // Route::get('/words/create', function () {
    //     session(['redirect_to' => url()->previous()]);
    //     return app(WordController::class)->create();
    // })->name('words.create');
    Route::put('/words/store-from-line', [WordController::class, 'storeFromCreateLine'])->name('words.storeFromLine');
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
