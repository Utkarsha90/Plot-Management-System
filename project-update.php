<?php
			session_start();  

?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Page page</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Common Alert Messages</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<center>
		<?php
// include connection information
    include('connection.php');  
	include('functionlibrary.php');  
	
	// get details from form data
		$projid = $_REQUEST['projid'];
		$projname = $_REQUEST['projname'];
		$prjdesc = $_REQUEST['prjdesc'];		
		$PrjLeadMobile = $_REQUEST['PrjLeadMobile'];
		$projleadname = $_REQUEST['projleadname'];
		$suser=$_SESSION['sessionuser'];

	// prepare the update statement for project
		$sql = "update project set 
		ProjectName='$projname' ,
		ProjectDesc='$prjdesc', 
        ProjectLead='$projleadname', 
		ProjectLeadMobile='$PrjLeadMobile', 
        CreatedBy='$suser',
		CreatedDateTime=now() 
		where projctID='$projid'";
		
        $result = mysqli_query($con, $sql);  
		
        if($result == 1){
			echo "<h1>Project Update Successful</h1>";
			custexit('project_view.php');		}	
        else{  
			echo "<h1>Project Update Failed</h1>";
			custexit('project_view.php');        }  
		
		?>
	</center>
</body>

</html>
