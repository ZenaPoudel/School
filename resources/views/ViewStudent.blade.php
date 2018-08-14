<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Subject;
use App\Student;
$student = Student::all();
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    table tbody tr form th input[type="text"]{
        height:100px ; width:1px; background:#2E363F; position:relative; top:0; left:0;
    }
  </style>
</head>
<body>
@extends('master')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Student</h1>
    <a href="{{url('/student')}}" style="background-color: #28b779; margin-top: 0px;margin-left: 20px; margin-right: 20px; color: white; font-size: 20px;" > Add Student</a>  
    <form method="POST" action="{{url('/viewStudentBySearch')}}">
      {{ csrf_field() }}
    <div id="search">
  <input type="text" name="searchStudent" placeholder="Search Student..."/>
  <button type="submit" class="tip-bottom" >Search</button>
</div>
</form>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>Guardian name</th>
                  <th>Roll num</th>
                  <th>address</th>
                  <th>mobile</th>
                  <th>email</th>
                  <th>dob</th>
                  <th>class id</th>
                  <th>section id</th>
                  <th> </th>
                  <th> </th>
                </tr>
              </thead>
              <?php foreach ($student as $s) {
             ?>
              <tbody>
                <tr>
                 
                  <th >{{ $s['id']}}</th>
                  <th >{{ $s['student_name']}}</th>
                  <th >{{ $s['guardian_name']}}</th>
                  <th >{{ $s['roll_num']}}</th>
                  <th >{{ $s['address']}}</th>
                  <th >{{ $s['mobile']}}</th>
                  <th >{{ $s['email']}}</th>
                  <th >{{$s['dob']}}</th>
                  <th >{{ $s['class_id']}}</th>
                  <th >{{ $s['section_id']}}</th>
                              <th> <a style="background-color: #28b779; color: white; font-size: 15px" href="{{url('/editStudent/' . $s->id)}}"> Edit</a>
                   </th>
                   <th> <a style="background-color: #28b779; color: white; font-size: 15px" href="{{url('/deleteStudent/' . $s->id)}}"> Delete</a>
                   </th>
                </tr>
              </tbody>
          <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

@endsection