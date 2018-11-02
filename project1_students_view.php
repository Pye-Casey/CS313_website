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
	<form action="project1_student_view.php" method="post">
	<div class="container">
		<h2>View Students</h2>
		<p>Select the view button to see a more detailed view of an individual student.</p>
		
		<div class="container">
		  <h3>Student List:</h3>
		         
		  <table class="table table-hover table-responsive">
			<thead>
			  <tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Grade</th>
				<th># Events</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>John</td>
				<td>Doe</td>
				<td>6</td>
				<td>5</td>
				<td>
					<button type="submit" class="btn btn-primary">View</button>
				</td>
			  </tr>
			  
			</tbody>
		  </table>
		</div>
	</div>
	</form>
	
  </body>
 </html>