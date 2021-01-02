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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::get('school_data', 'SchoolController@data')->name('school.data');
Route::get('department_data', 'DepartmentController@data')->name('department.data');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('student', 'StudentController');
Route::resource('message', 'MessageController');
Route::resource('school', 'SchoolController');
Route::resource('department', 'DepartmentController');
});
