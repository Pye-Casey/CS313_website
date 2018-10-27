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
	function addParent($fName,$lName, $email, $phone ) {
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
			$email =  htmlspecialchars($email);
			$phone =  htmlspecialchars($phone);
		// add to database
		$query = "INSERT INTO parent(first_name, last_name, email, phone_number) VALUES ('$fName', '$lName', '$email', $phone)";
		$insertStatement = $db->query($query);
		} catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			die();
		}	
}

  ?>
	
    <title>Parent View</title> 
  </head>
  <div>
	<h3>Parent Addition Status:</h3>
	<p>
	<?php
		$fName = htmlspecialchars($_POST["fName"]);
		$lName = htmlspecialchars($_POST["lName"]);
		$email = htmlspecialchars($_POST["email"]);
		$phone = htmlspecialchars($_POST["phone"]);
		addParent($fName, $lName, $email, $phone);
		$fullName = $fName . " " . $lName;
		echo $fullName . " has been added to parent table! <br>";
	?>
	</p>
	<div>
  <body>
	<h1>Parent Information</h1>
	<form action="prove_06_view.php" method="POST" name="parentEdit" >
		<h3>Current Students</h3>
		<ul id="list1">
        <?php foreach ($db->query("SELECT * FROM parent") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["first_name"]); ?>
                    <?php echo($row["last_name"]); ?>
                </strong>
                &ndash;
				<button type="submit" name="students[]" value="<?=$row['id']?>" >Edit Parent</button>
				
				
				
            </li>
        <?php endforeach; ?>
        </ul>
	</form>
	
        
        
  </body>
  
 </html>