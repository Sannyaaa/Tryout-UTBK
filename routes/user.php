<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/tryout', App\Livewire\User\Tryouts::class)->name('tryouts');
Route::get('/tryout/owned', App\Livewire\User\TryoutsOwned::class)->name('tryouts.owned');
Route::get('/tryout/item/{id}', App\Livewire\User\Tryout\Item::class)->name('tryouts.item');
Route::get('/tryout/item/{id}/{paper}', App\Livewire\User\Tryout\Paper::class)->name('tryouts.paper');
Route::get('/tryout/item/question', App\Livewire\User\Tryout\Question::class)->name('tryouts.question');
Route::get('/event/tryout', App\Livewire\User\Tryout\Event::class)->name('tryouts.event');
Route::get('/bimbel', App\Livewire\User\Bimbel\All::class)->name('bimbels');
Route::get('/bimbel/{id}', App\Livewire\User\Bimbel\Item::class)->name('bimbels.item');

// Route::get('/bimbel', App\Livewire\User\Bimbels::class)->name('bimbels');
// Route::get('/bimbel/owned', App\Livewire\User\BimbelsOwned::class)->name('bimbels.owned');

