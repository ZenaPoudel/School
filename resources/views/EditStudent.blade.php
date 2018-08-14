@extends('master')
@section('content')
<div id="content">
<div id="content-header">
  <h1>Edit student having id {{$student->id }}</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-content nopadding">
          <form action="{{url('/updateStudent/'.$student->id)}}" method="Post" class="form-horizontal">
            {{csrf_field()}}

            <div class="control-group">

              <label class="control-label">student name:</label>
              <div class="controls">
                <input type="text"  class="span11" name="student_name" value="{{$student->student_name}}"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">guardian name:</label>
              <div class="controls">
                <input type="text" class="span11" name="guardian_name" value="{{$student->guardian_name}}" />
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">address:</label>
              <div class="controls">
                <input type="text" class="span11" name="address" value="{{$student->address}}" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">roll:</label>
              <div class="controls">
                <input type="text" class="span11" name="roll" value="{{$student->roll_num}}" />
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" name="mobile" value="{{$student->mobile}}" />
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">Email:</label>
              <div class="controls">
                <input type="text" class="span11" name="Email" value="{{$student->email}}" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Of Birth:</label>
              <div class="controls">
                <input type="text" class="span11" name="dob" value="{{$student->dob}}" />
              </div>
            </div>
        <div class="control-group">
              <label class="control-label">Age:</label>
              <div class="controls">
                <input type="text" class="span11" name="age" value="{{$student->age}}" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Class_id:</label>
              <div class="controls">
                <input type="text" class="span11" name="class_id" value="{{$student->class_id}}" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Section_id:</label>
              <div class="controls">
                <input type="text" class="span11" name="section_id" value="{{$student->section_id}}" />
              </div>
            </div>
          <div class="form-actions">
              <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
@endsection