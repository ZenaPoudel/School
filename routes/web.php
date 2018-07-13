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
    return view('welcome');
});
Route::get('/attendance', function () {
    return view('attendance');
});
Route::get('/student', function () {
    return view('student');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewAttendance','attendanceController@View');
Route::post('/addAttendance','attendanceController@Add');
Route::get('/editAttendance','attendanceController@Edit');
Route::get('/viewStudent','studentController@View');
Route::post('/addStudent','studentController@Add');
Route::get('/editStudent','studentController@Edit');
Route::get('/showStudent','attendanceController@studentList');