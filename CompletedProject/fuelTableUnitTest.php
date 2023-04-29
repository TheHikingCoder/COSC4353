<?php
    use PHPUnit\Framework\TestCase;
    class fuelTableUnitTest extends TestCase {
        public function testFuelTable() {

           require_once 'app/fuelTable.php';
            //correct input
            $testResult = validateData($orders);
            $this->assertEquals(true, $testResult);

        }
    }
?>