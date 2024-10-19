<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TryoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/gatau', function () {
    return 'gatau';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

Route::
// middleware(['auth:sanctum', 'IsAdmin'])->
prefix('/admin')->name('admin.')->group(function() {
    require __DIR__.'/admin.php';
});

Route::
// middleware(['auth:sanctum'])->
prefix('/user')->name('user.')->group(function() {
    require __DIR__.'/user.php';
});
