<?php
			session_start();  
?>

<?php 
// Opens a connection to a MySQL server 
include('connection.php');
include('functionlibrary.php');  


if ( ! ( str_contains($_SESSION['sessionuser'],"admin") or  str_contains($_SESSION['sessionuser'],"ceo")))
{
    displayadminmesg("Admin Privileges Required for Action");
    custexit('project_view.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// Taking all values from the form data(input)
		$oldmobile = $_REQUEST['oldmobile'];
		$newmobile = $_REQUEST['newmobile'];        
		$suser=$_SESSION['sessionuser'];
	
        $sql = "update systemuser set mobileno='$newmobile',CreatedBy='$suser',CreatedDateTime=now() where mobileno='$oldmobile'";
		$result=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0 ){
			echo "<h1>Mobile Update Successful for systemuser</h1>";
        }
		else{
			echo "<h1>Mobile  not found in systemuser</h1>";			
		}
        $sql = "update buyerdetails set mobileno='$newmobile',CreatedBy='$suser',CreatedDateTime=now() where mobileno='$oldmobile'";
		$result=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0 ){
			echo "<h1>Mobile Update Successful for buyer</h1>";
        }
		else{
			echo "<h1>Mobile not found in buyer</h1>";	
            custexit('system_view.php');			            
		}


        $sql = "update buyerpayments set mobileno='$newmobile',CreatedBy='$suser',CreatedDateTime=now() where mobileno='$oldmobile'";
		$result=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0 ){
			echo "<h1>Mobile Update Successful for buyerpayments</h1>";
        }

		$sql = "update enquiry set mobileno='$newmobile',CreatedBy='$suser',CreatedDateTime=now() where mobileno='$oldmobile'";
		$result=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0 ){
			echo "<h1>Mobile Update Successful for buyerpayments</h1>";
        }

        $sql = "update plotdetails set mobileno='$newmobile',CreatedBy='$suser',CreatedDateTime=now() where mobileno='$oldmobile'";
		$result=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0 ){
			echo "<h1>Mobile Update Successful for plotdetails</h1>";
            custexit('system_view.php');			            
        }

		
		?>
	</center>
</body>

</html>
