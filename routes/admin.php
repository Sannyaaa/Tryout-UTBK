<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TryoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('settings',[ProfileController::class])

// ihsan
Route::resource('/tryout', TryoutController::class);
// Route::delete('/tryout/bulk-delete', [TryoutController::class, 'bulkDelete'])->name('admin.tryout.bulkDelete');




require __DIR__.'/auth.php';


// hasan