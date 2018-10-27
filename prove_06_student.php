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
	
	function addParent($fName,$lName, $grade) {
		// clean up just in case
			$fName =  htmlspecialchars($fName);
			$lName =  htmlspecialchars($lName);
			$grade =  htmlspecialchars($grade);
		// add to database
			//$query = 
		$insertStatement = $db->query("INSERT INTO student(first_name, last_name, grade_level) VALUES ('$fName', '$lName', $grade)");
			// Use prepared statements
			/*$insertStatement = $db->prepare("INSERT INTO student(first_name, last_name, grade_level) VALUES (?,?,?)");
			$insertStatement->bind_param($fName,$lName,$grade);
			// clean up just in case
			$fName =  htmlspecialchars($fName);
			$lName =  htmlspecialchars($lName);
			$grade =  htmlspecialchars($grade);
			$insertStatement->execute();
			//shut down
			$insertStatement->close(); */
	}

  ?>
	<?php
		
	?>
  <title>Student View</title> 
  </head>
  
  <body>
	<div>
	<?php
		$fName = htmlspecialchars($_POST["fName"]);
		$lName = htmlspecialchars($_POST["lName"]);
		$grade = htmlspecialchars($_POST["gradeLevel"]);
		$fullName = $fName . " " . $lName;
		echo $fullName . " has been added! <br>";
		addParent($fName, $lName, $grade);
		//$db->query("INSERT INTO student('first_name', 'last_name', 'grade_level') VALUES ('Pacey', 'Cye', 7)");
		//$stmt = $db->query('SELECT first_name FROM student WHERE id=1');
		//$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $row["first_name"] . "<br>";
		
		//test insert
		//$db->query("INSERT INTO student('first_name', 'last_name', 'grade_level') VALUES ('Pacey', 'Cye', 7)");
		//WORKS
		//$insertStatement = $db->query("INSERT INTO student(first_name, last_name, grade_level) VALUES ('Pacey', 'Cye', 7)");
		
	?>
	<div>
	<h3>Current Student List</h3>
	<form action="prove_05_info.php" method="POST" name="studentEdit" >
		<h3>Current Students</h3>
		<ul id="list1">
        <?php foreach ($db->query("SELECT * FROM student") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["first_name"]); ?>
                    <?php echo($row["last_name"]); ?>
                </strong>
                &ndash;
				<button type="submit" name="students[]" value="<?=$row['id']?>" >Edit Student</button>
				
				
				
            </li>
        <?php endforeach; ?>
        </ul>
	</form>
	
        
        
  </body>
  
 </html>