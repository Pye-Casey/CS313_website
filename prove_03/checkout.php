<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
	<?php include '../bootstrapScripts.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/prove3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Check Out</title>
	<?php
		function cleanUp($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		// assign session variables
		if (isset($_POST["bear_bath"])== false) {
			$_POST["bear_bath"] = 0;
		}
		if (isset($_POST["beaver_bath"])== false) {
			$_POST["beaver_bath"] = 0;
		}
		if (isset($_POST["fire_bath"]) == false) {
			$_POST["fire_bath"] = 0;
		}
		if (isset($_POST["river_bath"])== false) {
			$_POST["river_bath"] = 0;
		}
		$_SESSION["bear"] = cleanUp($_POST["bear_bath"]);
		$_SESSION["beaver"] = cleanUp($_POST["beaver_bath"]);
		$_SESSION["fire"] = cleanUp($_POST["fire_bath"]);
		$_SESSION["river"] = cleanUp($_POST["river_bath"]);

		/*
		<input type="hidden" name="bear_bath" value="<?php echo cleanUp($_POST["bear_bath"]); ?>">
		<input type="hidden" name="beaver_bath" value="<?php echo cleanUp($_POST["beaver_bath"]); ?>">
		<input type="hidden" name="fire_bath" value="<?php echo cleanUp($_POST["fire_bath"]); ?>">
		<input type="hidden" name="river_bath" value="<?php echo cleanUp($_POST["river_bath"]); ?>">
		<input type="hidden" name="totalPrice" value="<?php echo cleanUp($_POST["totalPrice"]); ?>">
		*/
	?>
	<script>
		$(document).ready(function(){
					
			$("#returnBtn").click(function(){
				window.location.href="cart.php";
			});
		});
	</script>
	</head>
  <body>
  <?php include 'menu.php'; ?> <!	Add menu !>
  <form action="confirmation.php" method="post">
	<div class="container">
	<h1>Check Out</h1>
	<p>Please provide your name and address below and verify your purchases.</p>
	<div class="panel panel-default col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  <div class="panel-heading">Shipping Information</div>
	  <div class="panel-body">
		<div class="row">
			<div class="col-xs-6">
				First Name: <input type="text" class="form-control input-md" name="firstName"> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				Last Name: <input type="text" class="form-control input-md" name="lastName"> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				Street 1: <input type="text" class="form-control input-md" name="street"> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				City: <input type="text" class="form-control input-md" name="city"> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				State: <input type="text" class="form-control input-md" name="state"> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				Zip: <input type="text" class="form-control input-md" name="zip">
			</div>
		</div>
	  </div>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<button id="returnBtn" type="button" class="btn btn-info">
					<span class="glyphicon glyphicon-shopping-cart"></span> 
					Go Back
				</button>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<button id="checkoutBtn" type="submit" class="btn btn-success align-self-end">
					<span class="glyphicon glyphicon-thumbs-up"></span> Check Out
				</button>
			</div>
		</div>
		
	</div>
	<div>
		<input type="hidden" name="bear_bath" value="<?php echo cleanUp($_POST["bear_bath"]); ?>">
		<input type="hidden" name="beaver_bath" value="<?php echo cleanUp($_POST["beaver_bath"]); ?>">
		<input type="hidden" name="fire_bath" value="<?php echo cleanUp($_POST["fire_bath"]); ?>">
		<input type="hidden" name="river_bath" value="<?php echo cleanUp($_POST["river_bath"]); ?>">
		<input type="hidden" name="totalPrice" value="<?php echo cleanUp($_POST["totalPrice"]); ?>">
	</div>
	
	
  </form>
  </body>
 </html>
