<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Enquiry User</title>
    <link rel="stylesheet" href="enquiry_table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body class = "update_p">

<?php
     include('connection.php');  
     include('functionlibrary.php');  


?>
    <link rel="stylesheet" href="enquiry_table.css">

            <div class="row contents" style="margin:auto; margin-top:0%;margin-bottom:8%;">
                <h1 id="h1">
                    Reserved Plot View and Delete Form
                </h1>
                <hr style="color:white;">
                <div>
<table class = "up_p" style="margin-left: auto;  margin-right: auto; ">
<thead>
<tr>
<td style="color:black; background-color: skyblue; ">ProjName</strong></td>
<td style="color:black; background-color: skyblue; ">Plot Size</strong></td>
<td style="color:black; background-color: skyblue; ">Plot No</strong></td>
<td style="color:black; background-color: skyblue; ">MobileNo</strong></td>
<td style="color:black; background-color: skyblue; ">ReservedOn</strong></td>
<td style="color:black; background-color: skyblue; ">Release</strong></td>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT intplotid, pname,PlotSize, PlotID, MobileNo,CreatedDateTime  FROM plotdetails where PlotReserve=1  LIMIT 7;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<td align="left" ><?php echo $row["pname"]; ?></td>
<td align="left" ><?php echo $row["PlotSize"]; ?></div></td>
<td align="left"><?php echo $row["PlotID"]; ?></td>
<td align="left"><?php echo $row["MobileNo"]; ?></td>
<td align="left"><?php echo $row["CreatedDateTime"]; ?></td>
</td>
<td align="left">
<a href="reserve_plot_delete.php?id=<?php echo $row["intplotid"]; ?>">Release   </a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>

</body>
</html>