<!DOCTYPE html>
<html>
    
  <head>
    
	<?php include 'bootstrapScripts.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
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
		//custom
		$studentID = $_POST['id'];
		// query information
		$query = "SELECT * FROM student";
		// clean up just in case
			$fName =  htmlspecialchars($_POST["fName"]);
			$lName =  htmlspecialchars($_POST["lName"]);
			$grade =  htmlspecialchars($_POST["grade"]);
			$id = htmlspecialchars($_POST["id"]);
		// add to database
		$query = "UPDATE student SET first_name='$fName', last_name='$lName', grade_level=$grade WHERE id=$id";
		echo $query;
		$insertStatement = $db->query($query);
        } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "Error!: $msg";
        die();
    }
		
	
	
  ?>
	
    <title>Edit Student</title> 
  </head>
  
  <body>
	<?php include 'menu.php'; ?> <!	Add menu !>
	
	<form action="prove_06.php" method="post">
		<h1>Edit Student Results</h1><br>
		<?php 
			echo $_POST["fName"] . " " . $_POST["lName"] . " has been edited.";
		?>
		
		<button type="submit">Back to Students</button>
		</div>
	</form>
  </body>
  
 </html>