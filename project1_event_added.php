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
	<form action="project1_event_add.php" >
	<h2><label name="info">Event Added!</label></h2>
	<p>The following behavior event has been added.</p>
	
	<div class="form-group">
		<label for="studentName">First Name:</label>
		<label class="form-control" id="studentName"></label>
	</div>
	<div class="form-group">
		<label for="staff">Reffering Staff:</label>
		<label type="text" class="form-control" id="staff"></label>
	</div>
	<div class="form-group">
		<label for="location">Location</label>
		<label type="text" class="form-control" id="location"></label>
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea class="form-control disabled" rows="5" id="description"></textarea>
	</div>
	
	<button type="submit" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>