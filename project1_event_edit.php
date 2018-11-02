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
	<?php var_dump($_POST); ?>
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
		<input type="text" class="form-control" id="staff">
	</div>
	<div class="form-group">
		<label for="location">Location</label>
		<input type="text" class="form-control" id="location">
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea class="form-control" rows="5" id="description"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" >Save</button>
		<button type="submit" class="btn btn-danger" >Delete Event</button>
	</div>
	
	</form>
	</div>
  </body>
 </html>