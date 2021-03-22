<?php

use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Support\Facades\Route;


Route::prefix('notes')->group(function () {
    Route::post('create-new-note', [NoteController::class, 'store']);
});

Route::prefix('subjects')->group(function () {
    Route::get('', [SubjectController::class, 'index']);
});
