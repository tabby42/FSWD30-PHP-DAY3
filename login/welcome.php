<?php 
$pagename = "Welcome";?>
<?php include "header.php";?>
<?php include "nav.php";?> 
<div class="container">
	<?php if (isset($_SESSION['username'])): ?>
		<h1>Welcome, <?php echo $_SESSION['username'];?></h1>
	<?php endif ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>