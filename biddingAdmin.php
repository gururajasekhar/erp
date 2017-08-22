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
	<div style="position: fixed; top: 70px;left: 50px;">
		<form name="go" method="POST">
			<br>
			<input  type="text" name="proid" placeholder="Product ID"><br>
			<br>
			<input type="submit" name="go" id="go" value="GO">
		</form>
		<?php
		if(isset($_POST["go"])){  

				if(!empty($_POST['proid'])) {  
					
				    $proid=$_POST['proid'];    
				  
				    $con = mysqli_connect("localhost", "root","", "temperp");

				    if (!$con) {
				        echo "<div>";
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				        echo "</div>";
					}
				  		
				    $query = "SELECT * FROM bids WHERE mortgageid = '$proid' ORDER BY bidamount desc";
        			$result = mysqli_query( $con, $query);
        			//$row = mysqli_fetch_array($result);
        			
        			$loggedIn = false;

        			if(!$result){
			            echo '<script language="javascript">alert("Invalid Product ID");</script>';
			            echo '<br>';
			        }
			        else {
			    		
						echo "<table>";

						while($row = mysqli_fetch_array($result)){   
						echo "<tr><td>" . $row['outsideid'] . "</td><td>" . $row['outsidename'] . "</td><td>" . $row['bidamount'] . "</td></tr>";  
						}

						echo "</table>";
			        }
				} 
				else {  
			 		echo '<script language="javascript">alert("Please enter Product ID");</script>';			    	
			 	}  
			}else {  
			 	echo '<script language="javascript">alert("Enter Product ID and click GO ");</script>';  
			}  

		?>
	</div>
</body>