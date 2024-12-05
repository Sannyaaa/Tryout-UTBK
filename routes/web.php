<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UniversityController;

// Route::get('/', function (){
//     return view('index');
// });

Route::get('/', [LandingController::class, 'home'])->name('home-page');
Route::get('/mentor', [LandingController::class, 'mentor'])->name('mentor-page');
Route::get('/package', [LandingController::class, 'package'])->name('package-page');
Route::get('/package-item/{id}', [LandingController::class, 'packageDetail'])->name('detail-package-page');

Route::get('/test', function () {
    return view('test');
});

Route::get('/gatau', function () {
    return 'gatau';
});

Route::get('/dashboard-proccess', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard-mentor', [DashboardController::class,'index_mentor'])->middleware(['auth', 'verified'])->name('dashboard-mentor');


Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    // Route::put('/profile/password/{user}', [ProfileController::class, 'update_profile'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';


Route::
middleware(['auth','role:admin'])->
prefix('/admin')->name('admin.')->group(function() {
    require __DIR__.'/admin.php';
});

Route::
middleware(['auth','role:mentor'])->
prefix('/mentor')->name('mentor.')->group(function() {
    require __DIR__.'/mentor.php';
});

Route::
middleware(['auth'])->
name('user.')->group(function() {
    require __DIR__.'/user.php';
});
