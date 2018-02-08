<?php include "login.php";
$pagename = "Login";?>
<?php include "header.php";?>
<?php include "nav.php";

?>
	<div class="container">
		<h1>Login</h1>
		<p>Don't have an account yet? <a class="btn btn-default" href="registration_form.php">Register here</a></p>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			<?php if (!empty($login_err)) {?>
			    	<p class="help-block alert alert-danger"><?php echo $login_err;?></p>
			    <?php }
			    ?>
			<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="username" placeholder="Username"
			    value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
			    <?php if (!empty($username_err)) {?>
			    	<p class="help-block alert alert-danger"><?php echo $username_err;?></p>
			    <?php }
			    ?>
			</div>
			<div class="form-group">
			    <label for="pwd_login">Password</label>
			    <input type="password" class="form-control" name="pwd_login" placeholder="Password">
			    <?php if (!empty($login_password_err)) {?>
			    	<p class="help-block alert alert-danger"><?php echo $login_password_err;?></p>
			    <?php }
			    ?>
			</div>
		  	<button type="submit" name="loginBtn" class="btn btn-default">Submit</button>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>