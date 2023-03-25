<?php
    use PHPUnit\Framework\TestCase;
    class fuelTableUnitTest extends TestCase {
        public function testFuelTable() {

           require_once 'app/fuelTable.php';
            //correct input
            $orders = [0=>['gallons'=>3, 'address'=>'123 Street, Houston, TX, 77498', 'date'=>'2023-04-01', 'price'=>'$10', 'total'=>'$30']];
            $testResult = validateData($orders);
            $this->assertEquals(true, $testResult);

            $ordersMissingGallons = [0=>['gallons'=>null, 'address'=>'123 Street, Houston, TX, 77498', 'date'=>'2023-04-01', 'price'=>'$10', 'total'=>'$30']];
            $testResult = validateData($ordersMissingGallons);
            $this->assertEquals(false, $testResult);

            $ordersMissingAddress = [0=>['gallons'=>3, 'address'=>'', 'date'=>'2023-04-01', 'price'=>'$10', 'total'=>'$30']];
            $testResult = validateData($ordersMissingAddress);
            $this->assertEquals(false, $testResult);
            
            $ordersMissingDate = [0=>['gallons'=>3, 'address'=>'123 Street, Houston, TX, 77498', 'date'=>'', 'price'=>'$10', 'total'=>'$30']];
            $testResult = validateData($ordersMissingDate);
            $this->assertEquals(false, $testResult);

            $ordersMissingPrice = [0=>['gallons'=>3, 'address'=>'123 Street, Houston, TX, 77498', 'date'=>'2023-04-01', 'price'=>'', 'total'=>'$30']];
            $testResult = validateData($ordersMissingPrice);
            $this->assertEquals(false, $testResult);

            $ordersMissingTotal = [0=>['gallons'=>3, 'address'=>'123 Street, Houston, TX, 77498', 'date'=>'2023-04-01', 'price'=>'$10', 'total'=>'']];
            $testResult = validateData($ordersMissingTotal);
            $this->assertEquals(false, $testResult);

        }
    }
?>