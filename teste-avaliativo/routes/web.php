<?php

use App\Http\Controllers\PollController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('polls', PollController::class);
Route::post('polls/{poll}/vote', [PollController::class, 'vote'])->name('polls.vote');
Route::get('/polls/{poll}/edit', [PollController::class, 'edit'])->name('polls.edit');
Route::put('/polls/{poll}', [PollController::class, 'update'])->name('polls.update');
Route::delete('/polls/{poll}', [PollController::class, 'destroy'])->name('polls.destroy');
