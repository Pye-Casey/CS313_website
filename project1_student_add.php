<!DOCTYPE html>
<html>
  

  <head>
	<meta charset="utf-8">

    <title>Behavior Tracker</title> 
  </head>
  <script>
	
  </script>
  
  <body>
	<?php include 'project_menu.php'; ?> <!	Add menu !>
	<div class="container">
	<form action="project1_student_added.php" name="addStudentForm" method="post">
	
	<h2>Add a Student</h2>
	<div class="form-group">
		<label for="fName">First Name:</label>
		<input type="text" class="form-control" id="fName">
	</div>
	<div class="form-group">
		<label for="lName">Last Name:</label>
		<input type="text" class="form-control" id="lName">
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<input type="number" name="gradeLevel" min="0" step="1" class="form-control" id="grade">
	</div>
	<button type="submit" class="btn btn-primary" >Create Student</button>
	</form>
	</div>
  </body>
 </html>