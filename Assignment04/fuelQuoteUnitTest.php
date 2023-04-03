<?php

	use PHPUnit\Framework\TestCase;

	class price_fuelQuoteUnitTest extends TestCase
	{
		
		public function fuelQuoteForm()
		{
			
			// temp values
			$Address = "123 Street";
            $Gallons = "3";
            $Delivery = "2023-04-30"
			
        
			//price.php essentially covers fuel quote module and price module together 
        
			include './src/client/price.php'

			// Invalid gallons and valid address and delivery
			$testResult = price("Incorrect Gallons", $correctAddress, $correctDelivery);
			$this->assertEquals("Invalid Gallons!", $testResult);

			// Valid gallons, delivery and invalid address
			$testResult = price($correctGallons, "Incorrect Address", $correctDelivery);
			$this->assertEquals("Invalid Address!", $testResult);
            
            //Valid gallons, address, and invalid delivery
            $testResult = price($correctGallons, $correctAddress, "Incorrect Delivery");
			$this->assertEquals("Invalid Delivery!", $testResult);
            
            //Invalid gallons, delivery and valid address
            $testResult = price("Incorrect Gallons", $correctAddress, "Incorrect Delivery");
			$this->assertEquals("Invalid Gallons! & Invalid Delivery", $testResult);
            

			// Empty Gallons test
			$testResult = price("",  $correctAddress, $correctDelivery);
			$this->assertEquals("Missing Gallons!", $testResult);

            // Empty Address test
			$testResult = price($correctGallons, "", $correctDelivery);
			$this->assertEquals("Missing Address", $testResult);

            // Empty Delivery test
			$testResult = price($correctGallons, $correctAddress, "");
			$this->assertEquals("Missing Delivery", $testResult);

			
			
			// Valid gallons, address and delivery
			$testResult = price($correctGallons, $correctAddress, $correctDelivery);
			$this->assertEquals("Valid Fuel Quote! Ready for Pricing", $testResult);
			
		}
	}