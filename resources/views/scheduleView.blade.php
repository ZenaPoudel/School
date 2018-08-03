@extends('master')

@section('content')
<form rs_id="1380" action="{{url('/viewClassSchedule')}}" method="post">
	{{csrf_field()}}
  <fieldset rs_id="1381">
    
    <div class="form-group" rs_id="1391">
     
  <label>class id:</label><input type="text" name="class_id"><br>
  <label>Section id:</label><input type="text" name="section_id"><br>
    </fieldset>
      </div>
    <button type="submit" class="btn btn-primary" rs_id="1436">View</button>
  </fieldset>
</form>
@endsection