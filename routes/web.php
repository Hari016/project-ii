<?php
require __DIR__ . '/auth.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/* ---------------------- PUBLIC ROUTES (Before Login) ---------------------- */
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/store', [StudentController::class, 'store'])->name('store');

/* Add more student public pages if you want */
Route::get('student/profile/{id}', [StudentController::class, 'profile'])->name('students.profile');


/* ---------------------- PROTECTED ROUTES (Login Required) ---------------------- */
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::put('/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/student/profileupdate', [StudentController::class, 'profileupdate'])->name('students.profileupdate');
    Route::get('/student/fees/{id}', [StudentController::class, 'fees'])->name('students.fees');
    Route::get('/pay/fees/{id}', [StudentController::class, 'pay'])->name('pay.fees');
    Route::post('/fees/store', [StudentController::class, 'feesStore'])->name('fees.store');
    Route::get('/assign/teachers/{id}', [StudentController::class, 'assignteacher'])->name('assign.teachers');
    Route::post('/assign/teachers/store', [StudentController::class, 'assignteacherstore'])->name('assignteachers.store');


    route::resource('roles', RoleController::class);
    route::resource('users', UserController::class);

    /* Teacher Routes */
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/storet', [TeacherController::class, 'storet'])->name('storet');
    Route::put('/updatet/{id}', [TeacherController::class, 'updatet'])->name('teacher.updatet');
    Route::delete('/deletet/{id}', [TeacherController::class, 'destroy'])->name('teacher.deletet');
    Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::get('/teacher/profile/{id}', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::put('/teacher/profileupdate', [TeacherController::class, 'profileupdate'])->name('teacher.profileupdate');
    Route::get('/assign/student/{id}', [TeacherController::class, 'assignstudent'])->name('assign.students');
    Route::post('/assign/student/store', [TeacherController::class, 'assignstudentstore'])->name('assignstudents.store');
});
