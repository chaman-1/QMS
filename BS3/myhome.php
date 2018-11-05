<?php
include("config.php");
include('session.php');
echo "Faculty Homepage.  fid: ". $_SESSION['fid'];
$datee = date("Y-m-d h:i:sa");
echo($datee . "\nIP : ".$_SERVER['REMOTE_ADDR']);
$fid = $_SESSION['fid'];
$addr = $_SERVER['REMOTE_ADDR'];
$str = "Insert into `log`(`fid`,`ip`,`time`) values('$fid', '$addr', '$datee');";
$result = mysqli_query($conn,$str);
?>
