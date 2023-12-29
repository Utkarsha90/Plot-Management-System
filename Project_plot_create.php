<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

    include('connection.php');  
		
		// Taking all values from the form data(input)
		$pname = $_REQUEST['projname'];
		$pdesc = $_REQUEST['projdesc'];
		$pSize1 = $_REQUEST['plotsize1'];
		$pSize2 = $_REQUEST['plotsize2'];
		$pSize3 = $_REQUEST['plotsize3'];
		$pSize4 = $_REQUEST['plotsize4'];
		$pSize5 = $_REQUEST['plotsize5'];
		$pSize6 = $_REQUEST['plotsize6'];
		$pSize7 = $_REQUEST['plotsize7'];
		$pSize8 = $_REQUEST['plotsize8'];
		$pSize9 = $_REQUEST['plotsize9'];
		$pSize10 = $_REQUEST['plotsize10'];

		$p1ot1Startno = $_REQUEST['plot1startno'];
		$p1ot1Endno = $_REQUEST['plot1endno'];

		$p1ot2Startno = $_REQUEST['plot2startno'];
		$p1ot2Endno = $_REQUEST['plot2endno'];

		$p1ot3Startno = $_REQUEST['plot3startno'];
		$p1ot3Endno = $_REQUEST['plot3endno'];

		$p1ot4Startno = $_REQUEST['plot4startno'];
		$p1ot4Endno = $_REQUEST['plot4endno'];

		$p1ot5Startno = $_REQUEST['plot5startno'];
		$p1ot5Endno = $_REQUEST['plot5endno'];

		$p1ot5Startno = $_REQUEST['plot6startno'];
		$p1ot5Endno = $_REQUEST['plot6endno'];
		
		$p1ot5Startno = $_REQUEST['plot7startno'];
		$p1ot5Endno = $_REQUEST['plot7endno'];
		
		$p1ot5Startno = $_REQUEST['plot8startno'];
		$p1ot5Endno = $_REQUEST['plot8endno'];
		
		$p1ot5Startno = $_REQUEST['plot9startno'];
		$p1ot5Endno = $_REQUEST['plot9endno'];
		
		$p1ot5Startno = $_REQUEST['plot10startno'];
		$p1ot5Endno = $_REQUEST['plot10endno'];
		
		//$pdesc = $_REQUEST['user'];

		$sql = "INSERT INTO project (ProjectActive, ProjectName, ProjectDesc, CreatedBy, CreatedDateTime) VALUES (1,'$pname','$pdesc','$pdesc',now())";
        $result = mysqli_query($con, $sql); 

//        $sql = "select max(projectid) from project" ;  
//		$result = mysqli_query($con, $sql);  
//		$projid = mysql_fetch_array($result);

print_var_name('$p1ot1Startno');
print_var_name('$p1ot1Endno');
print_var_name('$pSize1');

$projid=1;

	for ($i=$p1ot1Startno; $i<=$p1ot1Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize1','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}		

	for ($i=$plot2Startno; $i<=$plot2Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize2','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}		

	for ($i=$plot3Startno; $i<=$plot3Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize3','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}		

	for ($i=$plot4Startno; $i<=$plot4Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize4','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}		

	for ($i=$plot5Startno; $i<=$plot5Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize5','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}		

	for ($i=$plot6Startno; $i<=$plot6Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize6','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}	

	for ($i=$plot7Startno; $i<=$plot7Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize7','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}	

	for ($i=$plot8Startno; $i<=$plot8Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize8','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}	

	for ($i=$plot9Startno; $i<=$plot9Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize9','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}	

	for ($i=$plot10Startno; $i<=$plot10Endno; $i++) {

		$sql = "INSERT INTO plotdetails (ProjectID, PlotID, PlotSize, CreatedBy, CreatedDateTime) VALUES ('$projid','$i','$pSize10','$pdesc',now())";
        $result = mysqli_query($con, $sql);  
	}	

        $sql = "select count(*) from PlotDetails as total where ProjectID = '$projid'";  
        $result = mysqli_query($con, $sql);  
		$count = $result['total'];	
          
        if($count == 1){  
            echo "<h1><center> Project and plots creation successful </center></h1>";  
        }  
        else{  
            echo "<h1> project and plot creation failed</h1>";  
        }
		
		?>
	</center>
</body>

</html>
