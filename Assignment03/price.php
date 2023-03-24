<?php
	function price($gallons, $address, $deliveryD){
        	$hardcodeAddress = '123 street';
        	$hardcodeGallonsReq = '3';
        	$hardcodeDelivery = '2023-04-01';

        	if($gallons == $hardcodeGallonsReq && $address == $hardcodeAddress && $deliveryD == $hardcodeDelivery ){
            		return true;
        	}

        	else{
            		return false;
        	}
    }

    session_start();
    $price = "temporary";
    $hardcodeAddress = '123 street';
    $hardcodeGallonsReq = '3';
    $hardcodeDelivery = '2023-04-01';

    if (empty($_GET['address1']) && empty($_GET['galreq']) && empty($_GET['delivery'])){
        $address1 = $hardcodeAddress;
        $gallonReq = $hardcodeGallonsReq;
        $delivery = $hardcodeDelivery;
    }
    //Getting values from fuel quote form
    else{
    	$address1 = $_GET['address1']; 
    	$gallonReq = $_GET['galreq'];
    	$delivery = $_GET['delivery'];
    }

  $result = price($gallonReq, $address1, $delivery);
    if (!$result){
        header("Location: fuelQuoteForm.php?error=1");
        exit();
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
							<p>Review Your Fuel Quote</p>
					</div>
				</div>
                <!--submitting here would move push all information in the fueql-form to the fuel table-->
				<form class="fuelq-form">
                    <label for="Gallons">Gallons Requested</label>
					<input type="number" name = "galreq" value = "<?php echo ($gallonReq);?>" readonly/>

                    <label for="Address">Delivery Address</label> 
                    <!--Getting the Address value from Client Profile Management.php-->
                    <input type = "text" name = "address1" value = "<?php echo ($address1);?>" readonly/>
        
                    <label for="Date">Delivery Date</label>
					<input type="date" name = "delivery" value = "<?php echo ($delivery);?>" readonly/>
<!--   
    Here you would make the pricing module that does calculations, info gathered from gallons requested, address, is previous client

-->
                    <label for="suggestPrice">Suggested Price</label>
					<input type="number" name = "price" placeholder= "999" step="0.01" readonly>
					
                    <label for="Total">Total Amount Due</label>
					<input type="number" name = "total" placeholder="9999" step="0.01" readonly>
                </form>

                <form class = "history" action = "fueltable.html">
                    <button>View Fuel History</button>
                    <br></br>
                </form>

                <form class = "modify" action = "fuelQuoteForm.php">
                    <button>Modify Fuel Quote</button>
				</form>
			</div>
		</div>
	</body>

</html>
