<?php $pagename = "Account";
		include "header.php";?>
<?php include "nav.php";?>
<?php include "edit_account.php";?>
<div class="container">
	<h1>Account</h1>
	  <div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo $user->username;?></h3>
	  </div>
	  <div class="panel-body">
	    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" accept-charset="utf-8">
	    	<div class="form-group">
			    <label for="email">Email address</label>
			    <input type="text" class="form-control" name="email" placeholder="Email"
			    value="<?php echo isset($user->email) ? $user->email : '' ?>">
			    <?php if (!empty($email_err)) {?>
			    	<p class="help-block alert alert-danger"><?php echo $email_err;?></p>
			    <?php }
			    ?>
			</div>
			<div class="form-group">
			    <label for="firstname">First Name</label>
			    <input type="text" class="form-control" name="firstname" placeholder="First Name"
			    value="<?php echo isset($user->firstname) ? $user->firstname : '' ?>">
			    <?php if (!empty($firstname_err)) {?>
			    	<p class="help-block alert alert-danger"><?php echo $firstname_err;?></p>
			    <?php }
			    ?>
			</div>
			<div class="form-group">
			    <label for="firstname">Last Name</label>
			    <input type="text" class="form-control" name="lastname" placeholder="Last Name"
			    value="<?php echo isset($user->lastname) ? $user->lastname : '' ?>">
			    <?php if (!empty($lastname_err)) {?>
			    	<p class="help-block alert alert-danger"><?php echo $lastname_err;?></p>
			    <?php }
			    ?>
			</div>
	  		<button type="submit" name="editBtn" class="btn btn-default">Save</button>
	    </form>
	  </div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>