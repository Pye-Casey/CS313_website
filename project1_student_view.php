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
		$query = 'SELECT * FROM behavior.students WHERE id =' . $_POST["id"];
		
		foreach ($db->query($query) as $row)
		{
			if ($row['id'] == $_POST['id']) {
				$id = $row['id'];
				$fName = $row['first_name'];
				$lName = $row['last_name'];
				$grade = $row['grade_level'];
			}
				
		}
		
        } catch (PDOException $ex) {
			$msg = $ex->getMessage();
			echo "Error!: $msg";
			die();
        }

  ?>

<!DOCTYPE html>
<html>
  

  <head>
	<meta charset="utf-8">

    <title>Student View</title> 
  </head>
  <script>
	
  </script>
  
  <body>
	<?php include 'project_menu.php'; ?> <!	Add menu !>
	<?php var_dump[$_POST]; ?>
	<div class="container">
	<form action="project1_students_view.php" >
	<h2><label name="info">Student View </label></h2>
	<p>The following are the selected student's details.</p>
	<div class="form-group">
		<label for="fName">First Name:</label>
		<label type="text" class="" name="fName" id="fName"><?=$fName;?></label>
	</div>
	<div class="form-group">
		<label for="lName">Last Name:</label>
		<label type="text" class="" name="lName" id="lName"><?=$lName;?></label>
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<label type="number" name="gradeLevel" id="grade"><?=$grade;?></label>
	</div>
	<button type="submit" class="btn btn-success" >Back</button>
	</form>
	</div>
	
  </body>
 </html>