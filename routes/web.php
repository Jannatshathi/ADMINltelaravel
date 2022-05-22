<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HelperTestController;
use App\Http\Controllers\imageuploadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;

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
    Debugbar::start_measure('getUser','Time for getting user');
    $users = User::all();

    Debugbar::stop_measure('getUser');
    // Debugbar::error($user);
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//admin
Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::view('/login','admin.login')->name('admin.login');
        Route::post('/login',[AdminController::class, 'authenticate'])->name('admin.auth');
    });
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard',[DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/profile_setting',[DashboardController::class, 'profile_setting'])->name('admin.profile_setting');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

//student
Route::resource('/student',StudentController::class);

Route::group(['middleware' => ['auth','verified', 'admin']], function () {
    Route::get('/admin',function(){
        return 'admin';
    });
});
//teacher
Route::group(['prefix' => 'teacher'], function() {
    Route::group(['middleware' => 'teacher.guest'], function(){
        Route::view('/login','teacher.login')->name('teacher.login');
        Route::post('/login',[TeacherController::class, 'authenticate'])->name('teacher.auth');
    });
    Route::group(['middleware' => 'teacher.auth'], function(){
        Route::get('/dashboard',[DashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
        Route::get('/profile_setting',[DashboardController::class, 'profile_setting'])->name('teacher.profile_setting');
        Route::get('/logout', [TeacherController::class, 'logout'])->name('teacher.logout');
    });
});

/*Route::group(['prefix'=>'admin', 'middleware' =>['auth','admin']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

});*/

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
