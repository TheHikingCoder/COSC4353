<?php
    session_start();
    include ("connection.php");

    if(!isset($_SESSION['email'])){
        header("Location: login.html");
        exit();
    }

    //valid check if gallons, address and delivery date
    function price($gallons, $address1, $deliveryD){
        if (!empty($gallons) && !empty($address1) && !empty($deliveryD)){
            return true;
        }
        else{
            return false;
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $address1 = $_GET['address1'];
        $gallonReq = $_GET['galreq'];
        $delivery = $_GET['delivery'];
        
        //price module here: $price = x, $total = y

        if (price($gallonReq, $address1, $delivery)){
            $query = "INSERT INTO FuelOrders(gallons, deliveryAddress, deliveryDate) VALUES ('$gallonReq', '$address1', '$delivery')";
            $result = mysqli_query($con, $query);
           // echo "PRICE WORKS";
           /*
            if($result){
                echo "RESULT WORKED";
            }
            else{
                echo "RESULT DIDNT WORK";
            }
            */
        }
        else{
            echo "INVALID";
        }
        
    
    }

    else{
        header("Location: fuelQuoteForm.php");
        exit('Invalid Inputs');
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

                    <!--Info from pricing in above php gets echoed down here-->

                    <label for="suggestPrice">Suggested Price</label>
					<input type="number" name = "price" placeholder= "999" step="0.01" readonly>
					
                    <label for="Total">Total Amount Due</label>
					<input type="number" name = "total" placeholder="999" step="0.01" readonly>
                </form>

                <form class = "history" action = "fuelTable.php">
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