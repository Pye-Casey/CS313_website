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
		// Get event info
		//$db = queryDB('SELECT * FROM behavior.events WHERE id = ' . $_POST["id"]);
		$bQuery = 'SELECT * FROM behavior.events WHERE id = ' . $_POST["id"];
		foreach ($db->query($bQuery) as $row)
			{
				if ($row['id'] == $_POST['id']) {
					$id = $row['id'];
					$staff = $row["staff_name"];
					$location = $row["location"];
					$description = $row["description"];
					$studentID =  $row["student_id"];
				}
				
			}
		
		// Get student info
		$sQuery = "SELECT * FROM behavior.students WHERE id='" . $_POST['id'] . "'" ;
		//$db = queryDB('SELECT * FROM behaviors.events WHERE id = $_POST["id"]');
		$statement = $db->query($sQuery);
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		//student info
		$studentID = $results["id"];
		$studentName =  $results["first_name"] . " " .  $results["last_name"];
		
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
	<?php var_dump($_POST . "<br>"); 
		echo "Student Query: " .  $sQuery . "<br>";
		echo "Student id: " . $studentID . "<br>";
		echo "Staff id: " . $staff . "<br>";
	?>
	<div class="container">
	<form action="project1_event_edited.php" name="editEventForm" method="post">
	
	<h2>Edit Behavior Event</h2>
	<div class="form-group">
		<label for="studentName">First Name:</label>
		<select class="form-control" id="studentName">
			<option></option>
			<?php
				foreach ($db->query("SELECT * FROM behavior.students") as $row):?>
					<option value="<?= $row["id"];?>"><?= $row["first_name"] . " " . $row["last_name"];?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label for="staff">Reffering Staff:</label>
		<input type="text" class="form-control" id="staff" name="staff" value="<?= $staff; ?>">
	</div>
	<div class="form-group">
		<label for="location">Location</label>
		<input type="text" class="form-control" id="location" name="location" value="<?= $location; ?>">
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea class="form-control" rows="5" id="description" name="description" value="<?= $description; ?>"><?= $description; ?></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" >Save</button>
		<button type="submit" class="btn btn-danger" >Delete Event</button>
	</div>
	
	</form>
	</div>
  </body>
 </html>