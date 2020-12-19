<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollaboratorController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/collaborators', [CollaboratorController::class, 'index'])->name('collaborators.index');
