<?php

use App\Livewire\User\Package\All;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Livewire\User\Owned\All as OwnedAll;
use App\Livewire\User\Payment\Success;

Route::get('/tryout', App\Livewire\User\Tryouts::class)->name('tryouts');
// Route::get('/tryout/owned', App\Livewire\User\TryoutsOwned::class)->name('tryouts.owned');
Route::get('/tryout/item/{id}', App\Livewire\User\Tryout\Item::class)->name('tryouts.item');
Route::get('/tryout/item/{id}/{paper}', App\Livewire\User\Tryout\Paper::class)->name('tryouts.paper');
Route::get('/tryout/item/question', App\Livewire\User\Tryout\Question::class)->name('tryouts.question');
Route::get('/tryout/results/{id}', App\Livewire\User\Tryout\Results::class)->name('tryouts.results');
Route::get('/event/tryout', App\Livewire\User\Tryout\Event::class)->name('tryouts.event');
Route::get('/paket', All::class)->name('packages');
Route::get('/paket/{id}', App\Livewire\User\Package\Item::class)->name('package.item');

Route::get('/paketku', App\Livewire\User\Owned\All::class)->name('my-packages');
Route::get('/paketku/{id}/bimbel', App\Livewire\User\Owned\Bimbels::class)->name('my-bimbel');

// Route::get('/bimbel', App\Livewire\User\Bimbels::class)->name('bimbels');
// Route::get('/bimbel/owned', App\Livewire\User\BimbelsOwned::class)->name('bimbels.owned');

// Callback routes dari Midtrans
Route::get('/payment/finish/{invoice}', [PaymentController::class, 'finish'])
    ->name('payment.finish');

Route::get('/payment/unfinish/{invoice}', [PaymentController::class, 'unfinish'])
    ->name('payment.unfinish');

Route::get('/payment/error/{invoice}', [PaymentController::class, 'error'])
    ->name('payment.error');

Route::get('/payment/success/{invoice}', Success::class)
    ->name('payment.success');
