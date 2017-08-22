<!DOCTYPE html>
<html>

<head>
	<title>ERP MODULE</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	session_start();
	session_destroy();
?>
	<form style="position : fixed; left: 20px; top: 30px;"  name="submit"  method="POST">
	  <input type="text" name="empid" placeholder="Employee ID"><br><br>
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
				  	
				    $query = "SELECT designation FROM employee WHERE empid = '$user' AND password = '$pass'";
        			$result = mysqli_query( $con, $query);
        			$queryname = "SELECT empname FROM employee WHERE empid = '$user' AND password = '$pass'";
        			$resultname = mysqli_query( $con, $queryname);
        			$row = mysqli_fetch_array($result);
        			$rowname = mysqli_fetch_array($resultname);

        			$loggedIn = false;

        			if(!$row){
			            echo '<script language="javascript">alert("Invalid credentials");</script>';
			            echo '<br>';
			        }
			        else {
			            $loggedIn = true;
			            echo '<script language="javascript">alert("Logged in");</script>';
			            echo '<br>';
			            if($row['designation']=='Manager'||$row['designation']=='RM'){
			            	session_start();
			            	$_SESSION['username']= $rowname['empname'];
			            	$_SESSION['designation']= $row['designation'];
			            	header('Location:rmandmanager.php'); 
			            }else if($row['designation']=='Bidding Manager'){
			            	session_start();
			            	$_SESSION['username']= $rowname['empname'];
			            	$_SESSION['designation']= $row['designation'];
			            	header('Location:biddingAdmin.php');
			            }
			            else{
			            	session_start();
			            	$_SESSION['username']= $rowname['empname'];
			            	$_SESSION['designation']= $row['designation'];
			            	header('Location:tellerandpba.php');
			            }
			        }
	} 
	else {  
 		echo '<script language="javascript">alert("Please enter credentials");</script>';			    	
 	}  
}else {  
 	//echo '<script language="javascript">alert("Not yet submitted");</script>';  
}  

?>  
</body>
</html>