<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/tryout', App\Livewire\User\Tryouts::class)->name('tryouts');
Route::get('/tryout/owned', App\Livewire\User\TryoutsOwned::class)->name('tryouts.owned');
Route::get('/bimbel', App\Livewire\User\Bimbels::class)->name('bimbels');
Route::get('/bimbel/owned', App\Livewire\User\BimbelsOwned::class)->name('bimbels.owned');


