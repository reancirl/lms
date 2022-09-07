<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users','App\Http\Controllers\UserController');
    Route::resource('subjects','App\Http\Controllers\SubjectController');
    Route::resource('school-years','App\Http\Controllers\SchoolYearController');
    Route::resource('semester','App\Http\Controllers\SemesterController');
    Route::resource('time','App\Http\Controllers\TimeController');
    Route::resource('courses','App\Http\Controllers\CourseController');
    Route::resource('course-students','App\Http\Controllers\CourseStudentController');
    Route::patch('/course-students/grades/{id}',[App\Http\Controllers\CourseStudentController::class, 'grade'])->name('course-students.grade');
    Route::get('/course/{id}',[App\Http\Controllers\CourseStudentController::class, 'course'])->name('course-students.course');
    Route::get('/course/{id}/{post_id}',[App\Http\Controllers\PostController::class, 'index']);
    Route::resource('posts','App\Http\Controllers\PostController');
    Route::resource('response','App\Http\Controllers\ResponseController');
});
