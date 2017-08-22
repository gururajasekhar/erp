<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div style="position: fixed; left: 50px;top: 10px;"><?php
		session_start();
		$username = $_SESSION['outsidername'];
		$designation = $_SESSION['outsiderid'];
		echo "Welcome ";
		echo $username;
		echo " to";
		echo '<H2 style="position: fixed;left: 50px;top: 10px;"> JPM Mortgage Bidding Module</H2><br>';
	?></div>
	<div style="position: fixed; left: 50px;top: 70px;">Enter the bid amount for</div>
	<?php
	?>
	<form style="position: fixed; left: 50px;top: 100px;">
	<div ><input type="number" name="" placeholder="Enter your amount"></div><br>
	<input type="submit" value="Submit" name="submit" /><br>
	</form>
	<?php 
	?>
	<div align="right"><a href="login.php">LOG OUT</a></div>
</body>
</html>