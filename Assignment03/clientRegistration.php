<?php
    function createAccount($email, $password, $confirmPassword, $users) {
        if(array_key_exists($email, $users) || $password != $confirmPassword || $password == "" || $email == ""){
            return false;
        } else {
            return true;
        }
    }

    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $users = ['t@t.com' => '123'];
    
    $result = createAccount($email, $password, $confirmPassword, $users);

    if($result){
        //add account to db
        $users += [$email => $password];
        //create session
        $_SESSION['email'] = $email;
        //redirects to clientProfileManagement for user to input details
        header("Location: clientProfileMangement.html");
        exit();
    } else {
        header("Location: clientRegistration.html?error=1");
		exit();
    }

?>