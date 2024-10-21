<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('all-universities',[UniversityController::class,'getAllUniversities'])->name('get-universities');


