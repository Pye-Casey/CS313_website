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
		$sQuery = "SELECT * FROM behavior.students WHERE id='" . $studentID . "'" ;
		//$db = queryDB('SELECT * FROM behaviors.events WHERE id = $_POST["id"]');
		foreach ($db->query($sQuery) as $row)
			{
				if ($row['id'] == $studentID) {
					
					$studentName = $row["first_name"] . " " . $row["last_name"];
					
					
				}
				
			}
		//student info
		//$studentID = $results["id"];
		//$studentName =  $results["first_name"] . " " .  $results["last_name"];
		
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

  <body>
	<?php include 'project_menu.php'; ?> <!	Add menu !>
	
	<div class="container">
	<form action="project1_event_edited.php" name="editEventForm" method="post">
	
	<h2>Edit Behavior Event</h2>
	<div class="form-group">
		<label for="studentName">First Name:</label>
		<select class="form-control" id="studentID" name="studentID">
			<option value="<?= $studentID?>"><?= $studentName?></option>
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
	<input type="text" hidden name="id" value="<?=$_POST['id'];?>">
	<div class="form-group">
		<button type="submit" class="btn btn-primary" >Save</button>
		<button type="submit" formaction="project1_event_deleted.php" class="btn btn-danger" >Delete Event</button>
	</div>
	
	</form>
	</div>
  </body>
 </html>