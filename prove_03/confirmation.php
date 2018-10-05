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
    <title>Confirmation</title>
	</head>
  <body>
  <?php include 'menu.php'; ?> <!	Add menu !>
  
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="container">
		<h1>Confirmation</h1>
		<p>Your order has been submitted. Order details are below.</p>
		<div class="panel panel-default col-lg-6 col-md-6 col-sm-12 col-xs-12">
		  <div class="panel-heading">Purchased Items</div>
		  <div class="panel-body">
		  <?php
			$bear = $beaver = $fire = $river = "";
			$total = 0;
			if ($_POST["bear_bath"] > 0) {
				echo "Bear Bath x " . $_POST["bear_bath"] . "<br>";
				$bear = $_POST["bear_bath"];
			}else {
				$bear = 0;
			}
			if ($_POST["beaver_bath"] > 0) {
				echo "Beaver Bath x " . $_POST["beaver_bath"] . "<br>";
				$beaver = $_POST["beaver_bath"];
			}else {
				$beaver = 0;
			}
			if ($_POST["fire_bath"] > 0) {
				echo "Fire Bath x " . $_POST["fire_bath"] . "<br>";
				$fire = $_POST["fire_bath"];
			}else {
				$fire = 0;
			}
			if ($_POST["river_bath"] > 0) {
				echo "River Bath x " . $_POST["river_bath"] . "<br>";
				$river = $_POST["river_bath"];
			}else {
				$river = 0;
			}
			$total = ($bear * 15) + ($beaver * 10) + ($fire * 15) + ($river * 5);
			$_POST["totalPrice"] = $total;
			echo "Your total is: $" . $total;
		  ?>
		  
		  </div>
		</div>
		
		<div class="panel panel-default col-lg-6 col-md-6 col-sm-12 col-xs-12">
		  <div class="panel-heading">Shipping Information</div>
		  <div class="panel-body">
		  <?php echo $_POST["firstName"]?> <?php echo $_POST["lastName"]?>  <br>
		  <?php echo $_POST["street"]?> <br>
		  <?php echo $_POST["city"]?> , <?php echo $_POST["state"]?> <?php echo $_POST["zip"]?>
		  </div>
		</div>
	</div>
	</form>
