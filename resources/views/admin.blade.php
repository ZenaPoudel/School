<form action="{{url('/add')}}" method="POST">
	{{csrf_field()}}
	<input type="text" name="name" placeholder="name">
	<input type="text" name="email" placeholder="email">
	<input type="text" name="password" placeholder="password">
	<input type="text" name="mobile" placeholder="mobile">
	<button type="submit" >add</button>
</form>