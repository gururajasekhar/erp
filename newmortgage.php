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
	<form style="position : fixed; left: 20px; top: 30px;"  name="submit"  method="POST">
		
	  	<input type="number" name="proid" placeholder="Enter product ID"><br><br>
	  	<input type="text" name="proname" placeholder="Enter product name"><br><br>
	  	<input type="text" name="prodes" placeholder="Enter product description"><br><br>
	  	<input type="number" name="intial" placeholder="Enter intial BID amount"><br><br>
	  	<input type="submit" value="Submit" name="submit" /><br>
	</form>
	<?php
		if(isset($_POST["submit"])){  
  
			if(!empty($_POST['proid'])&&!empty($_POST['proname'])&&!empty($_POST['prodes'])&&!empty($_POST['intial'])) {  
		
				    $userid=$_POST['proid'];    
				  	$username = $_POST['proname'];
					$des = $_POST['prodes'];
					$intial = $_POST['intial'];
				    $con = mysqli_connect("localhost", "root","", "temperp");

				    if (!$con) {
				        echo "<div>";
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				        echo "</div>";
					}

				  	
        $queryname = "INSERT INTO mortgageproperty (id,product,description,intitalAmount) VALUES ($userid,'".$username."','".$des."',$intial);";
        			
        			if(mysqli_query($con,$queryname)){
        				//echo '<script language="javascript">alert("Successfully created current product for bidding ");</script>';
        				//session_destroy();
        				header('Location:biddingAdmin.php');

        			}else{
        				echo '<script language="javascript">alert("Not yet created");</script>';
        			}

			} 
			else {  
 				echo '<script language="javascript">alert("Please enter all details admin");</script>';			    	
 			}  
		}else {  
 			//echo '<script language="javascript">alert("Not yet submitted form");</script>';  
		}  
	
	?>
</body>
</html>