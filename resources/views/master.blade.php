<!DOCTYPE html>
<html>
<head>
	<title></title>
	<base href="{{ URL::asset('/') }}" target="_blank">
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
	 <script type="text/javascript" src="{{ url('js/jquery-1.11.3.js')}}"></script>

</head>
<body>
@include('layouts.header')
	<div class="container">
 @yield('content')
</div>
 <script type="text/javascript" src="{{ url('js/popper.min.js')}}"></script>
 <script type="text/javascript" src="{{ url('js/bootstrap.min.js')}}"></script>
</body>
</html>