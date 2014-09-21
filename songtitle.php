<?php 
$con = mysql_connect("192.168.1.100","821449_root","daniel");
mysql_select_db("streambot_99k_vote", $con);
$title = $_POST["tit"];
$query = "INSERT INTO songhistory (song) VALUES('$title')";
mysql_query($query) or die ("Error in query: $query. " . mysql_error());
$query="SELECT id FROM songhistory ORDER BY id DESC LIMIT 1";
$result=mysql_query($query);
$id=mysql_result($result,0,"id");
$id-=10;
$query = "DELETE FROM songhistory WHERE id<='$id'";
mysql_query($query);
mysql_close($con);
header("Location: /submitsong.php");
exit;

// <head>
// <meta http-equiv="refresh" content="1; URL=/">
// </head>
?>