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
	<form action="project1_student_add.php" >
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
			$fName =  htmlspecialchars($_POST["fName"]);
			$lName =  htmlspecialchars($_POST["lName"]);
			$grade =  htmlspecialchars($_POST["grade"]);
			$description =  htmlspecialchars($_POST["description"]);
			
		// add to database
		$query = "INSERT INTO behavior.students (first_name, last_name, grade_level) VALUES(:fName, :lName, :grade)";
		// create this new row
		$stmt_insert_user = $db->prepare($query);
		$stmt_insert_user->bindValue(':fName', $fName);
		$stmt_insert_user->bindValue(':lName', $lName);
		$stmt_insert_user->bindValue(':grade', $grade);
		
		$stmt_insert_user->execute(); 
		echo "<h2><label name='info'>Student Added!</label></h2>";
		} catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "<h2>Error: Student was not added. Please try again later.</h2>";
			die();
		}	
	?>
	
	<h2><label name="info">Student Added!</label></h2>
	<p>The following student has been added.</p>
	<div class="form-group">
		<label for="fName">First Name:</label>
		<label type="text" class="" id="fName"></label>
	</div>
	<div class="form-group">
		<label for="lName">Last Name:</label>
		<label type="text" class="" id="lName"></label>
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<label type="number" name="gradeLevel" id="grade"></label>
	</div>
	<button type="submit" formaction="project1_student_add.php" class="btn btn-success" >Back</button>
	</form>
	</div>
  </body>
 </html>