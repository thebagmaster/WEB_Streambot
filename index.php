<?php
$con = mysql_connect("192.168.1.100","821449_root","daniel");
mysql_select_db("streambot_99k_vote", $con);
$query="SELECT ip FROM votes";
$result=mysql_query($query);
$num=mysql_numrows($result);
echo "
<html>
<head><title>StreamBot's Page</title>
<meta http-equiv=\"refresh\" content=\"60; URL=/\">
</head>
<body style=\"background-image:url('1356824158520.jpg');background-repeat:no-repeat;background-attachment:fixed;\">
<center>
<div style=\"border-radius: 25px;padding:15px;position:absolute;top:550px;left:50px;background-color:white;height:280px;width:400px;opacity:0.8;border:1px solid gray;\">
<div style='font-size: larger;'><form action=\"log.php\" method=\"post\">
<input type=submit value='Skip >' style='font-size: larger;top:10px;position:relative;'>
<input type=hidden value=$num>
</form>
<br>
2 Votes to skip; there are $num votes currently.</div>
<div style='width:310px;overflow-x: hidden; overflow-y: scroll; height:50px;position:relative;padding-right:19px;margin-bottom:15px;'>";
$query="SELECT song FROM songhistory ORDER BY id DESC LIMIT 5";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
	$f1=mysql_result($result,$i,"song");
	echo "<div title='$f1' style='width:300px;height:20px;border:1px solid gray;border-radius: 5px;line-height:normal;overflow:hidden;'>".$f1."</div>";
	$i++;
}
echo "
</div>
<div style='height:120px;'>
<form action=\"request.php\" method=\"post\">
<select name='song' style='width:310px;'>";
$query="SELECT * FROM songs ORDER BY artist ASC";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
	$id=mysql_result($result,$i,"id");
	$title=mysql_result($result,$i,"title");
	$artist=mysql_result($result,$i,"artist");
	echo "<option value='$id' style='width:300px;height:20px;border:1px solid gray;border-radius: 5px;line-height:normal;overflow:hidden;'>$title - $artist</option>";
	$i++;
}
echo "
</select>
<input type=submit value=Request>
</form>
<div style='width:310px;overflow-x: hidden; overflow-y: scroll; height:50px;position:relative;padding-right:19px;margin-bottom:40px;'>";
$query="SELECT songid FROM requests ORDER BY time ASC LIMIT 5";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
	$f1=mysql_result($result,$i,"songid");
	$query="SELECT * FROM songs WHERE id='$f1'";
	$result2=mysql_query($query);
	$title=mysql_result($result2,0,"title");
	$artist=mysql_result($result2,0,"artist");
	echo "<div title='$title - $artist' style='width:300px;height:20px;border:1px solid gray;border-radius: 5px;line-height:normal;overflow:hidden;'>$title - $artist</div>";
	$i++;
}
echo "
</div>
</div>
</div>
</center>
</body>
</html>
";
mysql_close();
?>
