<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Storage;

// --------------------------------------------------------------------------
// Web Routes
// --------------------------------------------------------------------------

// --------------------------------------------------------------------------
// Landing
// --------------------------------------------------------------------------
Route::get('/', [MoviesController::class, 'index']);

// --------------------------------------------------------------------------
// Detail
// --------------------------------------------------------------------------
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

// --------------------------------------------------------------------------
// Upload & Stream
// --------------------------------------------------------------------------
Route::get('/player/{id}', [MoviesController::class, 'stream']);
Route::post('upload/{movieID}', [UploadController::class, 'store']);
Route::get('/stream/{filename}', [Raju\Streamer\Controllers\StreamController::class, 'stream'])->name('stream');
