<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TryoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('all-universities',[UniversityController::class,'getAllUniversities'])->name('get-universities');

// ihsan
Route::resource('/tryout', TryoutController::class);
Route::resource('/batch', BatchController::class);
Route::post('/tryout/bulk-delete', [TryoutController::class, 'bulkDelete'])->name('tryout.bulkDelete');
Route::post('/batch/bulk-delete', [BatchController::class, 'bulkDelete'])->name('batch.bulkDelete');
Route::resource('/bimbel', BimbelController::class);
Route::post('/bimbel/bulk-delete', [BimbelController::class, 'bulkDelete'])->name('bimbel.bulkDelete');





// hasan