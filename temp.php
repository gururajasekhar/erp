<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
</head>
<body>

		<form name="go2" method="POST">
			<br>
			<input  type="text" name="barcode" placeholder="Enter barcode generated"><br>
			<br>
			<input type="submit" name="go2" id="go" value="SUBMIT">
		</form>
<?php
						
						if(isset($_POST["go2"])){
				    		if(!empty($_POST['barcode'])){
				    			session_start();
				    			$cusid=$_SESSION['cusid'];    
					  			
$con = mysqli_connect("localhost", "root","", "temperp");					
							    if (!$con) {
							        echo "<div>";
							        echo "Failed to connect to MySQL: " . mysqli_connect_error();
							        echo "</div>";
								}
							  		
							    $query = "SELECT * FROM customer WHERE cusid = '$cusid'";
			        			$result = mysqli_query( $con, $query);
			        			$row = mysqli_fetch_array($result);
				    			$bar = $_POST['barcode'];
				    			$queryname = "UPDATE customer SET creditcardbarcode = $bar where cusid = '$cusid'";
        			
		        			if(mysqli_query($con,$queryname)){
		        				//echo '<script language="javascript">alert("Entered creditcard details for"'.$row['cusname'].');</script>';
		        				session_destroy();
		        				header('Location:tellerandpba.php');

		        			}else{
		        				echo '<script language="javascript">alert("Not yet created");</script>';
		        			}

				    		}    	
				        }

?>
<div>
<?php
	
class QRGenerator { 
 
    protected $size; 
    protected $data; 
    protected $encoding; 
    protected $errorCorrectionLevel; 
    protected $marginInRows; 
    protected $debug; 
 
    public function __construct($data='http://www.phpgang.com',$size='300',$encoding='UTF-8',$errorCorrectionLevel='L',$marginInRows=4,$debug=false) { 
 
        $this->data=urlencode($data); 
        $this->size=($size>100 && $size<800)? $size : 300; 
        $this->encoding=($encoding == 'Shift_JIS' || $encoding == 'ISO-8859-1' || $encoding == 'UTF-8') ? $encoding : 'UTF-8'; 
        $this->errorCorrectionLevel=($errorCorrectionLevel == 'L' || $errorCorrectionLevel == 'M' || $errorCorrectionLevel == 'Q' || $errorCorrectionLevel == 'H') ?  $errorCorrectionLevel : 'L';
        $this->marginInRows=($marginInRows>0 && $marginInRows<10) ? $marginInRows:4; 
        $this->debug = ($debug==true)? true:false;     
    }
	public function generate(){ 
 
        $QRLink = "https://chart.googleapis.com/chart?cht=qr&chs=".$this->size."x".$this->size . "&chl=" . $this->data . "&choe=" . $this->encoding . "&chld=" . $this->errorCorrectionLevel . "|" . $this->marginInRows; 
        if ($this->debug) echo   $QRLink;          
        return $QRLink; 
  	}
}



$temp = mt_rand(10000,99999);



$ex3 = new QRGenerator(mt_rand(10000,99999),100,'ISO-8859-1'); 
echo "<img src=".$ex3->generate().">";

?>
</div>
</body>
</html>
