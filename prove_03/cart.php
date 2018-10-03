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
    <title>Shopping Cart</title>
	<script>
		$(document).ready(function(){
			updateCartSummary();
			
			$("#bearBtn").click(function(){
				$("#bearRow").remove();
			});
			$("#beaverBtn").click(function(){
				$("#beaverRow").remove();
			});
			$("#fireBtn").click(function(){
				$("#fireRow").remove();
			});
			$("#riverBtn").click(function(){
				$("#riverRow").remove();
			});
			// calculate price
			$("input").change(function(){
				updateCartSummary();
				
			});
			function updateCartSummary() {
				// Calculate initial quantity
				var quantity = 0;
				var bear = $("#bear_quantity").val();
				if (typeof bear === "undefined") {bear = 0;}
				var bear_price = bear * 15.0;
				var beaver = $("#beaver_quantity").val();
				if (typeof beaver === "undefined") {beaver = 0;}
				var beaver_price = beaver * 10.0;
				var fire = $("#fire_quantity").val();
				if (typeof fire === "undefined") {fire = 0;}
				var fire_price = fire * 15.0;
				var river = $("#river_quantity").val();
				if (typeof river === "undefined") {river = 0;}
				var river_price = river * 5.0;
				var total = parseInt(bear) + parseInt(beaver) + parseInt(fire) + parseInt(river);
				var totalPrice = bear_price + beaver_price + fire_price + river_price;
				$("#totalQuantity").text(total);
				$("#totalPrice").text(totalPrice);
				//$("#totalPrice").text(bear_price);
			}
		});
	</script>
  </head>
  <body>
	<?php include 'menu.php'; ?> <!	Add menu !>
	
	<form action="checkout.php" method="post">
	
	<div class="container">
	<h1>Shopping Cart</h1>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<! Create a table!>
			<div class="panel panel-default">
				<div class="panel-heading">Checkout Items</div>
				<div class="panel-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Quantity</th>
							<th>Item</th>
							<th>Price</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($_POST['bear_bath'] > 0) {
								echo '
								<tr id="bearRow">
									<td>
										<input id="bear_quantity" class="form-control input-group-sm col-lg-6 col-md-6 col-sm-6 col-xs-6" type="number" name="bear_bath" min="0" max="10" value="' .
										$_POST["bear_bath"] . '">
									</td>
									<td>Bear Scented Bubble Bath</td>
									<td>$15.00</td>
									<td>
										<button id="bearBtn" type="button" class="btn btn-danger" >
											<span class="glyphicon glyphicon-remove"></span> Delete
										</button>
									</td>
								</tr>
								';
							}
							if ($_POST['beaver_bath'] > 0) {
								echo '
								<tr id="beaverRow">
									<td>
										<input id="beaver_quantity" class="form-control input-group-sm col-lg-6 col-md-6 col-sm-6 col-xs-6" type="number" name="beaver_bath" min="0" max="10" value="' .
										$_POST["beaver_bath"] . '">
									</td>
									<td>Beaver Scented Bubble Bath</td>
									<td>$10.00</td>
									<td>
										<button id="beaverBtn" type="button" class="btn btn-danger" >
											<span class="glyphicon glyphicon-remove"></span> Delete
										</button>
									</td>
								</tr>
								';
							}
							if ($_POST['fire_bath'] > 0) {
								echo '
								<tr id="fireRow">
									<td>
										<input id="fire_quantity" class="form-control input-group-sm col-lg-6 col-md-6 col-sm-6 col-xs-6" type="number" name="fire_bath" min="0" max="10" value="' .
										$_POST["fire_bath"] . '">
									</td>
									<td>Fire Scented Bubble Bath</td>
									<td>$15.00</td>
									<td>
										<button id="fireBtn" type="button" class="btn btn-danger" >
											<span class="glyphicon glyphicon-remove"></span> Delete
										</button>
									</td>
								</tr>
								';
							}
							if ($_POST['river_bath'] > 0) {
								echo '
								<tr id="riverRow">
									<td>
										<input id="river_quantity" class="form-control input-group-sm col-lg-6 col-md-6 col-sm-6 col-xs-6" type="number" name="river_bath" min="0" max="10" value="' .
										$_POST["river_bath"] . '">
									</td>
									<td>River Scented Bubble Bath</td>
									<td>$5.00</td>
									<td>
										<button id="riverBtn" type="button" class="btn btn-danger" >
											<span class="glyphicon glyphicon-remove"></span> Delete
										</button>
									</td>
								</tr>
								';
							}
						?>
						
					</tbody>
				</table>
			</div>
			
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<h4>This is the cart summary</h4>
			<div class="panel panel-primary">
				<div class="panel-heading">Cart Summary</div>
				<div class="panel-body">
					<p>
						<span class="font-weight-bold">Item quantity: </span>
						<span id="totalQuantity" name="totalQuantity"><span>
					</p>
					<p>
						<span class="font-weight-bold">Total: $</span>
						<span id="totalPrice" name="totalPrice"><span>
					</p>
					
					<button id="submitBtn" type="submit" class="btn btn-primary col-lg-12 " >
						<span class="glyphicon glyphicon-ok"></span> Check Out
					</button>
				</div>
			</div>
		</div>
	</div>
	
	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_POST['bearBtn'])) {
				echo "Bear button pressed";
			}
		}
	?>
	
	</div>
		

	
	</form>
  </body>
</html>
