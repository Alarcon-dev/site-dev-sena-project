<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ResourceController;
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
    Route::get('/destroy/user/{id_user}', 'destroy');
    Route::get('/user/profile/{image_name?}', 'getProfileImage')->name('get.profile');
    Route::get('/user/edit/{id_user}', 'edit');
    Route::post('/update/user/{id_user}', 'update')->name('save.updates');
    Route::get('/user/get/profile/{id_user}', 'getOneProfile');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/create/category', 'create')->name('create_category');
    Route::post('/save/cateory/', 'store')->name('save.category');
    Route::get('/show/categories/list', 'getAllCategories')->name('categories.list');
    Route::get('/edit/categories/{id_category}', 'edit');
    Route::post('/update/categorie/{id_categorie}', 'update');
    Route::get('/delete/categories/{id_category}', 'destroy');
});


Route::controller(PublicationController::class)->group(function () {
    Route::get('/publication/create', 'create')->name('publication.create');
    Route::post('/save/publication', 'store');
    Route::get('/publication/image/{image_name?}', 'getPublicationImage');
    Route::get('/publication/profile/{image_name?}', 'getPublicationProfile');
    Route::get('/edit/publication/{id_publication}', 'edit');
    Route::post('/update/publication/{id_publication}', 'update');
    Route::get('/publication/destroy/{id_publication}', 'destroy');
    Route::get('/publication/list', 'getPublicationsByDate');
    Route::get('/show/publication/{id_user}', 'show');
});


Route::controller(ResourceController::class)->group(function () {
    Route::get('/index/resources', 'create');
    Route::post('/create/resource', 'store');
    Route::get('/resources/library/{id_categorie}', 'library');
    Route::get('/resource/image/{image_name}', 'getResourceImage');
    Route::get('/file/download/{folder}/{file_name?}', 'downloadFile');
    Route::get('/resource/edit/{id_resource}', 'edit');
    Route::post('/resource/update/{id_resource}', 'update');
    Route::get('/resource/delete/{id_resource}', 'destroy');
    Route::get('/resource/list', 'resourcesList');
    Route::get('/resource/detail/{id_resource}', 'show');
});
