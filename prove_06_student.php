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
			$query = "INSERT INTO student (first_name, last_name, grade_level) VALUES ('" . $fName . "','" . $lName . "','" . $grade . "')";
			echo $query;
			$statement = $db->query("SELECT * FROM student");
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			echo $results;
			//$db->query("INSERT INTO student('first_name', 'last_name', 'grade_level') VALUES ('Bob', 'Ross', '12')");
			//$newId = $db->lastInsertId('student_id_seq'); // keep the newest student's id
			//$stmt = $db->prepare($query);
			//$stmt = $db->prepare("INSERT INTO student (first_name, last_name, grade_level) VALUES (?,?,?)");
			//$stmt->bind_param("Bob", "Ross", "8");
			//$stmt = $db->prepare("INSERT INTO student (first_name, last_name, grade_level) VALUES ('Bob', 'Ross', 12)");
			//$stmt->execute();
			//$stmt->close();
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
		echo $fullName . " has been added!";
		//addParent($fName, $lName, $grade);
		//$db->query("INSERT INTO student('first_name', 'last_name', 'grade_level') VALUES ('Pacey', 'Cye', 7)");
		$stmt = $db->query('SELECT first_name FROM student WHERE id="1"');
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
		
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