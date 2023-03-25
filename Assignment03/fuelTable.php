<?php
	$_SESSION['email'] = 't@t.com';
	//make sure the user is logged in
	if(!isset($_SESSION['email']))
	{
	  //not logged in so redirect to login page
	  header("Location: login.html");
	  exit();
	}

    $orders = [0=>['gallons'=>3, 'address'=>'123 Street, Houston, TX, 77498', 'date'=>'2023-04-01', 'price'=>'$10', 'total'=>'$30']];

	function validateData($orders) {
		for($i = 0; $i < sizeof($orders); $i++) {
			if($orders[$i]['gallons'] == null || $orders[$i]['address'] == "" || $orders[$i]['date'] == "" || $orders[$i]['price'] == "" || $orders[$i]['total'] == ""){
				return false;
			}
		}
		return true;
	}
    function writeToTable($orders) {
		if(validateData($orders)) {
			for($x = 0; $x < sizeof($orders); $x++){
				$gallons = $orders[$x]['gallons'];
				$address = $orders[$x]['address'];
				$date = $orders[$x]['date'];
				$price = $orders[$x]['price'];
				$total = $orders[$x]['total'];
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

