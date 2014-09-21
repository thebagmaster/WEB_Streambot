<?php 
$con = mysql_connect("192.168.1.100","821449_root","daniel");
mysql_select_db("streambot_99k_vote", $con);
$ip = $_SERVER['REMOTE_ADDR'];
$query = "INSERT INTO votes VALUES('$ip')";
mysql_query($query);
mysql_close($con);
header("Location: /");
exit;

// <head>
// <meta http-equiv="refresh" content="1; URL=/">
// </head>
?>