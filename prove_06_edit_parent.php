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
		$query = "SELECT * FROM parent";
		foreach ($db->query('SELECT * FROM parent') as $row)
			{
				if ($row['id'] == $_POST['id']) {
					$id = $row['id'];
					$fName = $row['first_name'];
					$lName = $row['last_name'];
					$email = $row['email'];
					$phone = $row['phone_number'];
				}
			}
        } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "Error!: $msg";
        die();
    }
		
	
	
  ?>
	
    <title>Edit Parent</title> 
  </head>
  
  <body>
	<?php include 'menu.php'; ?> <!	Add menu !>
	
	<form action="prove_06_edit_parent2.php" method="post">
		<h1>Edit Parent</h1><br>
		<h2>Parent Info</h2>
		<div class="container">
		
		<div class="row">
			<strong>First Name:</strong>  
			<input type="text" name="fName" value="<?=$fName?>">
			
		</div>
		<div class="row">
		<strong>Last Name: </strong> 
		<input type="text" name="lName" value="<?=$lName?>">
		</div>
		<div class="row">
		<strong>Parent ID: </strong> <?=$id?>
		<input type="hidden" name="id"  value="<?=$id?>">
		</div>
		<div class="row">
		<strong>Email: </strong> 
		<input type="text" name="email" value="<?=$email?>">
		</div>
		<div class="row">
		<strong>Phone: </strong> 
		<input type="text" name="phone" value="<?=$phone?>">
		</div>
		<button type="submit">Save Changes</button>
		</div>
		<div>
		<button type="submit" formaction="prove_06_delete_parent.php">Delete Parent</button>
		</div>
	</form>
  </body>
  
 </html>