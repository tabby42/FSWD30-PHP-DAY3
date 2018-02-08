<?php 
require_once "db_config.php";

Class User {
	public $id;
	public $username;
	public $email;
	public $password;
	public $createdAt;

	function __construct() {
        
    }

	static function fakeConstruct($username, $email, $password) {
		$instance = new self();
		$instance->username = $username;
		$instance->email = $email;
		$instance->password = $password;
        return $instance;
	}
	
	function checkUsername () {
		$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$connection->set_charset("utf8mb4");

		// Check connection
		if($connection === false){
		    die("ERROR: Could not connect. " . $mysqli->connect_error);
		}
		// Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $connection->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            // Set parameters
            $param_username = $this->username;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $stmt->close();
                    return false;
                } else{
                	$stmt->close();
                    return true;
                }
            } else{
            	$stmt->close();
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $connection->close();
	}

	function checkEmail() {
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
		  return false;
		}
		return true;
	}

	function checkPassword() {
		if (strlen($this->password) < 8) {
			return false;
		}
		return true;
	}

	function createNewUser() {
		$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$connection->set_charset("utf8mb4");

		// Check connection
		if($connection === false){
		    die("ERROR: Could not connect. " . $mysqli->connect_error);
		}
		 //statement
		 $sql = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?)";
		 //prepare statement
		 if($stmt = $connection->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_password, $param_email);
            // Set parameters
            $param_username = $this->username;
            //password_hash -> creates a password hash and
            //generates and applies a random salt automatically
            $param_password = password_hash($this->password, PASSWORD_DEFAULT); 
            $param_email = $this->email;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login-form.php");
            	$stmt->close();
            } else{
                echo "Something went wrong. Please try again later.";
            	$stmt->close();
            } 
        }
        $connection->close();
	}

	function checkCredentials() {
		$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$connection->set_charset("utf8mb4");
		// Check connection
		if($connection === false){
		    die("ERROR: Could not connect. " . $mysqli->connect_error);
		}
		 //statement
		$sql = "SELECT username, pwd FROM users WHERE username = ?";

		if($stmt = $connection->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            // Set parameters
            $param_username = $this->username;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                /// Store result
                $stmt->store_result();
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){ 
                	// Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                    	if(password_verify($this->password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
            				$stmt->close();
        					$connection->close();
                            return true;
                        } else{
            				$stmt->close();
        					$connection->close();
                            return false;
                        }
                    }
                } else {
            		$stmt->close();
        			$connection->close();
                	return false;
                }
            } 
        }
	}

}


?>