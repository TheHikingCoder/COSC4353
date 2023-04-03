<?php
	include("connection.php") ;

	$_SESSION['email'] = "t@t.com";
	$email = $_SESSION['email'];
	
	//make sure the user is logged in
	if(!isset($_SESSION['email']))
	{
	  //not logged in so redirect to login page
	  header("Location: login.html");
	  exit();
	}

	$query = "SELECT * FROM fuelOrders WHERE userID = '$email'";
	$orders = mysqli_query($con, $query);
	
	function validateData($orders) {
		while($row = mysqli_fetch_assoc($orders)){
			if($row['gallons'] == null || $row['deliveryAddress'] == null || $row['deliveryDate'] == null || $row['price'] == null || $row['total'] == null){
				return false;
			}
		}
		return true;
	}
    function writeToTable($orders) {
		if(validateData($orders)) {
			while($row = mysqli_fetch_assoc($orders)){
				$gallons = $row['gallons'];
				$address = $row['deliveryAddress'];
				$date = $row['deliveryDate'];
				$price = $row['price'];
				$total = $row['total'];

				echo "<tr><td>$gallons</td>
					<td>$address</td>
					<td>$date</td>
					<td>$price</td>
					<td>$total</td></tr>";
			}
        } else {
			header("Location: fuelTable.php?error=1");
			exit("Unable to Display Data");
		}
    }
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="fuelTable.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fuel Quote History</title>
	</head>
   
	<body>
		<div class="fuel-quote-page">
			<div class="table-background">
				<div>
					<h3>Fuel Quote History</h3>
				</div>
                <table class=".table">
					<tr>
						<th>Gallons Requested</th>
						<th>Delivery Address</th>
						<th>Delivery Date</th>
						<th>Suggested Price / Gallon</th>
						<th>Total Amount Due</th>
					</tr>
					<?php writeToTable($orders) ?>
                </table>
                <button onclick="window.location.href='fuelQuoteForm.html'">Go Back</button>
			</div>
		</div>
	</body>
</html>

