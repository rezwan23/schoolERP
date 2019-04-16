<?php

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
    return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', 'AdminController@index');
    Route::resource('student', 'StudentController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('librarian', 'LibrarianController');
    Route::resource('class', 'ClassController');
    Route::resource('time', 'TimeTableController');
    Route::resource('fee', 'FeeController');
    Route::resource('event', 'EventController');
    Route::resource('book', 'BookController');
    Route::resource('assignment', 'AssignmentController');
    Route::resource('attendance', 'AttendanceController');
    Route::resource('result', 'ResultController');
});
