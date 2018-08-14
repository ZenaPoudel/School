@extends('master')

@section('content')
<?php
function get_classes()
{
    $classes=array(1=>1,2=>2,3=>3);
    $options='';
   // while (list($k,$v)=each($classes)) {
    foreach ($classes as $clas => $value) {
    
        $options.='<option value"'.$value.'">'.$clas.'</option>';
    }
    return $options;
}
function get_sections()
{
    $sections=array(1=>1,2=>2,3=>3);
    $optionsec='';
    foreach ($sections as $sec => $valuesec) {
    
        $optionsec.='<option value"'.$valuesec.'">'.$sec.'</option>';
    }
    return $optionsec;
}
function get_subjects()
{
    $subjects=array(1=>1,2=>2,3=>3);
    $optionsub='';
    foreach ($subjects as $sub => $valuesub) {
    
        $optionsub.='<option value"'.$valuesub.'">'.$sub.'</option>';
    
    }
    
    return $optionsub;

}
?>

<form rs_id="1380" action="{{url('/showStudent')}}" method="post">
	{{csrf_field()}}
  <fieldset rs_id="1381">
    
    <div class="form-group" rs_id="1391">
     <label>class id:</label><select name="class_id">
        <?php echo get_classes(); ?>
    </select>
  <br><br><br>
  <label>section id:</label><select name="section_id">
        <?php echo get_sections(); ?>
 
  <br><br><br>
    </fieldset>

      </div>
    <button type="submit" class="btn btn-primary" name="add" placeholder="Add" rs_id="1436"> add</button>
  </fieldset>
</form>
@endsection