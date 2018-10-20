<?php
$con = mysql_connect("localhost","root","");
if (!$con)
{
 	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom",$con);
$batch=2007;
$query=mysql_query("SELECT * from student where studid LIKE '$batch%'"); 
	while($row=mysql_fetch_array($query))
	{
		$k=$row['studid'];
		$old=$row['urollno'];
		$newurollno="JYAHE".substr($old,5,5);	
		mysql_query("UPDATE student SET urollno='$newurollno' where studid='$k'");
	}
	mysql_close($con);
?>