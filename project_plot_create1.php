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
	$suser=$_SESSION['sessionuser'];

		// Taking all values from the form data(input)
		$pname = $_REQUEST['prjname'];
		$intpname = filter_var($pname, FILTER_SANITIZE_NUMBER_INT);

		$pSize1 = $_REQUEST['plotsize1'];
		$intpSize1 = filter_var($pSize1, FILTER_SANITIZE_NUMBER_INT);

		$pSize2 = $_REQUEST['plotsize2'];
		$intpSize2 = filter_var($pSize2, FILTER_SANITIZE_NUMBER_INT);
		
		$pSize3 = $_REQUEST['plotsize3'];
		$intpSize3 = filter_var($pSize3, FILTER_SANITIZE_NUMBER_INT);

		$p1ot1Sno = $_REQUEST['plot1startno'];
		$intp1ot1Sno = filter_var($p1ot1Sno, FILTER_SANITIZE_NUMBER_INT);		
		
		$p1ot1Eno = $_REQUEST['plot1endno'];
		$intp1ot1Eno = filter_var($p1ot1Eno, FILTER_SANITIZE_NUMBER_INT);		

		$p1ot2Sno = $_REQUEST['plot2startno'];
		$intp1ot2Sno = filter_var($p1ot2Sno, FILTER_SANITIZE_NUMBER_INT);		

		$p1ot2Eno = $_REQUEST['plot2endno'];
		$intp1ot2Eno = filter_var($p1ot2Eno, FILTER_SANITIZE_NUMBER_INT);		

		$p1ot3Sno = $_REQUEST['plot3startno'];
		$intp1ot3Sno = filter_var($p1ot3Sno, FILTER_SANITIZE_NUMBER_INT);		

		$p1ot3Eno = $_REQUEST['plot3endno'];
		$intp1ot3Eno = filter_var($p1ot3Eno, FILTER_SANITIZE_NUMBER_INT);		

if ($intpSize1 > 0){
	for ($i=$intp1ot1Sno; $i<=$intp1ot1Eno; $i++) {
		$sql = "INSERT INTO plotdetails (pname, PlotID, PlotSize, PlotRoadSize,CreatedBy, CreatedDateTime) VALUES ('$pname','$i','$intpSize1',30,'$suser',now())";
        $result = mysqli_query($con, $sql);  
	}
}

if ($intpSize2 > 0){
	for ($i=$intp1ot2Sno; $i <=$intp1ot2Eno; $i++) {
		$sql = "INSERT INTO plotdetails (pname, PlotID, PlotSize, PlotRoadSize,CreatedBy, CreatedDateTime) VALUES ('$pname','$i','$intpSize2',30,'$suser',now())";
        $result = mysqli_query($con, $sql);  
	}		
}
if ($intpSize3 > 0){
	for ($i=$intp1ot3Sno; $i <=$intp1ot3Eno; $i++) {
		$sql = "INSERT INTO plotdetails (pname, PlotID, PlotSize, PlotRoadSize,CreatedBy, CreatedDateTime) VALUES ('$pname','$i','$intpSize3',30,'$suser',now())";
        $result = mysqli_query($con, $sql);  
	}		
}	

        $sql = "select count(*) from plotdetails as total where pname = '$pname'";  
        $result = mysqli_query($con, $sql);  
          
        if($result >= 1){
			custexitargs("plot_view.php?id=",$pname);
		}          
        else{  
            echo "<h1> project and plot creation failed</h1>";  
			custexitargs("plot_view.php?id=",$pname);
        }
		
		?>
	</center>
</body>

</html>
