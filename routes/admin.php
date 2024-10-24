<?php

use App\Http\Controllers\BatchController;
<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
=======
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\ClassBimbelController;
>>>>>>> 0ee0fed27236126430bd8cf548eb4333e56f7280
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TryoutController;
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

Route::post('/question/bulk-delete', [QuestionController::class, 'bulkDelete'])->name('question.bulkDelete');
Route::resource('/question', QuestionController::class);





// hasan

Route::resource('/class-bimbel', ClassBimbelController::class);
Route::post('/class-bimbel/bulk-delete', [ClassBimbelController::class, 'bulkDelete'])->name('class-bimbel.bulkDelete');