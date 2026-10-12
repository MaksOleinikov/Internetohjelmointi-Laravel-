<?php

use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/price', function () {
        return view('price.index');
    })->name('price');

    Route::resource('price', PriceController::class);

});
