
@extends('master')
@section('content')
<div id="content">
<div id="content-header">
  <h1>Teacher</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-content nopadding">
          <form action="{{url('/addTeacher')}}" method="Post" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="teacher_name" placeholder="Teacher Name"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" name="email" placeholder="Email" />
              </div>
              <div class="control-group">
              <label class="control-label">Post :</label>
              <div class="controls">
                <input type="text" class="span11" name="post" placeholder="post" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Add</button>
            </div>
          </form>
        </div>
      </div>
      @endsection