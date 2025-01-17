<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MediaController;

// Route naar de standaard welkomspagina
Route::get('/', function () {
    return view('welcome');
});

// Routes voor actors
Route::resource('actors', ActorController::class);

// Routes voor media (films/series)
Route::resource('media', MediaController::class);

// Optionele zoekfunctie
Route::get('search', [MediaController::class, 'search'])->name('media.search');

