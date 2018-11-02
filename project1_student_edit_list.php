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
	<form action="project1_student_edit.php" method="post">
	
	<div class="container">
		<h2>Student Edit List</h2>
	<p>Select a student to edit from the list below.</p>
		
		<div class="container">     
		  <table class="table table-hover table-responsive table-condensed">
			<thead>
			  <tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Grade</th>
				<th></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>John</td>
				<td>Doe</td>
				<td>6</td>
				<td>
					<button type="submit" class="btn btn-warning">Edit</button>
				</td>
			  </tr>
			  
			</tbody>
		  </table>
		</div>
	</div>
	</form>
	
	
  </body>
 </html>