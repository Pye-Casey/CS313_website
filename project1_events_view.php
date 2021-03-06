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
	<form action="project1_event_view.php" method="post">
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
				<th>Location</th>
				<th>Description</th>
				<th>View</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				// Add rows
				$db = queryDB('SELECT e.id, e.student_id, e.staff_name, e.location, e.description, e.time, s.first_name, s.last_name, s.grade_level FROM behavior.events AS e, behavior.students AS s WHERE e.student_id = s.id');
			?>
				
			<?php foreach ($db as $row):?>
				<tr>
				<td><?php echo ($row['first_name'] . " " . $row['last_name']);?></td>
				<td> <?php echo ($row['staff_name']);?></td>				
				<td><?php echo ($row['time']);?></td>
				<td><?php echo ($row['date']);?></td>
				<td><?php echo ($row['location']);?></td>
				<td><?php echo ($row['description']);?></td>
				<td><?php echo ($row["e.id"]);?>
					<button type='submit' value='<?php echo ($row["id"]);?>' name='id' class='btn btn-primary'>View</button>
				</td>
				</tr>
			
			<?php endforeach;?>
			</tbody>
		  </table>
		</div>
	</div>
	</form>
	
  </body>
 </html>