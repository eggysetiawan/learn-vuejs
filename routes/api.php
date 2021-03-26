<?php

use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Support\Facades\Route;


Route::prefix('notes')->group(function () {
    Route::post('create-new-note', [NoteController::class, 'store']);
    Route::get('', [NoteController::class, 'index'])->name('notes.index');
    Route::get('{note:slug}', [NoteController::class, 'show'])->name('notes.show');
    Route::patch('{note:slug}/edit', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('{note:slug}/delete', [NoteController::class, 'destroy'])->name('notes.destroy');
});

Route::prefix('subjects')->group(function () {
    Route::get('', [SubjectController::class, 'index']);
});
