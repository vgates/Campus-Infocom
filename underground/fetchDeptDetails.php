<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();
$dept=$_GET['id'];
$result = mysql_query("SELECT * FROM department WHERE dept='$dept'");
$row = mysql_fetch_array($result);
$det=$row['name']."||";
echo $det;
?>