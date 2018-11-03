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

    <title>Behavior Tracker</title> 
  </head>
  <script>
	
  </script>
  
  <body>
	<?php include 'project_menu.php'; ?> <!	Add menu !>
	<div class="container">
	<form action="project1_student_edited.php" name="addStudentForm" method="post">
	
	<h2>Edit Student</h2>
	<div class="form-group">
		<label for="fName">First Name:</label>
		<input type="text" class="form-control" id="fName" value="<?=$fName;?>">
	</div>
	<div class="form-group">
		<label for="lName">Last Name:</label>
		<input type="text" class="form-control" id="lName" value="<?=$lName;?>">
	</div>
	<div class="form-group">
		<label for="grade">Grade Level:</label>
		<input type="number" name="gradeLevel" min="0" step="1" class="form-control" id="grade" value="<?=$grade;?>">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" >Save</button>
		<button type="submit" class="btn btn-danger" formaction="project1_student_deleted.php" >Delete Student</button>
	</div>
	
	</form>
	</div>
  </body>
 </html>