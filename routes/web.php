<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
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
// middleware(['auth:sanctum', 'IsAdmin'])->
prefix('/mentor')->name('mentor.')->group(function() {
    require __DIR__.'/mentor.php';
});

Route::
// middleware(['auth:sanctum'])->
prefix('/user')->name('user.')->group(function() {
    require __DIR__.'/user.php';
});
