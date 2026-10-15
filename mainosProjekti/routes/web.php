<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

// Julkiset sivut
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/palaute', [FeedbackController::class, 'create'])->name('feedback.create');

// Vain kirjautuneille
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('price', PriceController::class);
    Route::resource('feedback', FeedbackController::class)->except(['create', 'store']);
});
