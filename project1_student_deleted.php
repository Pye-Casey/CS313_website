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
	<form action="project1_students_view.php" >
	<h2><label name="info">Student Deletion</label></h2>
	
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

		// clean up just in case
			$fName =  htmlspecialchars($fName);
			$lName =  htmlspecialchars($lName);
			$grade =  htmlspecialchars($grade);
		// add to database
		$query = "DELETE FROM behavior.students WHERE id='" . $_POST['id'] ."'";
		$stmt = $db->query($query);
		echo "<p>The student has been deleted.</p>";
		
		} catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			echo "<p>The student could not be deleted. Please try again later.</p>";
			die();
		}

	?>
	<button type="submit"  class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>