
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','HomeController@home');
Route::get('/attendance', function () {
    return view('attendance');
});
Route::get('/student', function () {
    return view('student');
});
Route::get('/student', function () {
    return view('student');
});
Route::get('/schedule', function () {
    return view('schedule');
});
Route::get('/ettikai', function () {
    return view('ettikai');
});
Route::get('/toViewSchedule', function () {
    return view('scheduleView');
});
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewAttendance','attendanceController@View');
Route::post('/addAttendance','attendanceController@Add');
Route::get('/editAttendance','attendanceController@Edit');
Route::get('/viewStudent','studentController@View');
Route::post('/addStudent','studentController@Add');
Route::get('/editStudent','studentController@Edit');
Route::post('/showStudent','attendanceController@selectStudent');
Route::get('/events','eventController@event');
//Route::get('/showStudent/{student_id}','attendanceController@selectStudent');
//Route::get('/remarks','attendanceController@remarks');
//test
Route::get('/test','StudentController@test');
Route::get('/viewSchedule','ScheduleController@View');
Route::post('/addSchedule','ScheduleController@Add');
Route::post('/editSchedule','ScheduleController@Edit');
Route::post('/viewClassSchedule','ScheduleController@ViewByClass');
Route::get('/connect','connectionController@isConnect');
Route::post('/loginUser','LoginController@login');
Route::post('/provideAttendance','attendanceController@attendNum');

//Route::get();