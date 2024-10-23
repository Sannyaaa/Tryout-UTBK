<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\SubCategoriesController;
=======
<<<<<<< HEAD
use App\Http\Controllers\UniversityController;
=======
>>>>>>> 7c20bc0c6de23e33d1277eed79f1858af989d92b
use App\Http\Controllers\TryoutController;
>>>>>>> 1b6075ba1ca0a59e697d8090482f97ebebafb452
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('all-universities',[UniversityController::class,'getAllUniversities'])->name('get-universities');

// ihsan
Route::post('/tryout/bulk-delete', [TryoutController::class, 'bulkDelete'])->name('tryout.bulkDelete');
Route::resource('/tryout', TryoutController::class);
Route::post('/batch/bulk-delete', [BatchController::class, 'bulkDelete'])->name('batch.bulkDelete');
Route::resource('/batch', BatchController::class);
Route::post('/sub_categories/bulk-delete', [SubCategoriesController::class, 'bulkDelete'])->name('sub_categories.bulkDelete');
Route::resource('/sub_categories', SubCategoriesController::class);




require __DIR__.'/auth.php';


// hasan