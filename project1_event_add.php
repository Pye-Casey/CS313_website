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
	<form action="project1_event_added.php" name="addEventForm" method="post">
	
	<h2>Add a Behavior Event</h2>
	<div class="form-group">
		<label for="studentName">Student Name:</label>
		<select class="form-control" id="studentID" name="studentID">
			<option></option>
			<?php
				foreach ($db->query("SELECT * FROM behavior.students") as $row):?>
					<option value="<?= $row["id"];?>"><?= $row["first_name"] . " " . $row["last_name"];?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label for="staff">Reffering Staff:</label>
		<input type="text" class="form-control" name="staff" id="staff">
	</div>
	<div class="form-group">
		<label for="location">Location</label>
		<input type="text" class="form-control" name="location" id="location">
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea class="form-control" rows="5" name="description" id="description"></textarea>
	</div>
	
	<button type="submit" class="btn btn-primary" >Add Event</button>
	</form>
	</div>
  </body>
 </html>