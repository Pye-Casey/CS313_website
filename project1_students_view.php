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
				<th>View</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				// Add rows
				$db = queryDB('SELECT * FROM behavior.students');
			?>
				
			<?php foreach ($db as $row):?>
				<tr>
				<td><?= $row['first_name'];?></td>
				<td> <?= $row['last_name'];?></td>				
				<td><?= $row['grade_level'];?></td>			
				<td>
					<button type='submit' value='<?=$row["id"];?>' name='id' class='btn btn-primary'>View</button>
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