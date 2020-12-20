<?php

use App\Http\Livewire\Collaborators;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/collaborators', Collaborators::class);
