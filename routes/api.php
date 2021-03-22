<?php

use App\Http\Controllers\Api\NoteController;
use Illuminate\Support\Facades\Route;


Route::prefix('notes')->group(function () {
    Route::post('create-new-note', [NoteController::class, 'store']);
});
