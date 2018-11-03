<?php
    require("logon.php");
    checkLoginAndRedirect();
    $loginFailed = ($_SESSION["login-fail"] == "true");
?>

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
	
    <title>Project: Behavior Tracker</title> 
  </head>
  
  <body>
  <?php include 'menu.php'; ?> <!	Add menu !>
	<body >
		
		<div class="container">
		
		<div class="login-form">
		<h1>Student Behavior Tracker</h1>
		<div class="main-div container">
		
			<div class="panel">
			   <h2>Login</h2>
			   <p>Enter your email and password below.</p>
		   </div>
			<form id="Login" action="project1_home.php" method="post">

				<div class="form-group">
					<input type="email" class="form-control" id="inputEmail" name="username" placeholder="Username">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Login</button>

			</form>
			</div>
		</div>
		</div>
		</div>
  </body>
  
 </html>