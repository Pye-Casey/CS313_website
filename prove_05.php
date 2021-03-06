<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
	<?php include 'bootstrapScripts.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/prove3.css">
    <title>DB Access</title>
  </head>
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
  <body>
	<?php include 'menu.php'; ?> <!	Add menu !>
	<h1>Prove 5: PHP Data Access</h1>
	<form  action="prove_05_info.php" method="post">
		<div class="container">
			<h3>Students in database: </h3><br>
			<table class="table table-striped table-responsive">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Info</th>
				</thead>
				<tbody>
					<?php
						foreach ($db->query('SELECT id, first_name, last_name FROM student') as $row)
						{
						  echo '<tr>';
						  echo '<td>' . $row['id'] .'</td>';
						  echo '<td>'. $row['first_name'] . ' ' . $row['last_name'] . '</td>';
						  echo '<td><button input="submit" name="id" value="' . $row['id'] . '">Info</button></td>';
						  echo '</tr>';
						  
						  // add session
						  $_SESSION["id"] = $row['id'];
						}
					?>
					
				</tbody>
			</table>
			</div>
		
	</form>
  </body>
</html>