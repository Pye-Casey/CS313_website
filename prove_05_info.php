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
	<?php
		$sql = 'SELECT first_name, last_name, grade_level FROM student WHERE id="'. $_POST['id'] .'"';
		
		foreach ($db->query('SELECT id, first_name, last_name FROM student') as $row)
			{
				if ($row['id'] == $_POST['id']) {
					$id = $row['id'];
					$fName = $row['first_name'];
					$lName = $row['last_name'];
					$grade = $row['grade_level'];
					//echo $row['first_name'];
				}
				
			}
		//$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		//echo $_POST['id'];
		//echo $results;
		//echo $statement['first_name'];
		//echo $statement['last_name'];
		//echo $statement['grade_level'];
	?>
	<h1>Student Info Page</h1><br>
	<h2>Student Info</h2>
	<div class="container">
	
	<div class="row">
		<strong>First Name:</strong>  <?php echo $fName; ?>
	</div>
	<div class="row">
	<strong>Last Name: </strong> <?php echo $lName; ?>
	</div>
	<div class="row">
	<strong>Student ID Number: </strong> <?php echo $_POST['id']?>
	</div>
	<div class="row">
	<strong>Grade: </strong> <?php echo $grade; ?>
	</div>: 
	</div>
	<h2>Parents Info</h2>
	<div class="container">
	<table class="table table-striped table-responsive">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Bob Ross</td>
						<td>55555555</td>
						<td>email@mail.com<td>
					</tr>
					<tr>
						<td>2</td>
						<td>Turd Furgeson</td>
						<td>5555555</td>
						<td>email@mail.com<td>
					</tr>
				</tbody>
			</table>
	</div>
  </body>
</html>