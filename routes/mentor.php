<?php

use App\Http\Controllers\BimbelController;
use App\Http\Controllers\ClassBimbelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionPracticeController;
use Illuminate\Support\Facades\Route;

Route::resource('/bimbel', BimbelController::class);
Route::post('/bimbel/bulk-delete', [BimbelController::class, 'bulkDelete'])->name('bimbel.bulkDelete');
Route::get('/bimbel/{bimbel}/class/create', [BimbelController::class, 'class_create'])->name('bimbel.class.create');
Route::get('/bimbel/{bimbel}/class/{class_bimbel}/edit', [BimbelController::class, 'class_edit'])->name('bimbel.class.edit');

Route::resource('/class-bimbel', ClassBimbelController::class);
Route::post('/class-bimbel/bulk-delete', [ClassBimbelController::class, 'bulkDelete'])->name('class-bimbel.bulkDelete');

Route::resource('/question-practice', QuestionPracticeController::class);
Route::post('/question/bulk-delete', [QuestionPracticeController::class, 'bulkDelete'])->name('question-practice.bulkDelete');
Route::get('/class-bimbel/{class_bimbel}/question/create', [ClassBimbelController::class, 'question_create'])->name('class.question.create');
Route::get('/class-bimbel/{class_bimbel}/question/{question}/edit', [ClassBimbelController::class, 'question_edit'])->name('class.question.edit');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
// Route::put('/profile/password/{user}', [ProfileController::class, 'update_profile'])->name('password.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
