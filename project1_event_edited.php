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
	<?php var_dump($_POST);
		echo "Student ID: " . $_POST["studentID"] . "<br>";
		echo "Description: " . $_POST["description"] . "<br>";
	?>
	<div class="container">
	<form action="project1_student_edit_list.php" >
	<h2>Event Status</h2>
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
	
		// add to database
		$query = "UPDATE behavior.events SET student_id=:studentID, staff_name=:staff, location=:location, description=:description WHERE id=" . $_POST["id"] . "";
		$stmt = $db->prepare($query);
		$stmt->bindValue(':studentID', $_POST["studentID"]);
		$stmt->bindValue(':staff', $_POST["staff"]);
		$stmt->bindValue(':location', $_POST["location"]);
		$stmt->bindValue(':description', $_POST["location"]);
		$stmt->execute(); 
		echo "<p>The event has been edited.</p>";
		
		} catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			echo "<p>The event could not be edited. Please try again later.</p>";
			die();
		}

	?>
	
	
	
	<button type="submit" formaction="project1_event_edit_list.php" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>