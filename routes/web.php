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

Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/about', 'FrontEndController@about')->name('about.show');
Route::get('/contact', 'FrontEndController@contact')->name('contact');

Auth::routes(['register'=>false]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');


    Route::get('/admin/about', 'AdminController@about')->name('about');
    Route::post('/admin/about', 'AdminController@store');
    Route::get('/admin/meta', 'AdminController@meta')->name('meta');
    Route::post('/admin/meta', 'AdminController@metaStore')->name('meta');



    Route::resource('student', 'StudentController')->middleware('can:student-crud');
    Route::resource('teacher', 'TeacherController')->middleware('can:teacher-crud');
    Route::resource('librarian', 'LibrarianController')->middleware('can:librarian-crud');
    Route::resource('class', 'ClassController')->middleware('can:class-crud');
    Route::resource('time', 'TimeTableController')->middleware('can:time-table-crud');
    Route::resource('fee', 'FeeController')->middleware('can:fee-crud');
    Route::resource('event', 'EventController')->middleware('can:event-crud');
    Route::resource('book', 'BookController')->middleware('can:book-crud');
    Route::resource('assignment', 'AssignmentController')->middleware('can:assignment-crud');
    Route::resource('attendance', 'AttendanceController')->middleware('can:attendance-crud');
    Route::resource('result', 'ResultController')->middleware('can:result-crud');
    Route::get('profile', 'AdminController@profile')->name('profile');
    Route::post('profile', 'AdminController@update');
    Route::post('change-password', 'AdminController@changePassword')->name('password.change');
    Route::get('issue-book', 'AdminController@bookIssueForm')->name('book.issue')->middleware('can:book-issue-crud');
    Route::get('issue-book/all', 'AdminController@allIssuedBooks')->name('book.issued')->middleware('can:book-issue-crud');
    Route::get('issue-book/{book}/return', 'AdminController@returnBook')->name('book.returned');
    Route::post('issue-book', 'AdminController@bookIssue');
    Route::resource('role', 'RoleController')->middleware('can:set-permission');
    Route::get('role/{role}/set-permission', 'RoleController@setPermission')->name('set-permission');
    Route::post('role/{role}/set-permission', 'RoleController@assignPermission');
    Route::get('/sms/smart', 'SMSConfigController@showConfigForm')->name('sms.config')->middleware('can:send-sms');
    Route::post('/sms/smart', 'SMSConfigController@saveConfig')->name('sms.config')->middleware('can:send-sms');
    Route::get('sms/new', 'SMSConfigController@newSms')->name('sms.new')->middleware('can:send-sms');
    Route::post('sms/new', 'SMSConfigController@newSmsSend')->name('sms.new')->middleware('can:send-sms');
    Route::get('sms/group', 'SMSConfigController@groupSms')->name('sms.group')->middleware('can:send-sms');
    Route::post('sms/group', 'SMSConfigController@groupSmsSend')->middleware('can:send-sms');
    Route::get('sms/index', 'SMSConfigController@index')->name('sms.index')->middleware('can:send-sms');
    Route::get('sms/group/create', 'SMSConfigController@createGroup')->name('sms.group.create')->middleware('can:send-sms');
    Route::post('sms/group/create', 'SMSConfigController@storeGroup')->middleware('can:send-sms');
});
