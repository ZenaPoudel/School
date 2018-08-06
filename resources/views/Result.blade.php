@extends('master')

@section('content')
<form rs_id="1380" action="{{url('/addResult')}}" method="post">
	{{csrf_field()}}
  <fieldset rs_id="1381">
    
    <div class="form-group" rs_id="1391">
     
  <label>class id:</label><input type="text" name="class_id"><br>
  <label>Section id:</label><input type="text" name="section_id"><br>
  <label>student_id:</label><input type="text" name="student_id"><br>
  <label>sub_id:</label><input type="text" name="sub_id"><br>
  <label>marks:</label><input type="text" name="marks"><br>
  <label>Terminal:</label><input type="text" name="terminal"><br>
    </fieldset>
      </div>
    <button type="submit" class="btn btn-primary" rs_id="1436">add</button>
  </fieldset>
</form>
@endsection