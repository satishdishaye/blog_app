<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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
    return view('user-login');
});


Route::get('login',[UserController::class ,'login'])->name('user-login');
Route::post('login-post',[UserController::class ,'loginPost'])->name('user-login-post');
Route::get('register',[UserController::class ,'register'])->name('user-register');
Route::post('register',[UserController::class ,'registerPost'])->name('user-register-post');


Route::group(['middleware' => ['userAuth']], function() { 

    Route::get('Home-page',[UserController::class ,'homepage'])->name('user-homepage');
    Route::get('my-post',[UserController::class ,'myPost'])->name('my-post'); 
    Route::get('create-post',[UserController::class ,'createPost'])->name('create-post');
    Route::post('add-create-post',[UserController::class ,'addCreatePost'])->name('add-create-post');
    Route::get('logout',[UserController::class ,'logout'])->name('logout');

});
Route::get('delete-post/{id}',[UserController::class ,'deletePost'])->name('delete-post');
Route::get('get-edit-post/{id}',[UserController::class ,'editPost'])->name('edit-post');
Route::post('edit-post/{id}',[UserController::class ,'saveEditPost'])->name('save-edit-post');

Route::get('admin-login',[AdminController::class ,'Adminlogin'])->name('admin-login');
Route::post('admin-login-post',[AdminController::class ,'adminLoginPost'])->name('admin-login-post');

Route::group(['middleware' => ['adminAuth']], function() { 
    Route::get('admin-home',[AdminController::class ,'adminHome'])->name('admin-home');
    Route::get('all-users',[AdminController::class ,'allUsers'])->name('all-users');
    Route::get('block-user/{id}',[AdminController::class ,'blockUser'])->name('block-user');
    Route::get('block-post/{id}',[AdminController::class ,'blockPost'])->name('block-post');
    Route::get('admin-logout',[AdminController::class ,'adminLogout'])->name('admin-logout');

});


