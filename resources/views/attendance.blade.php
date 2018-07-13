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
   // while (list($k,$v)=each($classes)) {
    foreach ($sections as $sec => $valuesec) {
    
        $optionsec.='<option value"'.$valuesec.'">'.$sec.'</option>';
    }
    return $optionsec;
}
function get_subjects()
{
    $subjects=array(1=>1,2=>2,3=>3);
    $optionsub='';
   // while (list($k,$v)=each($classes)) {
    foreach ($subjects as $sub => $valuesub) {
    
        $optionsub.='<option value"'.$valuesub.'">'.$sub.'</option>';
    }
    return $optionsub;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<form action="{{url('/addAttendance')}}" method="post">
    {{csrf_field()}}
   <label>class id:</label><select name="class_id">
        <?php echo get_classes(); ?>
    </select>
  <br><br><br>
  <label>section id:</label><select name="section_id">
        <?php echo get_sections(); ?>
    </select><br><br><br>
    <label>subject id:</label><select name="sub_id">
        <?php echo get_subjects(); ?>
    </select>
  <br><br><br>
  <label>date:</label><input type="text" name="date"><br><br><br>
  <label>time:</label><input type="text" name="time"><br><br><br>
  <!--<label>Student id:</label><input type="text" name="student_id"><br><br><br>
  <label>Student name:</label><input type="text" name="student_name"><br><br><br>
  <label>attendance:</label><input type="text" name="flag"><br><br><br>
  -->
  <input type="submit" placeholder="attend"><br><br><br>
</form> 
</body>
</html>