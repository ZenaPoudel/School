<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css">
  .header {
  margin-top: 2px;
  overflow: hidden;
  background-color: Black;
  padding: 10px 5px;
}

</style>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{ asset('css/colorpicker.css')}}" />
<link rel="stylesheet" href="{{ asset('css/datepicker.css')}}" />
<link rel="stylesheet" href="{{ asset('css/uniform.css')}}" />
<link rel="stylesheet" href="{{ asset('css/select2.css')}}" />
<link rel="stylesheet" href="{{ asset('css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{ asset('css/matrix-media.css')}}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-wysihtml5.css')}}" />
<link href="{{ asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link href='{{asset('http://fonts.googleapis.com/css?family=Open+Sans:400,700,800')}}' rel='stylesheet' type='text/css'>
</head>
<body>


<div class="header">
  <div class="header-right">
<form action="{{url('/logout')}}" method="POST">
	{{csrf_field()}}
    <button style="background-color: green;">Logout</button>
   </form>
  </div>
</div>
</body>
</html>