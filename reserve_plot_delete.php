<?php

include('connection.php');
include('functionlibrary.php');  

$eid=$_REQUEST['id'];

$query = "update plotdetails set MobileNo=NULL, PlotReserve=NULL WHERE intplotid='$eid'"; 

if(mysqli_query($con,$query))
{
	echo "<h1>Reserved plot deleted successfully</h1>";
	custexit('ReserveDel.php');			

}
else
{
	echo "<h1>Reserved plot deleted Failed</h1>";
	custexit('ReserveDel.php');			
}
?>