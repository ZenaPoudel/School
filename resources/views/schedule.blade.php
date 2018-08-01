@extends('master')

@section('content')
<form rs_id="1380" action="{{url('/addSchedule')}}" method="post">
	{{csrf_field()}}
  <fieldset rs_id="1381">
    
    <div class="form-group" rs_id="1391">
     
  <label>class id:</label><input type="text" name="class_id"><br>
  <label>Section id:</label><input type="text" name="section_id"><br>
  <label>start_time:</label><input type="text" name="start_time"><br>
  <label>Day:</label><input type="text" name="day"><br>
  <label>end_time:</label><input type="text" name="end_time"><br>
  <label>subject id:</label><input type="text" name="sub_id"><br>
    </fieldset>
      </div>
    <button type="submit" class="btn btn-primary" rs_id="1436">add</button>
  </fieldset>
</form>
@endsection