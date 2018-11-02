<!DOCTYPE html>
<html>
  

  <head>
	<meta charset="utf-8">

    <title>Student View</title> 
  </head>
  <script>
	
  </script>
  
  <body>
	<?php include 'project_menu.php'; ?> <!	Add menu !>
	<div class="container">
	<form action="project1_students_view.php" >
	<h2><label name="info">Student View </label></h2>
	<p>The following are the selected student's details.</p>
	<div class="form-group">
		<label for="fName">First Name:</label>
		<label type="text" class="" name="fName" id="fName"></label>
	</div>
	<div class="form-group">
		<label for="lName">Last Name:</label>
		<label type="text" class="" name="lName" id="lName"></label>
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<label type="number" name="gradeLevel" id="grade"></label>
	</div>
	<button type="submit" class="btn btn-success" >Back</button>
	</form>
	</div>
	
  </body>
 </html>