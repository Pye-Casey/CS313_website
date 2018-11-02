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
	
	<?php
		// add event
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

		// clean up just in case
			$studentID =  htmlspecialchars($_POST["studentID"]);
			$staff =  htmlspecialchars($_POST["staff"]);
			$location =  htmlspecialchars($_POST["location"]);
			$description =  htmlspecialchars($_POST["description"]);
			
		// add to database
		$query = "INSERT INTO behavior.events (student_id, staff_name, location, description, time, date) VALUES(:student_id, :staff_name, :location,:description, CURRENT_TIME, CURRENT_DATE)";
		// create this new row
		$stmt_insert_user = $db->prepare($query);
		$stmt_insert_user->bindValue(':student_id', $studentID);
		$stmt_insert_user->bindValue(':staff_name', $staff);
		$stmt_insert_user->bindValue(':location', $location);
		$stmt_insert_user->bindValue(':description', $description);
		$stmt_insert_user->execute(); 
		echo "<h2><label name='info'>Event Added!</label></h2>";
		} catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "<h2>Error: Your event was not added. Please try again later.</h2>";
			die();
		}	
	?>
	<button type="submit" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>