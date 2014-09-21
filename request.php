<?php 
$con = mysql_connect("192.168.1.100","821449_root","daniel");
mysql_select_db("streambot_99k_vote", $con);
$id = $_POST["song"];
$ip = $_SERVER['REMOTE_ADDR'];
$query = "INSERT INTO requests (songid,ip) VALUES('$id','$ip')";
mysql_query($query) or die ("Error in query: $query. " . mysql_error());
mysql_close($con);
header("Location: /");
exit;

// <head>
// <meta http-equiv="refresh" content="1; URL=/">
// </head>
?>