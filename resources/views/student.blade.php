@extends('master')
@section('content')
<div id="content">
<div id="content-header">
  <h1>Student</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        @if(Session::has('Message'))
    <div class="alert alert-success">
        {{ Session::get('Message') }}
    </div>
@endif
        <div class="widget-content nopadding">
          <form action="{{url('/addStudent')}}" method="Post" class="form-horizontal">
            {{csrf_field()}}

            <div class="control-group">
              <label class="control-label">student name:</label>
              <div class="controls">
                <input type="text"  class="span11" name="student_name" placeholder="Student Name"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">guardian name:</label>
              <div class="controls">
                <input type="text" class="span11" name="guardian_name" placeholder="Guardian Name" />
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">address:</label>
              <div class="controls">
                <input type="text" class="span11" name="address" placeholder="address" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">roll:</label>
              <div class="controls">
                <input type="text" class="span11" name="roll" placeholder="Roll Number" />
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" name="mobile" placeholder="Mobile Num" />
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">Email:</label>
              <div class="controls">
                <input type="text" class="span11" name="Email" placeholder="Email Id" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date Of Birth:</label>
              <div class="controls">
                <input type="text" class="span11" name="dob" placeholder="dob" />
              </div>
            </div>
        <div class="control-group">
              <label class="control-label">Age:</label>
              <div class="controls">
                <input type="text" class="span11" name="age" placeholder="Age" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Class_id:</label>
              <div class="controls">
                <input type="text" class="span11" name="class_id" placeholder="Class id" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Section_id:</label>
              <div class="controls">
                <input type="text" class="span11" name="section_id" placeholder="Section id" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="add" value="add">Add</button>
            </div>
          </form>
        </div>
      </div>
      @endsection