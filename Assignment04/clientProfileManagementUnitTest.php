<?php

use PHPUnit\Framework\TestCase;

final class clientProfileManagementUnitTest extends TestCase
{
    public function testCompleteProfile()
    {
        //temporary values
		$fullName = 'Allen Maredia';
        $address1 = '123 Street';
        $address2 = '';
        $city = 'Houston';
        $state = 'TX';
        $zip = 77498;
        
        include './src/clientProfileManagement.php';
        
        //valid inputs
		$testResult = completeProfile($fullName,$address1,$address2,$city,$state,$zip);
		$this->assertEquals(true, $testResult);

        //invalid zip
        $zip = 'abcdef';
        $testResult = completeProfile($fullName,$address1,$address2,$city,$state,$zip);
		$this->assertEquals(false, $testResult);

        //invalid fullName
        $fullName = null;
        $testResult = completeProfile($fullName,$address1,$address2,$city,$state,$zip);
		$this->assertEquals(false, $testResult);

        //invalid address
        $address1 = null;
        $testResult = completeProfile($fullName,$address1,$address2,$city,$state,$zip);
		$this->assertEquals(false, $testResult);

        //invalid city
        $city = null;
        $testResult = completeProfile($fullName,$address1,$address2,$city,$state,$zip);
		$this->assertEquals(false, $testResult);

        //invalid state
        $state = null;
        $testResult = completeProfile($fullName,$address1,$address2,$city,$state,$zip);
		$this->assertEquals(false, $testResult);

    }
}