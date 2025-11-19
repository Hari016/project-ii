<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middlewar'=> 'auth'], function(){
    


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('store', [StudentController::class, 'store'])->name('store');
Route::put('update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');
Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::get('student/profile/{id}', [StudentController::class, 'profile'])->name('students.profile');
Route::put('student/profileupdate', [StudentController::class, 'profileupdate'])->name('students.profileupdate');
Route::get('student/fees/{id}', [StudentController::class, 'fees'])->name('students.fees');
Route::get('pay/fees/{id}', [StudentController::class, 'pay'])->name('pay.fees');
Route::post('fees/store', [StudentController::class, 'feesStore'])->name('fees.store');


Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('storet', [TeacherController::class, 'storet'])->name('storet');
Route::put('updatet/{id}', [TeacherController::class, 'updatet'])->name('teacher.updatet');
Route::delete('deletet/{id}', [TeacherController::class, 'destroy'])->name('teacher.deletet');
Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::get('teacher/profile/{id}', [TeacherController::class, 'profile'])->name('teacher.profile');
Route::put('teacher/profileupdate', [TeacherController::class, 'profileupdate'])->name('teacher.profileupdate');

});