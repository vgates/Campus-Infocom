<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();
$studid=$_GET['id'];
$result = mysql_query("SELECT * FROM student WHERE studid='$studid'");
$row = mysql_fetch_array($result);
$det=$row['name']."||";
$det.=$row['urollno']."||";
$det.=$row['dept']."||";
$det.=$row['sem']."||";
$det.=$row['rollno']."||";
$result1 = mysql_query("SELECT * FROM studet WHERE studid='$studid'");
$row1=mysql_fetch_array($result1);
$det.=$row1['dob']."||";
$det.=$row1['gender']."||";
$det.=$row1['paddress']."||";
$det.=$row1['taddress']."||";
$det.=$row1['phone']."||";
$det.=$row1['email']."||";
$det.=$row1['religion']."||";
$det.=$row1['caste']."||";
$det.=$row1['xtra']."||";
$det.=$row1['gname']."||";
$det.=$row1['relation']."||";
$det.=$row1['occupation']."||";
$det.=$row1['contactno']."||";

$det.=$row1['xiiinst']."||";
$det.=$row1['xiiboard']."||";
$det.=$row1['xiiyear']."||";
$det.=$row1['xiimarks']."||";
$det.=$row1['xiimaxmarks']."||";
$det.=$row1['maths']."||";
$det.=$row1['maxmaths']."||";
$det.=$row1['phy']."||";
$det.=$row1['maxphy']."||";
$det.=$row1['chem']."||";
$det.=$row1['maxchem']."||";
$det.=$row1['cetrank']."||";

$det.=$row1['xinst']."||";
$det.=$row1['xboard']."||";
$det.=$row1['xyear']."||";
$det.=$row1['xmarks']."||";
$det.=$row1['xmaxmarks']."||";
echo $det;
?>