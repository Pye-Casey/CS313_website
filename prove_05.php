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
	<h1>Prove 5: PHP Data Access
	<form  method="post">
		<div class="container">
			<h3>Students in database: </h3><br>
			<?php
				foreach ($db->query('SELECT id, first_name, last_name FROM student') as $row)
				{
				  echo 'Student ID: ' . $row['id']; 
				  echo '    ' . $row['first_name'] . ' ' . $row['last_name'] ;
				  //echo '    <button input="submit" name="studentID" value="' . $row['id'] . '">Info</button>' ; 
				  echo '<br/>';
				  // add session
				  $_SESSION["$row['id']"];
				}
	
			?>
			
		</div>
	</form>
  </body>
</html>