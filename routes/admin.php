<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\UniversityController;
=======
use App\Http\Controllers\TryoutController;
>>>>>>> 1b6075ba1ca0a59e697d8090482f97ebebafb452
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




require __DIR__.'/auth.php';


// hasan