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
	<?php var_dump[$_POST]; ?>
	<div class="container">
	<form action="project1_student_edit_list.php" >
	<h2>Event Status</h2>
	<p>The event has been edited.</p>
	
	<button type="submit" formaction="project1_event_edit_list.php" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>