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
	<form action="project1_events_view.php" >
	<h2><label name="info">Event View </label></h2>
	<p>The following are the details to the requested behavior request.</p>
	<div class="form-group">
		<label for="studentName">Student Name:</label>
		<label type="text" class="" id="studentName"></label>
	</div>
	
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<label type="number" name="gradeLevel" id="grade"></label>
	</div>
	<div class="form-group">
		<label for="staffName">Reffering Staff:</label>
		<label type="text" class="" id="staffName"></label>
	</div>
	<div class="form-group">
		<label for="location">Location:</label>
		<label type="text" class="" id="location"></label>
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<label type="text" class="" id="description"></label>
	</div>
	
	<button type="submit"  class="btn btn-success" >Back</button>
	</form>
	</div>
	
  </body>
 </html>