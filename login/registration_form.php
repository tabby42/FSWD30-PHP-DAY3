<?php include "registration.php";
$pagename = "Register";?>
	<?php include "header.php";?>
	<?php include "nav.php";?>
	<div class="container">
		<h1>Register</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
		    <label for="email">Email address</label>
		    <input type="text" class="form-control" name="email" placeholder="Email"
		    value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
		    <?php if (!empty($email_err)) {?>
		    	<p class="help-block alert alert-danger"><?php echo $email_err;?></p>
		    <?php }
		    ?>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password</label>
		    <input type="password" class="form-control" name="pwd" placeholder="Password">
		    <?php if (!empty($password_err)) {?>
		    	<p class="help-block alert alert-danger"><?php echo $password_err;?></p>
		    <?php }
		    ?>
		  </div>
		  <div class="form-group">
		    <label for="pwd_confirm">Confirm Password</label>
		    <input type="password" class="form-control" name="pwd_confirm" placeholder="Password">
		    <?php if (!empty($confirm_password_err)) {?>
		    	<p class="help-block alert alert-danger"><?php echo $confirm_password_err;?></p>
		    <?php }
		    ?>
		  </div>
		  <button type="submit" name="registerBtn" class="btn btn-default">Submit</button>
		</form>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

