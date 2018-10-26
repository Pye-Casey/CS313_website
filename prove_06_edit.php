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
        } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "Error!: $msg";
        die();
        }

  ?>
	
    <title>Prove 6</title> 
  </head>
  
  <body>
	<?php include 'menu.php'; ?> <!	Add menu !>
	<?php
		$sql = 'SELECT first_name, last_name, grade_level FROM student WHERE id="'. $_POST['id'] .'"';
		
		foreach ($db->query('SELECT id, first_name, last_name, grade_level FROM student') as $row)
			{
				if ($row['id'] == $_POST['id']) {
					$id = $row['id'];
					$fName = $row['first_name'];
					$lName = $row['last_name'];
					$grade = $row['grade_level'];
					//echo $row['first_name'];
				}
				
			}
		
	?>
	<h1>Student Info Page</h1><br>
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
	</div>: 
	</div>
  </body>
  
 </html>