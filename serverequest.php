<?php 
$con = mysql_connect("192.168.1.100","821449_root","daniel");
mysql_select_db("streambot_99k_vote", $con);
$query="SELECT songid FROM requests ORDER BY time ASC LIMIT 1";
$result=mysql_query($query) or die ("Error");
$id=mysql_result($result,0,"songid");
$query="SELECT * FROM songs WHERE id='$id' LIMIT 1";
$result=mysql_query($query) or die ("Error");
$title=mysql_result($result,0,"title");
$artist=mysql_result($result,0,"artist");
$query="DELETE FROM requests WHERE songid='$id' LIMIT 1";
$result=mysql_query($query) or die ("Error");
echo "<body><div id='text'>$title</div></body>";
?>