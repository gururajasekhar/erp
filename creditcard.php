<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
</head>
<body>
	<div style="position: fixed; top:70px;left: 50px;">
		<form name="go" method="POST">
			<br>
			<input  type="text" name="cusid" placeholder="Customer ID"><br>
			<br>
			<input type="submit" name="go" id="go" value="GO">
		</form>

		<?php
		if(isset($_POST["go"])){  

				if(!empty($_POST['cusid'])) {  
					
					    $cusid=$_POST['cusid'];    
					  
					    $con = mysqli_connect("localhost", "root","", "temperp");

					    if (!$con) {
					        echo "<div>";
					        echo "Failed to connect to MySQL: " . mysqli_connect_error();
					        echo "</div>";
						}
					  		
					    $query = "SELECT * FROM customer WHERE cusid = '$cusid'";
	        			$result = mysqli_query( $con, $query);
	        			$row = mysqli_fetch_array($result);
	        			
	        			$loggedIn = false;

	        			if(!$row){
				            echo '<script language="javascript">alert("Invalid Customer ID");</script>';
				            echo '<br>';
				        }
				        else {
				        	
				        	session_start();
				        	$_SESSION['cusid'] = $cusid;
				        	header('Location:temp.php');
				    //..echo "<br><b>".$row['cusname']."</b>";    		            	
				        }
				} 
				else {  
			 		echo '<script language="javascript">alert("Please enter Customer ID");</script>';			    	
			 	}  
			}else {  
			 	echo '<script language="javascript">alert("Enter customer ID and click GO ");</script>';  
			} 


		?>
	</div>
	
</body>
</html>