<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();
$subid=$_GET['id'];
$result = mysql_query("SELECT * FROM subjects WHERE subid='$subid'");
$row = mysql_fetch_array($result);
$det=$row['name']."||";
$det.=$row['dept']."||";
$det.=$row['sem']."||";
$det.=$row['internal']."||";
$det.=$row['external']."||";

echo $det;
?>