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
	<form action="project1_event_added.php" name="addEventForm" method="post">
	
	<h2>Add a Behavior Event</h2>
	<div class="form-group">
		<label for="studentName">First Name:</label>
		<select class="form-control" id="studentName">
			<option></option>
		</select>
	</div>
	<div class="form-group">
		<label for="staff">Reffering Staff:</label>
		<input type="text" class="form-control" id="staff">
	</div>
	<div class="form-group">
		<label for="location">Location</label>
		<input type="text" class="form-control" id="location">
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea class="form-control" rows="5" id="description"></textarea>
	</div>
	
	<button type="submit" class="btn btn-primary" >Add Event</button>
	</form>
	</div>
  </body>
 </html>