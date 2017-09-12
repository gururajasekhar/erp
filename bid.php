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
	<div style="position: fixed; left: 50px;top: 70px;">
	<?php
$con = mysqli_connect("localhost", "root","", "temperp");
				    if (!$con) {
				        echo "<div>";
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				        echo "</div>";
					}

		$query = "SELECT * FROM mortgageproperty  WHERE id = (select MAX(id) from mortgageproperty)";
        $result = mysqli_query( $con, $query);
        $row = mysqli_fetch_array($result);
        echo "<br>";
		echo "<br><b>Property</b>   : ".$row['product'];
		echo "<br><b>Details</b>     : ".$row['description'];
		echo "<br><b>Initial Amount</b>: ".$row['intitalAmount'];
	?>
	</div>
	<form style="position: fixed; left: 50px;top: 170px;" method="POST">
	<div ><input type="number" name="amount" placeholder="Enter your amount"></div><br>
	<input type="submit" value="Submit" name="submit" /><br>
	</form>
	<?php 
		if(isset($_POST["submit"])){  
  
			if(!empty($_POST['amount'])) {  
		
				    $user=$_POST['amount'];    
				  	$username = $_SESSION['outsidername'];
					$designation = $_SESSION['outsiderid'];
				    $con = mysqli_connect("localhost", "root","", "temperp");

				    if (!$con) {
				        echo "<div>";
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				        echo "</div>";
					}
				  	$query = "SELECT * FROM mortgageproperty  WHERE id = (select MAX(id) from mortgageproperty)";
        			$result = mysqli_query( $con, $query);
        			$row = mysqli_fetch_array($result);
        			$id = $row['id'];
        $queryname = "INSERT INTO bids (mortgageid,outsideid,outsidename,bidamount) VALUES ($id,$designation,'".$username."',$user);";
        			
        			if(mysqli_query($con,$queryname)){
        				echo '<script language="javascript">alert("Successfully submitted the bid...Please Log out if finished with your final BID");</script>';
        				//session_destroy();
        				//header('Location:existingOutside.php');
        			}else{
        				echo '<script language="javascript">alert("Not yet submitted");</script>';
        			}

			} 
			else {  
 				echo '<script language="javascript">alert("Please enter credentials");</script>';			    	
 			}  
		}else {  
 			//echo '<script language="javascript">alert("Not yet submitted form");</script>';  
		}  

	?>
	<div align="right"><a href="existingOutside.php">LOG OUT</a></div>
</body>
</html>