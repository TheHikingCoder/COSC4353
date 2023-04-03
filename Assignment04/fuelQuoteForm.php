<?php

    session_start();
    include ("connection.php");

	if (!isset($_SESSION['email'])){
		header("Location: login.html");
		exit();
	}
	
	//getting address1 from client information table
	$sql = "SELECT Address1 FROM ClientInformation";
	$result = mysqli_query($con, $sql);
	$temp = mysqli_fetch_assoc($result);
	echo $temp;

	$address1 = $temp;

/*
    $hardcodeAddress = '123 Street';

    if (empty($_GET['address1'])){
		$address1 = $temp;
        //$address1 = $hardcodeAddress;
    }

    else{
    $address1 = $_GET['address1']; 
    }

*/

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fuel Quote Form</title>
	</head>
	
	<body>
		<div class="fuel-quote-form">
			<div class="form">
				<div class="fuel-quote">
					<div class="fuel-header">
						<h3>Fuel Quote Form</h3>
							<p>Please Fill Out Fuel Quote</p>
					</div>
				</div>
				<form class="fuelq-form" action = "price.php" method="get">
                    <label for="Gallons">Gallons Requested</label>
					<input type="number" name = "galreq" id="galreq" placeholder="Gallons requested" min="1" required/>

                    <label for="Address">Delivery Address</label> 
                   
                    <input type = "text" name = "address1" value = "<?php echo $address1;?>" readonly/>
        
                    <label for="Date">Delivery Date</label>
					<input type="date" name = "delivery" id="delivery" required/>

                	<button>Submit</button>


				</form>
			</div>
		</div>
	</body>

</html>

