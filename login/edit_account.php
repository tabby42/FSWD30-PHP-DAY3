<?php 
	include "User.php";

	if (isset($_SESSION['username'])) {
		$user = User::getUserInfo($_SESSION['username']);

		$email_err = $firstname_err = $lastname_err = "";

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if ($email_err === "" && $firstname_err === "" && $lastname_err === "") {
				$user->email = trim($_POST["email"]);
				$user->updateUserInfo();
			}
		}

	}
	

?>