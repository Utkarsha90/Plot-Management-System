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
$umobile = $_REQUEST['tmobileno'];
$projid = $_REQUEST['projid'];
$plotno = $_REQUEST['plotNo'];
$plotsize = $_REQUEST['plotsize'];
$plotprice = $_REQUEST['PlotPrice'];		
$suser=$_SESSION['sessionuser'];


//check dependency if the record is free or not
$sql = "select * FROM plotdetails WHERE pname='$projid' and PlotID='$plotno' and PlotSize='$plotsize' and MobileNo is NULL";
if(mysqli_query($con,$sql) and mysqli_affected_rows($con) == 1 )
{
		$sql = "update plotdetails set 
		MobileNo='$umobile', PlotSFTprice='$plotprice',PlotReserve=1,
		CreatedBy='$suser',CreatedDateTime=now() 
		where pname='$projid' and PlotID='$plotno' and PlotSize='$plotsize'";

		mysqli_query($con, $sql);
		if(mysqli_affected_rows($con) > 0 ) {
			echo "<h1>Plot reservation Successful</h1>";
			custexit('ReserveDel.php');		}
		else{  
			echo "<h1>Plot reservation failed</h1>";
			custexit('ReserveDel.php');

		}

}
else{  
    echo "<h1>project, plotID, size Cobination is not empty, try different combination</h1>";
	custexit('plot_view_delete.php');
}



		
		?>
	</center>
</body>

</html>
