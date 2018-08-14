<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\claas;
use App\section;
$class = claas::all();
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
    <h1>Classes</h1>
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
                  
                  <th>class</th>
                  <th>Sections</th>
                  <th>Floor</th>
                  <th>Block</th>
                  <th> </th>
                  <th> </th>
                </tr>
              </thead>
              <?php foreach ($class as $c) {
                $id= $c['class_id'];
                $section=section::where(['class_id'=> $id])->get();
                foreach ($section as $sec) {
               
             ?>
              <tbody>
                <tr>
                	<form action="{{url('/editClass}')}}"method="post">
                  <td >{{ $c['class_id']}}</td>
                  <td >{{ $sec['section_id']}}</td>
                  <td >{{ $sec['floor']}}</td>
                  <td >{{$sec['block']}}</td>
                   <td> <button style="background-color: #28b779" name="Edit">Edit</button></td>
                   <td><button style="background-color: #28b779" name="Delete"> Delete </button></td>
                   </form>
                </tr>
              </tbody>
          <?php } } ?>
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