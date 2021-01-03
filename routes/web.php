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
    return view('welcome');
});

Route::post('kirimpesan', 'MessageController@store')->name('message.store');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::get('school_data', 'SchoolController@data')->name('school.data');
Route::get('department_data', 'DepartmentController@data')->name('department.data');
Route::get('student_data', 'StudentController@data')->name('student.data');
Route::get('message_data', 'MessageController@data')->name('message.data');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('student', 'StudentController');
Route::resource('message', 'MessageController')->except('store');
Route::resource('school', 'SchoolController');
Route::resource('department', 'DepartmentController');
});
