
<?php
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/student', function () {
    return view('student');
});

Route::get('/schedule', function () {
    return view('schedule');
});
Route::get('/addAdmin', function () {
    return view('admin');
});
Route::get('/ettikai', function () {
    return view('ettikai');
});

Route::get('/toViewAttendance', function () {
    return view('attendance');
});
Route::get('/toViewSchedule', function () {
    return view('scheduleView');
});
Route::get('/teacher', function () {
    return view('Teacher');
});
Route::get('/result', function () {
    return view('Result');
});
Route::get('/toViewResult', function () {
    return view('resultView');
});
Route::get('/toViewMarks', function () {
    return view('ViewMarks');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/admin','adminController@index');
Route::get('/admin/login','Auth\adminLoginController@showLoginForm'
);
Route::post('/admin/login/submit','Auth\adminLoginController@login'
);
Auth::routes();
Route::get('/viewAttendance','attendanceController@View');
Route::post('/viewTeacherBySearch','adminController@searchTeacher');
Route::post('/viewStudentBySearch','adminController@searchStudent');
Route::post('/addAttendance','attendanceController@Add');
Route::get('/editAttendance','attendanceController@Edit');
Route::get('/viewStudent','adminController@viewStudent');
Route::post('/addStudent','adminController@addStudent');
Route::post('/updateStudent/{id}','adminController@updateStudent');
Route::get('/editStudent/{id}','adminController@editStudent');
Route::post('/showStudent','attendanceController@selectStudent');
Route::get('/test','StudentController@test');
Route::get('/viewSchedule','ScheduleController@View');
Route::post('/addSchedule','ScheduleController@Add');
Route::post('/editSchedule','ScheduleController@Edit');
Route::post('/viewClassSchedule','ScheduleController@ViewByClass');
Route::post('/add','ExampleController@add');
Route::post('/addResult','ResultController@add');
Route::post('/viewClassResult','ResultController@ViewByClass');
Route::post('/viewStudentMarks','ResultController@marks');
Route::get('/connect','connectionController@isConnect');
Route::post('/addTeacher','adminController@addTeacher');
Route::get('/editTeacher/{id}','adminController@editTeacher');
Route::post('/updateTeacher/{id}','adminController@updateTeacher');
Route::get('/deleteTeacher/{id}','adminController@deleteTeacher');
Route::get('/deleteStudent/{id}','adminController@deleteStudent');
Route::get('/ViewClassSection','adminController@ViewClasses');
Route::get('/viewTeacher','adminController@viewTeacher');
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});
