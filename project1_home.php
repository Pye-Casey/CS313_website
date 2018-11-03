<?php
	require("project1_db.php");
	session_start();
	
	// get details
    $username = $_POST["username"];
    $password = $_POST["password"];

    
	
	if (!isset($username) || empty($username)) {
           /* header("HTTP/1.1 401 Unauthorized");
            header("Location: project1_logon.php");
            exit(); */
        }
	
	
	// query the database
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
		// check username
		$stmt = $db->prepare('SELECT password FROM behavior.user WHERE username=:username');
			$stmt->bindValue(':username', $username);
			$stmt->execute();
		// get rows
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$hash = $row["password"];
			
			if (strcmp($password, $hash) !== 0) 
			{
				$_Session["username"] = $username;
			} else {
				/*session_destroy();
				header("HTTP/1.1 401 Unauthorized");
				header("Location: project1_logon.php");
				exit();*/
			}
		
		
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
		/*header("HTTP/1.1 401 Unauthorized");
            header("Location: project1_logon.php");
            exit();*/
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
	<?php
		echo "Username: " . $username . ", password: " . $password . ", hash: " . $hash . "<br>";
	?>
	<form action="project1_event_view.php" method="post">
	<div class="container">
		<h2>Student Behavior Tracker</h2>
		<p>Welcome to the Student Behavior Tracker.</p>
		
		<div class="container">
		  <h3>Behavior Event List:</h3>
		         
		  <table class="table table-hover table-responsive">
			<thead>
			  <tr>
				<th>Student Name</th>
				<th>Reffering Staff</th>
				<th>Time</th>
				<th>Date</th>
				<th>Location</th>
				<th>Description</th>
				<th>View</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				// Add rows
				$db = queryDB("SELECT * FROM behavior.events AS events, behavior.students AS students WHERE events.student_id = students.id");
			?>
				
			<?php foreach ($db as $row):?>
				<tr>
				<td><?php echo ($row['first_name'] . " " . $row['last_name']);?></td>
				<td> <?php echo ($row['staff_name']);?></td>				
				<td><?php echo ($row['time']);?></td>
				<td><?php echo ($row['date']);?></td>
				<td><?php echo ($row['location']);?></td>
				<td><?php echo ($row['description']);?></td>
				<td>
					<button type='submit' value='<?php echo ($row["events.id"]);?>' name='id' class='btn btn-primary'>View</button>
				</td>
				</tr>
			
			<?php endforeach;?>
			</tbody>
		  </table>
		</div>
	</div>
	</form>
	
  </body>
 </html>