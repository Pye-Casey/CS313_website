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
		$query = "SELECT * FROM student WHERE id='$studentID'";
		echo $query;
		$statement = $db->query($query);
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		$fName = $results["first_name"];
		echo $fName;
		$lName = $results["last_name"];
		$grade = $results["grade_level"];
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
	
	<form action="prove_06_edit_student2.php" method="post">
		<h1>Edit Student</h1><br>
		<h2>Student Info</h2>
		<div class="container">
		
		<div class="row">
			<strong>First Name:</strong>  <?php echo $fName; ?>
		</div>
		<div class="row">
		<strong>Last Name: </strong> <?php echo $lName; ?>
		</div>
		<div class="row">
		<strong>Student ID: </strong> <?php echo $_POST['id']?>
		</div>
		<div class="row">
		<strong>Grade: </strong> <?php echo $grade; ?>
		</div>
		<button type="submit">Save Changes</button>
		</div>
	</form>
  </body>
  
 </html>