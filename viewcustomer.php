<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
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
	<div style="position: fixed; top: 70px;left: 50px;">
</body>
</html>