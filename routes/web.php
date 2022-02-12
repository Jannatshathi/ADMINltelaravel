<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

// Route::get('/student/create',[StudentController::class, 'create'])->name('student.create');
// Route::get('/student/list',[StudentController::class, 'list'])->name('student.list');
// Route::post('/student/store',[StudentController::class, 'store'])->name('student.store');
// Route::get('/student/edit/{student}',[StudentController::class,'edit'])->name('student.edit');
// Route::put('/student/update/{student}',[StudentController::class,'update'])->name('student.update');
// Route::delete('/student/delete/{student}',[StudentController::class,'delete'])->name('student.delete');
// Route::get('/student/show/{student}',[StudentController::class,'show'])->name('student.show');