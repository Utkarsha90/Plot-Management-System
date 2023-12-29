<?php
		    session_start();  

?>
<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

include('connection.php');  
include('functionlibrary.php');  	
		
// Taking all values from the form data(input)
$emiamt = $_REQUEST['emiamt'];
$bank = $_REQUEST['bank'];
$chqno = $_REQUEST['chqno'];
$chqdt = $_REQUEST['chqdt'];
$Rctno = $_REQUEST['Rctno'];		
$tempid = $_REQUEST['tempid'];
$suser=$_SESSION['sessionuser'];

	$sql = "select pname, PlotID, MobileNo FROM plotdetails WHERE intplotid='$tempid' ";

	$result=mysqli_query($con,$sql);
	if( mysqli_affected_rows($con) == 0 )
	{
		echo "<h1>No plots in user name</h1>";
		custexit('paymentsview.html');
	}
	
	if( mysqli_affected_rows($con) == 1 )
	{
			$row = mysqli_fetch_assoc($result);
			$projectid=$row["pname"];
			$plotid=$row["PlotID"];
			$umobile=$row["MobileNo"];
	}

	
    if ( $emiamt != NULL )
    {
        $sql = "insert into buyerpayments (projctID, PlotID, MobileNo, EMIAmt, BankName, ReceiptNo, Cheque_DDNo, Cheque_date, CreatedBy,CreatedDateTime )
        values ('$projectid', '$plotid', '$umobile', '$emiamt', '$bank', '$Rctno', '$chqno', '$chqdt','$suser',now() )";

        if(mysqli_query($con,$sql) and mysqli_affected_rows($con) > 0 )
        {
            echo "<h1>EMI Payment Successful</h1>";
            custexitargs('paymentsview.php?MobileNo=',$umobile);		}
        else{  
            echo "<h1>EMI Payment Failed</h1>";
			custexit('paymentsview.php');			
        }

    }
    
		?>
	</center>
</body>

</html>
