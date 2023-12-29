<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Enquiry User</title>
    <link rel="stylesheet" href="payregamt.css">
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
<?php

include('connection.php');  
include('functionlibrary.php');  	



$tempid = $_REQUEST['intid'];
$suser = $_SESSION['sessionuser'];
$tmobileno = $_REQUEST['tmobile'];
$projectid="";
$plotid="";
$plotsize="";
$plotsftprice="";

$sql = "select PlotSize,PlotSFTPrice,pname, PlotID, MobileNo FROM plotdetails WHERE intplotid='$tempid' ";

$result=mysqli_query($con,$sql);
if( mysqli_affected_rows($con) == 0 )
{
	echo "<h1>No plots in user name</h1>";
	custexit('paymentsview.html');
}

if( mysqli_affected_rows($con) == 1 )
{
		$row = mysqli_fetch_assoc($result);
		$projectid = $row["pname"];
		$plotid = $row["PlotID"];
        $plotsize = $row["PlotSize"];
        $plotsftprice = $row["PlotSFTPrice"];        

}
?>
<body>

    <div class="content">

        <form action="Reserver_plot.php" onsubmit="return validateForm()" method="post">
                <div class="row contents" style="margin:auto; margin-top:0%;margin-bottom:0%;">
                    <h1 id="h1" style="margin-top: 0%;margin-bottom: 0%;">
                     <h1 id="h1">
                                Reserve Plot-1 Wk
                                <hr style="color:white; margin-top: 0%;margin-bottom: 0%;">
                            </h1>
                    <div class=" form-group py-sm-1">                
                        <label for="" >ProjectID</label>
                                <input type="text" type="tel" value=<?php echo $projectid;?> autocomplete="off" name="projid" minlength="5" maxlength="10" class="form-control-md" placeholder="Prj ID" >                            
                    </div>
                    <div class=" form-group py-sm-1">                
                        <label for="">PlotID</label>
                                <input type="text" type="tel"  value=<?php echo $plotid;?>  autocomplete="off" name="plotNo" minlength="1" maxlength="6" pattern="[0-9]+" class="form-control-md" placeholder="Plot ID" >                            
                    </div>
                    <div class=" form-group py-sm-1">                
                        <label for="">PlotSize</label>
                                <input type="text" type="tel" value=<?php echo $plotsize;?>  autocomplete="off" name="plotsize" maxlength="6" pattern="[0-9]+" class="form-control-md" placeholder="Plot Size" >                            
                    </div>
                    <div class=" form-group py-sm-1">                
                        <label for="">Plot SftPrice</label>
                                <input type="text" type="tel" value=<?php echo $plotsftprice;?>  autocomplete="off" name="PlotPrice" maxlength="6" pattern="[0-9]+" class="form-control-md" placeholder="Plot SFT price" >                            
                    </div>
                    <div class=" form-group py-sm-1">                                    
                    <label for="">Reserved Mobile</label>
                    <input type="text" type="tel" value=<?php echo $tmobileno;?>  autocomplete="off" name="tmobileno" maxlength="6" pattern="[0-9]+" class="form-control-md" placeholder="Plot SFT price" >                                                            
                    </div>
                    <div class="mt-4 pt-2">
                        <input class="btn btn-primary btn-lg" type="submit" value="Reserve Plot" />
                    </div>

            </div>

        </form>
        <!-- Code injected by live-server -->
        <script>
            // <![CDATA[  <-- For SVG support
            if ('WebSocket' in window) {
                (function () {
                    function refreshCSS() {
                        var sheets = [].slice.call(document.getElementsByTagName("link"));
                        var head = document.getElementsByTagName("head")[0];
                        for (var i = 0; i < sheets.length; ++i) {
                            var elem = sheets[i];
                            var parent = elem.parentElement || head;
                            parent.removeChild(elem);
                            var rel = elem.rel;
                            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                                var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                                elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                            }
                            parent.appendChild(elem);
                        }
                    }
                    var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                    var address = protocol + window.location.host + window.location.pathname + '/ws';
                    var socket = new WebSocket(address);
                    socket.onmessage = function (msg) {
                        if (msg.data == 'reload') window.location.reload();
                        else if (msg.data == 'refreshcss') refreshCSS();
                    };
                    if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                        console.log('Live reload enabled.');
                        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                    }
                })();
            }
            else {
                console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
            }
	// ]]>
        </script>
        <script type="text/javascript">
            $(function() {
                $('#datepicker').datepicker();
            });
        </script>
        <script type="text/javascript">
function ()validateForm(){  
var usermobile=document.form.mobile.value;  
  
if (usermobile.length() < 10){  
  alert("invalid User mobile ");  
  return false;  
        </script>		
</body>

</html>