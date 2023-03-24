<?php
	session_start();

  //temporarily hardcoded
  $_SESSION['email'] = 't@t.com';

  //make sure the user is logged in
  if(!isset($_SESSION['email']))
  {
    //not logged in so redirect to login page
    header("Location: login.html");
    exit();
  }

  function completeProfile($fullName, $address1, $address2, $city, $state, $zip)
  {
    //temporarily hardcoded values
    /*$fullName = 'Allen Maredia';
    $address1 = '123 Street';
    $address2 = '';
    $city = 'Houston';
    $state = 'TX';
    $zip = 77498;*/

    //validate inputs
    if(!empty($fullName) && !empty($address1) && !empty($city) && !empty($state) && !empty($zip) && is_numeric($zip))
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  //form submitted
  if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    //gets values from the 'clientProfileManagement.html' form
    $fullName = $_POST['fullName'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    //check validity of inputs
    if(completeProfile($fullName, $address1, $address2, $city, $state, $zip))
    {
      if(!empty($address2) && isset($address2))
      {
        /*
          store the completed profile information with 2 address fields into the database here
        */
      }
      else
      {
        /*
          store the completed profile information with 1 address field into the database here
        */
      }
      
      //once information is stored in the database proceed to the fuel quote form
      header("Location: fuelQuoteForm.html");
      exit();
    }
    else
    {
      //invalid inputs
      header("Location: clientProfileManagement.html");
      exit('Invalid inputs');
    }
  }
    
?>
