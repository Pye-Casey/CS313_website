<!DOCTYPE html>
<html>
    
  <head>
    
	<?php include 'bootstrapScripts.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	
    <title>Behavior Tracker</title> 
  </head>
  
  <body>
  <?php include 'menu.php'; ?> <!	Add menu !>
	<body >
		<form action="project1_logon.php" >
			<div class="container">
			<?php
				session_destroy();
			?>
			<h2>Logout Success</h2>
			<p>You have been logged out.</p>
			<button type="submit"  class="btn btn-success" >Logon</button>
			</div>
		</form>
		
  </body>
  
 </html>