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
	<title>update Page page</title>
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


if (empty($_SESSION['sessionuser'] )) 
{
    echo "<h1>Invalid Session, pl login </h1>";
    custexit("login.html");	    
}

	// get details from form data
		$projid = $_REQUEST['projid'];
		$projname = $_REQUEST['projname'];
		$prjdesc = $_REQUEST['prjdesc'];		
		$PrjLeadMobile = $_REQUEST['PrjLeadMobile'];
		$projleadname = $_REQUEST['projleadname'];
		$suser=$_SESSION['sessionuser'];

	// prepare the insert statement for project
		$sql = "INSERT INTO project (projctID,ProjectName, ProjectDesc, ProjectLead, ProjectLeadMobile, ProjectStatus, CreatedBy,CreatedDateTime) 
		VALUES ('$projid','$projname','$prjdesc','$projleadname','$PrjLeadMobile',1, '$suser',now())";
		
		$result=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0 ){
			echo ("<h1>Project Addition Successful</h1>");
			custexit('project_view.php');		}
        else{  
			echo ("<h1>Project Addition Failed</h1>");
			custexit('project_view.php');		}
		
		?>
	</center>
</body>

</html>
