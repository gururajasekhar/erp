
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
		$username = $_SESSION['username'];
		$designation = $_SESSION['designation'];
		echo "Welcome ";
		echo $username;
		echo " to";
		echo '<H2 style="position: fixed;left: 50px;top: 10px;">'.$designation.' Module</H2><br>';
		?></div>
		<p></p>
		<div style="position: fixed; top: 70px;left: 50px;">
		
		<div class="btn btn-default" type="button" style="position: absolute; " >EDIT ACCOUNT</div>
		<BR><bR>
		<div class="btn btn-default" type="button" style="position: absolute; " ><a href="creditcard.php">SANCTION CREDIT CARD</a></div>
		</div>
		
	<div align="right"><a href="login.php">LOG OUT</a></div>	
	</body>
</html>