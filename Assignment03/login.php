<?php

	session_start();

	// Gets email and password from the 'login.html' form
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Hardcoded values; will replace with SQL query in Assignment 04
	$hardcodedEmail = 't@t.com';
	$hardcodedPassword = '123';

	// This triggers if the attempted login matches a registered user's credentials
	if ($email == $hardcodedEmail && $password == $hardcodedPassword)
	{
		
		// Create session
		$_SESSION['email'] = $email;
		
		// Redirects the user to the 'clientProfileManagement.html' page
		// May need to change where this redirects to
		header("Location: fuelQuoteForm.html");
		exit();
		
	} 

	// This triggers if the attempted login does not match a registered user's credentials
	else
	{

		// Displays an error message
		header("Location: login.php?error=1");
		exit();
		
	}
	
?>
