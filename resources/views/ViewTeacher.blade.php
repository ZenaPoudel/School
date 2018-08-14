<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Subject;
use App\Teacher;
$teacher = Teacher::all();
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
    <h1>Teacher</h1>
    <a href="{{url('/teacher')}}" style="background-color: #28b779; margin-top: 0px;margin-left: 20px; margin-right: 20px; color: white; font-size: 20px;" > Add Teacher</a> 
    <form method="POST" action="{{url('/viewTeacherBySearch')}}">
    	{{ csrf_field() }}
    <div id="search">
  <input type="text" name="searchTeacher" placeholder="Search Teacher..."/>
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
                  <th>email</th>
                  <th>post</th>
                  <th> </th>
               	  <th></th>
                </tr>
              </thead>
              <?php foreach ($teacher as $t) {
             ?>
              <tbody>
                <tr>
                	
                  <th >{{ $t['id']}}</th>
                  <th >{{ $t['name']}}</th>
                  <th >{{ $t['email']}}</th>
                  <th >{{$t['post']}}</th>
                   <th> <a style="background-color: #28b779; color: white; font-size: 20px" href="{{url('/editTeacher/' . $t->id)}}"> Edit</a>
                   	<th> <a style="background-color: #28b779; color: white; font-size: 20px" href="{{url('/deleteTeacher/' . $t->id)}}"> Delete</a>
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