<?php
    session_start();
    //Temporary value if no address
    $hardcodeAddress = '543 street';
    if (empty($_GET['address1'])){
        $address1 = $hardcodeAddress;
    }
    else{
    $address1 = $_GET['address1']; 
    }
   
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
                    <!--Getting the Address value from Client Profile Management.php-->
                    <input type = "text" name = "address1" value = "<?php echo $address1;?>" readonly/>
        
                    <label for="Date">Delivery Date</label>
					<input type="date" name = "delivery" id="delivery" required/>

                <button>Submit</button>


				</form>
			</div>
		</div>
	</body>

</html>

