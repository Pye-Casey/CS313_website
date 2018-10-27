

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
	<h1>PHP Data Modification</h1>
	<form action="prove_06_student_edit.php" method="POST" name="studentEdit" >
		<h3>Current Students</h3>
		<ul id="list1">
        <?php foreach ($db->query("SELECT * FROM student") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["first_name"]); ?>
                    <?php echo($row["last_name"]); ?>
                </strong>
                &ndash;
				<button type="submit" name="id" value="<?=$row['id']?>" >Edit</button>	
            </li>
        <?php endforeach; ?>
        </ul>
	</form>
	
        
        <hr />
        <form method="POST" name="addStudentForm" action="prove_06_student.php">
            <h2>Add a Student</h2>
			First Name: <input type="text" name="fName" />
            <br />
			Last Name: <input type="text" name="lName" />
            <br />
			Grade Level: <input type="number" name="gradeLevel" min="1" step="1" />
            <br />
			<button type="submit" >Create Student</button>
        </form>
		
		<hr />
        <form method="POST" name="addParentForm" action="prove_06_parent.php" >
            <h2>Add a Parent</h2>
			First Name: <input type="text" name="fName" />
            <br />
			Last Name: <input type="text" name="lName" />
            <br />
			Phone: <input type="number" name="phone" min="1" step="1" />
			<br>
			Email: <input type="email" name="email" min="1" step="1" />
            <br />
			<button type="submit" >Create Parent</button>
			
        </form>
  </body>
  
 </html>