<?php
	require("project1_db.php");
?>
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
		<h2>Student Behavior Tracker</h2>
		<p>Welcome to the Student Behavior Tracker.</p>
		
		<div class="container">
		  <h3>Behavior Event List:</h3>
		         
		  <table class="table table-hover table-responsive">
			<thead>
			  <tr>
				<th>Student Name</th>
				<th>Reffering Staff</th>
				<th>Time</th>
				<th>Date</th>
				<th>Location<th>
				<th>Description</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<?php
				// Add rows
				$db = queryDB("SELECT * FROM behavior.events");
				foreach ($db as $row)
				{
				// Get student name
				$id = $row['id'];
				echo "ID: " . $id . "<br>"; 
				// process student name
				$sName = getName($id);
				
				// Add table rows
				echo "<tr>";
				echo "<td>" . $sname ."</td>";
				echo "<td>" . $row['staff_name'] ."</td>";
				echo "<td>" . $row['time'] ."</td>";
				echo "<td>" . $row['date'] ."</td>";
				echo "<td>" . $row['location'] ."</td>";
				echo "<td>" . $row['description'] ."</td>";
				echo "<td>";
					//echo "<button type='submit' value="' . $row['id'] . '" name="id" class="btn btn-primary">View</button>";
				echo "</td>";
				echo "</tr>"; 
				}
			?>
			  <tr>
				<td>John</td>
				<td>Doe</td>
				<td>6</td>
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