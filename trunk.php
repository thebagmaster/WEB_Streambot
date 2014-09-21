<?php 
$con = mysql_connect("192.168.1.100","821449_root","daniel");
mysql_select_db("streambot_99k_vote", $con);
$query="SELECT ip FROM votes";
$result=mysql_query($query);
$num=mysql_numrows($result);
if($num > 1){
	$query = "TRUNCATE TABLE votes";
	mysql_query($query) or die ("Error in query: $query. " . mysql_error());
	mysql_close($con);
	echo "<body><div id='text'>skip</div></body>";
}
else
	echo "<body><div id='text'>dont</div></body>";
?>