<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <title>Behavior Tracker</title> 
  </head>
  <body>
	<?php include 'project_menu.php'; ?> <!	Add menu !>
	
	<div class="container">
	<form action="project1_student_edit_list.php" >
	<h2><label name="info">Student Edit</label></h2>
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
		$query = "UPDATE behavior.students SET first_name=:fName, last_name=:lName, grade_level=:grade WHERE id=" . $_POST["id"] . "";
		$stmt = $db->prepare($query);
		$stmt->bindValue(':fName', $_POST["fName"]);
		$stmt->bindValue(':lName', $_POST["lName"]);
		$stmt->bindValue(':grade', $_POST["grade"]);
		$stmt->execute(); 
		echo "<p>This student has been edited.</p>";
		
		} catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			echo "<p>The student could not be edited. Please try again later.</p>";
			die();
		}

	?>
	
	</div>
	<button type="submit" formaction="project1_student_edit_list.php" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>