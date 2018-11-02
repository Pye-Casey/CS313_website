<?php
	try {
        $dbUrl = getenv('DATABASE_URL');
                
        $dbOpts = parse_url($dbUrl);
                
        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');
                
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = 'SELECT * FROM behavior.events AS events, behavior.students AS students WHERE events.student_id = students.id';
		
		foreach ($db->query($query) as $row)
		{
			if ($row['events.id'] == $_POST['id']) {
				$id = $row['events.id'];
				$fName = $row['first_name'];
				$lName = $row['last_name'];
				$time = $row['time'];
				$location = $row['location'];
				$grade = $row['grade_level'];
				$description = $row['description'];
				$date = $row['date'];
				$staff = $row['staff_name'];
				
			}
				
		}
		
        } catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			die();
        }

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
	
	<div class="container">
	<form action="project1_events_view.php" >
	<h2><label name="info">Event View </label></h2>
	<p>The following are the details to the requested behavior request.</p>
	<div class="form-group">
		<label for="studentName">Student Name:</label>
		<label type="text" class="" id="studentName"><?php echo $fName . " " . $lName ;?></label>
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<label type="text" class="" id="grade"><?php echo $grade ;?></label>
	</div>
	<div class="form-group">
		<label for="staffName">Reffering Staff:</label>
		<label type="text" class="" id="staffName"><?php echo $staff ;?></label>
	</div>
	<div class="form-group">
		<label for="location">Location:</label>
		<label type="text" class="" id="location"><?php echo $location ;?></label>
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<label type="text" class="" id="description"><?php echo $description ;?></label>
	</div>
	
	<button type="submit"  class="btn btn-success" >Back</button>
	</form>
	</div>
	
  </body>
 </html>