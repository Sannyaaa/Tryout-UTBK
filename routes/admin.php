<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\ClassBimbelController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('all-universities',[UniversityController::class,'getAllUniversities'])->name('get-universities');

// ihsan
Route::post('/tryout/bulk-delete', [TryoutController::class, 'bulkDelete'])->name('tryout.bulkDelete');
Route::resource('/tryout', TryoutController::class);
Route::post('/batch/bulk-delete', [BatchController::class, 'bulkDelete'])->name('batch.bulkDelete');
Route::resource('/bimbel', BimbelController::class);
Route::post('/bimbel/bulk-delete', [BimbelController::class, 'bulkDelete'])->name('bimbel.bulkDelete');
Route::resource('/batch', BatchController::class);
Route::post('/sub_categories/bulk-delete', [SubCategoriesController::class, 'bulkDelete'])->name('sub_categories.bulkDelete');
Route::resource('/sub_categories', SubCategoriesController::class);





// hasan

Route::resource('/class-bimbel', ClassBimbelController::class);
Route::post('/class-bimbel/bulk-delete', [ClassBimbelController::class, 'bulkDelete'])->name('class-bimbel.bulkDelete');
Route::resource('/user', UserController::class);
Route::post('/user/bulk-delete', [UserController::class, 'bulkDelete'])->name('user.bulkDelete');