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
		<h3>ENTER YOUR DETAILS</h3>
	  	<input type="text" name="outname" placeholder="Enter your name"><br><br>
	  	<input type="password" name="password" placeholder="Enter your Password"><br><br>
	  	<input type="number" name="aadhar" placeholder="Enter your Aadhar card Id"><br><br>
	  	<input type="submit" value="Submit" name="submit" /><br>
	</form>
	<?php
	if(isset($_POST["submit"])){  
  
			if(!empty($_POST['outname'])&&!empty($_POST['password'])&&!empty($_POST['aadhar'])) {  
		
				    $username=$_POST['outname'];    
				  	$userpass = $_POST['password'];
					$aadhar = $_POST['aadhar'];
				    $con = mysqli_connect("localhost", "root","", "temperp");

				    if (!$con) {
				        echo "<div>";
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				        echo "</div>";
					}

				  	$query = "SELECT * FROM outsider  WHERE outsideid = (select MAX(outsideid) from outsider)";
        			$result = mysqli_query($con, $query);
        			$row = mysqli_fetch_array($result);
        			$id = $row['outsideid'];
        			//echo $id;
        			$id = $id+1;
        			//echo $id;
        $queryname = "INSERT INTO outsider (outsideid,outsidename,outsidepassword,outsideaadhar) VALUES ($id,'".$username."','".$userpass."',$aadhar);";
        			
        			if(mysqli_query($con,$queryname)){
        				//echo '<script language="javascript">alert("Successfully created account for bidding GO TO HOME");</script>';
        				//session_destroy();
        				header('Location:existingOutside.php');

        			}else{
        				echo '<script language="javascript">alert("Not yet created");</script>';
        			}

			} 
			else {  
 				echo '<script language="javascript">alert("Please enter all details");</script>';			    	
 			}  
		}else {  
 			//echo '<script language="javascript">alert("Not yet submitted form");</script>';  
		}  
	
	?>
</body>
</html>