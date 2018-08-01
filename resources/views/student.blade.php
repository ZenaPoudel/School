<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<form action="{{url('/addStudent')}}" method="post">
    {{csrf_field()}}
     <label>student name:</label><input type="text" name="student_name">
  <br><br><br>
  <label>guardian name:</label><input type="text" name="guardian_name">
       <br><br><br>
    <label>address:</label><input type="text" name="address">
  <br><br><br>
  <label>mobile:</label><input type="text" name="mobile"><br><br><br>
  <label>email:</label><input type="text" name="email"><br><br><br>
  <label>password:</label><input type="text" name="password"><br><br><br>
  <label>dob:</label><input type="text" name="dob"><br><br><br>
  <label>age:</label><input type="text" name="age"><br><br><br>
   <label>class_id:</label><input type="text" name="class_id"><br><br><br>
   <label>section_id:</label><input type="text" name="section_id"><br><br><br>
  <input type="submit" placeholder="add"><br><br><br>
</form> 
</body>
</html> 