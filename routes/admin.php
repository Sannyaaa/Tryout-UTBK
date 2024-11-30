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
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionPracticeController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\UniversityDataController;
use App\Http\Controllers\UniversityScraperController;
use App\Http\Controllers\UserController;
use App\Models\ComponentPage;
use Illuminate\Support\Facades\Route;

// Route::get('all-universities',[UniversityController::class,'getAllUniversities'])->name('get-universities');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// ihsan
Route::resource('/tryout', TryoutController::class);
Route::post('/tryout/bulk-delete', [TryoutController::class, 'bulkDelete'])->name('tryout.bulkDelete');
Route::get('/tryout/{tryout}/subcategory/{sub_categories}',[TryoutController::class,'subCategory'])->name('tryout.sub-category');
Route::get('/tryout/{tryout}/subcategory/{sub_categories}/result/{result}',[TryoutController::class,'result'])->name('tryout.result');

Route::get('/tryout/{tryout}/question/create', [TryoutController::class, 'question_create'])->name('tryout.question.create');
Route::post('/tryout/{tryout}/question/', [TryoutController::class, 'question_store'])->name('tryout.question.store');
Route::get('/tryout/{tryout}/question/{question}/edit', [TryoutController::class, 'question_edit'])->name('tryout.question.edit');
Route::put('/tryout/{tryout}/question/{question}', [TryoutController::class, 'question_update'])->name('tryout.question.update');
Route::delete('/tryout/{tryout}/question/{question}', [TryoutController::class, 'question_destroy'])->name('tryout.question.destroy');



Route::resource('/bimbel', BimbelController::class);
Route::post('/bimbel/bulk-delete', [BimbelController::class, 'bulkDelete'])->name('bimbel.bulkDelete');
Route::get('/bimbel/{bimbel}/class/create', [BimbelController::class, 'class_create'])->name('bimbel.class.create');
Route::get('/bimbel/{bimbel}/class/{class_bimbel}/edit', [BimbelController::class, 'class_edit'])->name('bimbel.class.edit');

Route::resource('/class-bimbel', ClassBimbelController::class);
Route::post('/class-bimbel/bulk-delete', [ClassBimbelController::class, 'bulkDelete'])->name('class-bimbel.bulkDelete');

Route::resource('/question-practice', QuestionPracticeController::class);
Route::post('/question-practice/bulk-delete', [QuestionPracticeController::class, 'bulkDelete'])->name('question-practice.bulkDelete');
Route::get('/class-bimbel/{class_bimbel}/question/create', [ClassBimbelController::class, 'question_create'])->name('class.question.create');
Route::get('/class-bimbel/{class_bimbel}/question/{question}/edit', [ClassBimbelController::class, 'question_edit'])->name('class.question.edit');



Route::post('/sub_categories/bulk-delete', [SubCategoriesController::class, 'bulkDelete'])->name('sub_categories.bulkDelete');
Route::resource('/category/sub_categories', SubCategoriesController::class);

Route::post('/question/bulk-delete', [QuestionController::class, 'bulkDelete'])->name('question.bulkDelete');
Route::resource('/question', QuestionController::class);

Route::post('/package_member/bulk-delete', [PackageMemberController::class, 'bulkDelete'])->name('package_member.bulkDelete');
Route::resource('/package_member', PackageMemberController::class);

Route::post('/category/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('category.bulkDelete');
Route::resource('/category', CategoryController::class);

Route::get('/page/home', [PageController::class,'homePage'])->name('home-page');
Route::put('/page/edit-home/{id}', [PageController::class,'editHomePage'])->name('edit-home-page');
Route::post('/page/create-home', [PageController::class,'createHomePage'])->name('create-home-page');

Route::get('/page/component', [PageController::class, 'componentPage'])->name('component-page');
Route::put('/page/component/{id}', [PageController::class, 'componentUpdate'])->name('edit-component-page');
Route::post('/page/component', [PageController::class, 'componentStore'])->name('create-component-page');

Route::resource('combined-categories', CombinedCategoriesController::class);
Route::get('/admin/combined-categories/{id}/edit', [CombinedCategoriesController::class, 'edit'])
    ->name('admin.combined-categories.edit');

Route::get('/get-provinsi', [ProfileController::class, 'getProvinsi'])->name('get-provinsi');
Route::get('/get-kabupaten/{provinsi}', [ProfileController::class, 'getKabupaten'])->name('get-kabupaten');
Route::get('/get-sekolah/{provinsi}/{kabupaten}', [ProfileController::class, 'getSekolah'])->name('get-sekolah');
// Route::get('api/sekolah/{id}', [ProfileController::class, 'getSekolah']);

// Route::get('/fetch-universities', [UniversityScraperController::class, 'fetchUniversities']);
// Route::get('/fetch-study-programs', [UniversityScraperController::class, 'fetchStudyPrograms']);

// hasan


Route::resource('/user', UserController::class);
Route::post('/user/bulk-delete', [UserController::class, 'bulkDelete'])->name('user.bulkDelete');

Route::resource('/discount', DiscountController::class);
Route::post('/discount/bulk-delete', [DiscountController::class, 'bulkDelete'])->name('discount.bulkDelete');


Route::resource('/order', OrderController::class);
Route::post('/order/bulk-delete', [OrderController::class, 'bulkDelete'])->name('order.bulkDelete');

Route::resource('/testimonial', TestimonialController::class);
Route::post('/testimonial/bulk-delete', [TestimonialController::class, 'bulkDelete'])->name('testimonial.bulkDelete');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');