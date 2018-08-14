

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
    @if(isset($details))
    <h2> The search result are: </h2>
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
              <?php foreach ($details as $teachers) {
             ?>
              <tbody>
                <tr>
                	
                  <th >{{ $teachers->id}}</th>
                  <th >{{ $teachers->name}}</th>
                  <th >{{ $teachers->email}}</th>
                  <th >{{ $teachers->post}}</th>
                   <th> <a style="background-color: #28b779; color: white; font-size: 20px" href="{{url('/editTeacher/' . $teachers->id)}}"> Edit</a>
                   	<th> <a style="background-color: #28b779; color: white; font-size: 20px" href="{{url('/deleteTeacher/' . $teachers->id)}}"> Delete</a>
                   </th>
                </tr>
              </tbody>
          <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    @elseif(isset($message))
    <h1> Teacher </h1>
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

            <p> No Result Found</p>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
</body>
</html>

@endsection