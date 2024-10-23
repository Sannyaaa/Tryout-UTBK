<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/tryouts', App\Livewire\User\Tryouts::class)->name('user.tryouts');
Route::get('/tryouts/owned', App\Livewire\User\Tryouts::class)->name('user.tryouts.owned');
Route::get('/tryouts', App\Livewire\User\Tryouts::class)->name('user.bimbels');
Route::get('/tryouts/owned', App\Livewire\User\Tryouts::class)->name('user.tryouts.owned');


