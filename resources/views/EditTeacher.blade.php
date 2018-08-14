@extends('master')
@section('content')
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" ></script>
</head>
<body>

</body>
</html>
<div id="content">
<div id="content-header">
  <h1>Edit teacher having id {{$teacher->id }}</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-content nopadding">
          <form action="{{url('/updateTeacher/'.$teacher->id)}}" method="Post" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="teacher_name" value="{{$teacher->name}}"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" name="email" value="{{$teacher->email}}" />
              </div>
              <div class="control-group">
              <label class="control-label">Post :</label>
              <div class="controls">
                <input type="text" class="span11" name="post" value="{{$teacher->post}}" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
        </div>
      </div>
      @endsection