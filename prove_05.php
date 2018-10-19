<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
	<?php include '../bootstrapScripts.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/prove3.css">
    <title>Prove 3</title>
  </head>
  <body>
	<?php include '/menu.php'; ?> <!	Add menu !>
	
	<form action="cart.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
				<h1>Prove 3: Shopping Cart</h1>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
				<button id="submitBtn" type="submit" class="btn btn-info">
					<span class="glyphicon glyphicon-shopping-cart"></span> Go to Cart
				</button><br>
			</div>
		</div>
	</div>
		
	<div class="container">
		<div class="row"><br></div>
		<div class="row product panel">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<img class="thumbnail" src="images/bear.jpg" alt="Bear" height="150px">
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<h3>Price: $15.00</h3><br>
				<input id="bear_quantity" class="form-control input-group-sm col-lg-3 col-md-3 col-sm-3 col-xs-3" type="number" name="bear_bath" min="0" max="10">  
				<button type="button" class="btn btn-primary" onclick='document.getElementById("bear_quantity").stepUp();'>
					<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
				</button><br>
				<span id="bear_span"></span>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<h3>Bear Scented Bubble Bath</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		
		<div class="row"></div>
		
		<div class="row product panel">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<img class="thumbnail" src="images/beaver.jpg" alt="beaver" height="150px">
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<h3>Price: $10.00</h3><br>
				<input id="beaver_quantity" class="form-control input-group-sm col-lg-3 col-md-3 col-sm-3 col-xs-3" type="number" name="beaver_bath" min="0" max="10">  
				<button type="button" class="btn btn-primary" onclick='document.getElementById("beaver_quantity").stepUp();'>
					<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
				</button><br>
				<span id="beaver_span"></span>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<h3>Beaver Scented Bubble Bath</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		
		<div class="row"></div>
		
		<div class="row product panel">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<img class="thumbnail" src="images/fire.jpg" alt="fire" height="150px">
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<h3>Price: $15.00</h3><br>
				<input id="fire_quantity" class="form-control input-group-sm col-lg-3 col-md-3 col-sm-3 col-xs-3" type="number" name="fire_bath" min="0" max="10">  
				<button type="button" class="btn btn-primary" onclick='document.getElementById("fire_quantity").stepUp();'>
					<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
				</button><br>
				<span id="fire_span"></span>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<h3>Fire Scented Bubble Bath</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		
		<div class="row"></div>
		
		<div class="row product panel">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<img class="thumbnail" src="images/river_bank.jpg" alt="river" height="150px">
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<h3>Price: $5.00</h3><br>
				<input id="river_quantity" class="form-control input-group-sm col-lg-3 col-md-3 col-sm-3 col-xs-3" type="number" name="river_bath" min="0" max="10">  
				<button type="button" class="btn btn-primary" onclick='document.getElementById("river_quantity").stepUp();'>
					<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
				</button><br>
				<span id="river_span"></span>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<h3>River Scented Bubble Bath</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		
	</div>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submitBtn'])) {
        /*
			$_SESSION["bear_bath"] = getElementById('bear_quantity').value();
			$_SESSION["beaver_bath"] = 0;
			$_SESSION["fire_bath"] = 0;
			$_SESSION["river_bath"] = 0;
			*/
		}
		
	}
	
	?>
	</form>
  </body>
</html>