<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::get('/all/users', 'getAllusers')->name('all.users');
    Route::get('/destroy/user/{id_user}', 'user')->name('destroy.user');
    Route::get('/user/profile/{image_name?}', 'getProfileImage')->name('get.profile');
    Route::get('/user/edit/{id_user}', 'edit');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/create/category', 'create')->name('create_category');
    Route::post('/save/cateory/', 'store')->name('save.category');
});
