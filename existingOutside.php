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
<div style="position: fixed; left: 20px;"><a href="main.php">HOME</a></div>
<?php
	session_start();
	session_destroy();
?>
	<form style="position : fixed; left: 20px; top: 30px;"  name="submit"  method="POST">
	  <input type="text" name="empid" placeholder="Outsider ID"><br><br>
	  <input type="password" name="password" placeholder="Password"><br><br>
	  <input type="submit" value="Submit" name="submit" /><br>
	</form>
<?php  
if(isset($_POST["submit"])){  
  
	if(!empty($_POST['empid']) && !empty($_POST['password'])) {  
		
				    $user=$_POST['empid'];  
				    $pass=$_POST['password'];  
				  
				    $con = mysqli_connect("localhost", "root","", "temperp");

				    if (!$con) {
				        echo "<div>";
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				        echo "</div>";
					}
				  	
				    $query = "SELECT * FROM outsider WHERE outsideid = '$user' AND outsidepassword = '$pass'";
        			$result = mysqli_query( $con, $query);
        			
        			$row = mysqli_fetch_array($result);
        			//$rowname = mysqli_fetch_array($resultname);

        			$loggedIn = false;

        			if(!$row){
			            echo '<script language="javascript">alert("Invalid credentials");</script>';
			            echo '<br>';
			        }
			        else {
			            session_start();
			            	$_SESSION['outsidername']= $row['outsidename'];
			            	$_SESSION['outsiderid']= $row['outsideid'];
			            	header('Location:bid.php'); 
			        }
	} 
	else {  
 		echo '<script language="javascript">alert("Please enter credentials");</script>';			    	
 	}  
}else {  
// 	echo '<script language="javascript">alert("Not yet submitted");</script>';  
}  

?>  
</body>
</html>