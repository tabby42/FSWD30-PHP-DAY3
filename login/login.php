<?php 
	include "User.php";
	//error variables
	$username_err = $login_password_err = $login_err = "";
	//process form data
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		$user = new User();
		//validate username
    	if(empty(trim($_POST["username"]))){
    		$username_err = "Please enter your username.";
    	} else {
    		$user->username = trim($_POST["username"]);
    		$username_err = "";
    	}
    	// Check if password is empty
	    if(empty(trim($_POST['pwd_login']))){
	        $login_password_err = 'Please enter your password.';
	    } else{
	        $user->password = trim($_POST['pwd_login']);
	        $login_password_err = "";
	    }

	    if ($username_err === "" && $login_password_err === "") {
	    	if (!$user->checkCredentials()) {
	    		$login_err = "Access denied.";
	    	} else {
	    		$login_err = "";
	    		session_start();
                $_SESSION['username'] = $user->username;      
                header("location: welcome.php");
	    	}
	    }
	}

?>