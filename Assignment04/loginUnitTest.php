<?php

	use PHPUnit\Framework\TestCase;

	class loginUnitTest extends TestCase
	{
		
		public function testLogin()
		{
			
			// Correct email and password as seen in 'login.php' file
			// This will be changed to database query in Assignment 04
			$correctEmail = "t@t.com";
			$correctPassword = "123";
        
			// Change 'root/login.php' with the path to the 'login.php' file on your system
			// I didn't include my path because it isn't useful for other people on different systems
			require_once 'root/login.php';

			// Invalid email and valid password test
			$testResult = login("invalidEmail@test.com", $correctPassword);
			$this->assertEquals("Invalid email!", $testResult);

			// Valid email and invalid password test
			$testResult = login($correctEmail, "invalidPassword");
			$this->assertEquals("Invalid password!", $testResult);

			// Empty email test
			$testResult = login("", $correctPassword);
			$this->assertEquals("Missing email!", $testResult);
			
			// Empty password test
			$testResult = login($correctEmail, "");
			$this->assertEquals("Missing password!", $testResult);
			
			// Valid email and valid password test
			$testResult = login($correctEmail, $correctPassword);
			$this->assertEquals("Login successful!", $testResult);
			
		}
	}
