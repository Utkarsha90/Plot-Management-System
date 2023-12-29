<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

session_start();  

include('connection.php');  
include('functionlibrary.php');  	
		
// Taking all values from the form data(input)
$umobile = $_REQUEST['umobile'];
$emiamt = $_REQUEST['emiamt'];
$bank = $_REQUEST['bank'];
$chqno = $_REQUEST['chqno'];
$chqdt = $_REQUEST['chqdt'];
$Rctno = $_REQUEST['Rctno'];		

$pemiamt = $_REQUEST['ppayamt'];
$pchqno = $_REQUEST['pchqno'];
$pchqdt = $_REQUEST['pchqdt'];
$pRctno = $_REQUEST['pRctno'];	
$pbank = $_REQUEST['pbank'];
$suser=$_SESSION['sessionuser'];

$sql = "select * from buyerdetails where MobileNo = '$umobile' ";  
		
if(mysqli_query($con,$sql) and mysqli_affected_rows($con)== 0 )
{
	echo "<h1>Member Mobile not found, ensure you have typed the correct mobile no</h1>";
	custexit('pay-emi-amt.html');			
}

//check if he is a member or not and paid the amt.
$sql = "select * from buyerpayments where MobileNo = '$umobile' and RegAmt>0 ";  
		
if(mysqli_query($con,$sql) and mysqli_affected_rows($con) == 0 )
{
	echo "<h1>Member should pay Registration Amount to Reserve</h1>";
	custexit('Pay-Reg-Amt.html');
}

//check if has reserved another site already
$sql = "select * FROM plotdetails WHERE MobileNo='$umobile' and PlotReserve=1";

if(mysqli_query($con,$sql) and mysqli_affected_rows($con) > 0 )
	{
		echo "<h1>EMI cannot be payed for a reserved plot</h1>";
		custexit('ReserveDel.php');
	}

    if ( $emiamt != NULL )
    {
        $sql = "insert into buyerpayments (MobileNo, EMIAmt, BankName, ReceiptNo, Cheque_DDNo, Cheque_date, CreatedBy,CreatedDateTime )
        values ('$umobile', '$emiamt', '$bank', '$Rctno', '$chqno', '$chqdt','sysuser',now() )";

        if(mysqli_query($con,$sql) and mysqli_affected_rows($con) > 0 )
        {
        echo "<h1>EMI Payment Successful</h1>";
            custexit('plot_view_delete.php');		}
        else{  
            echo "<h1>EMI Payment Failed</h1>";
            custexit('plot_view_delete.php');		}
        }

        if ( $pemiamt != NULL )
        {
            $sql = "insert into buyerpayments (MobileNo, PrePayAmt, BankName, ReceiptNo, Cheque_DDNo, Cheque_date, CreatedBy,CreatedDateTime )
            values ('$umobile', '$pemiamt', '$pbank', '$pRctno', '$pchqno', '$pchqdt','$suser',CreatedDateTime=now() )";
    
            if(mysqli_query($con,$sql) and mysqli_affected_rows($con) > 0 )
            {
            echo "<h1>Pre-Payment Successful</h1>";
                custexit('plot_view_delete.php');		}
            else{  
                echo "<h1>Pre-Payment Failed</h1>";
                custexit('plot_view_delete.php');		}
            }
        
    
		?>
	</center>
</body>

</html>
