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
	<form action="project1_student_add.php" >
	<h2><label name="info">Student Added!</label></h2>
	<p>The following student has been added.</p>
	<div class="form-group">
		<label for="fName">First Name:</label>
		<label type="text" class="" id="fName"></label>
	</div>
	<div class="form-group">
		<label for="lName">Last Name:</label>
		<label type="text" class="" id="lName"></label>
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<label type="number" name="gradeLevel" id="grade"></label>
	</div>
	<button type="submit" formaction="project1_student_add.php" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>