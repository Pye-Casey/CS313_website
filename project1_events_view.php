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
	<form action="project1_event_view.php" method="post">
	<div class="container">
		<h2>View Events</h2>
		<p>Select the view button to see a more detailed view of an individual behavior event.</p>
		
		<div class="container">
		  <table class="table table-hover table-responsive">
			<thead>
			  <tr>
				<th>Student Name</th>
				<th>Grade</th>
				<th>Reffering Staff</th>
				<th>Location</th>
				<th>Description<th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>John Doe</td>
				<td>6</td>
				<td>Mike Johnson</td>
				<td>play ground</td>
				<td>I can't believe what this little turd did today!</td>
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