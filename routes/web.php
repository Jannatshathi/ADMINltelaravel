<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HelperTestController;
use App\Http\Controllers\imageuploadController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//student
Route::resource('/student',StudentController::class);

Route::group(['middleware' => ['auth','verified', 'admin']], function () {
    Route::get('/admin',function(){
        return 'admin';
    });
});


Route::group(['prefix'=>'admin', 'middleware' =>['auth','admin']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

});

Route::group(['prefix'=>'user', 'middleware' =>['auth','user']], function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

});

//helper
Route::get('/test-helper',[HelperTestController::class,'checkhelper']);

//multi image
Route::get('/image', [StudentController::class, 'multiImage'])->name('image');
Route::post('/image/store', [StudentController::class, 'storeImage'])->name('store.image');
//drag cand drop
Route::resource('/file',imageuploadController::class);
