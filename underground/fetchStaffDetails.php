<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();
$staffid=$_GET['id'];
$result = mysql_query("SELECT * FROM staff WHERE staffid='$staffid'");
$row = mysql_fetch_array($result);
$det=$row['name']."||";
$det.=$row['email']."||";
$det.=$row['phone']."||";
$det.=$row['mobile']."||";
$det.=$row['maritalStatus']."||";
$det.=$row['paddress']."||";
$det.=$row['taddress']."||";
$det.=$row['dob']."||";
$det.=$row['gender']."||";
$det.=$row['religion']."||";
$det.=$row['caste']."||";
$det.=$row['dept']."||";
$det.=$row['qualification']."||";
$det.=$row['designation']."||";

echo $det;
?>