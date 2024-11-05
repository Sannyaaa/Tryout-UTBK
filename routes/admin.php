<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\BimbelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassBimbelController;
use App\Http\Controllers\CombinedCategoriesController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageMemberController;
use App\Http\Controllers\QuestionPracticeController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\UniversityDataController;
use App\Http\Controllers\UniversityScraperController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('all-universities',[UniversityController::class,'getAllUniversities'])->name('get-universities');

// ihsan
Route::post('/tryout/bulk-delete', [TryoutController::class, 'bulkDelete'])->name('tryout.bulkDelete');
Route::resource('/tryout', TryoutController::class);

Route::get('/tryout/{tryout}/question/create', [TryoutController::class, 'question_create'])->name('tryout.question.create');
Route::post('/tryout/{tryout}/question/', [TryoutController::class, 'question_store'])->name('tryout.question.store');
Route::get('/tryout/{tryout}/question/{question}/edit', [TryoutController::class, 'question_edit'])->name('tryout.question.edit');
Route::put('/tryout/{tryout}/question/{question}', [TryoutController::class, 'question_update'])->name('tryout.question.update');
Route::delete('/tryout/{tryout}/question/{question}', [TryoutController::class, 'question_destroy'])->name('tryout.question.destroy');

Route::resource('/bimbel', BimbelController::class);
Route::post('/bimbel/bulk-delete', [BimbelController::class, 'bulkDelete'])->name('bimbel.bulkDelete');
Route::get('/bimbel/{bimbel}/class/create', [BimbelController::class, 'class_create'])->name('bimbel.class.create');
Route::get('/bimbel/{bimbel}/class/{class_bimbel}/edit', [BimbelController::class, 'class_edit'])->name('bimbel.class.edit');

Route::post('/sub_categories/bulk-delete', [SubCategoriesController::class, 'bulkDelete'])->name('sub_categories.bulkDelete');
Route::resource('/category/sub_categories', SubCategoriesController::class);

Route::post('/question/bulk-delete', [QuestionController::class, 'bulkDelete'])->name('question.bulkDelete');
Route::resource('/question', QuestionController::class);

Route::post('/package_member/bulk-delete', [PackageMemberController::class, 'bulkDelete'])->name('package_member.bulkDelete');
Route::resource('/package_member', PackageMemberController::class);

Route::post('/category/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('category.bulkDelete');
Route::resource('/category', CategoryController::class);

Route::resource('combined-categories', CombinedCategoriesController::class);
Route::get('/admin/combined-categories/{id}/edit', [CombinedCategoriesController::class, 'edit'])
    ->name('admin.combined-categories.edit');



Route::get('/fetch-universities', [UniversityScraperController::class, 'fetchUniversities']);
Route::get('/fetch-study-programs', [UniversityScraperController::class, 'fetchStudyPrograms']);






// hasan

Route::resource('/class-bimbel', ClassBimbelController::class);
Route::post('/class-bimbel/bulk-delete', [ClassBimbelController::class, 'bulkDelete'])->name('class-bimbel.bulkDelete');

Route::resource('/user', UserController::class);
Route::post('/user/bulk-delete', [UserController::class, 'bulkDelete'])->name('user.bulkDelete');

Route::resource('/discount', DiscountController::class);
Route::post('/discount/bulk-delete', [DiscountController::class, 'bulkDelete'])->name('discount.bulkDelete');

Route::resource('/question-practice', QuestionPracticeController::class);
Route::post('/question/bulk-delete', [QuestionPracticeController::class, 'bulkDelete'])->name('question.bulkDelete');
Route::get('/class-bimbel/{class_bimbel}/question/create', [ClassBimbelController::class, 'question_create'])->name('class.question.create');
Route::get('/class-bimbel/{class_bimbel}/question/{question}/edit', [ClassBimbelController::class, 'question_edit'])->name('class.question.edit');

Route::resource('/order', OrderController::class);
Route::post('/order/bulk-delete', [OrderController::class, 'bulkDelete'])->name('order.bulkDelete');
