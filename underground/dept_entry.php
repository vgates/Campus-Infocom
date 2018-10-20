<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();

$dept=strtoupper($_POST['dept']);	
$name=$_POST['name'];

if($_POST['purpose']=="add")
{
	$query=mysql_query("INSERT INTO department VALUES ('$dept','$name','')");	
	if (!$query)
		echo $msg="Error: Insertion aborted..! ".mysql_error();
	else
		echo $msg="Successfully reerger entered..!";
}
else if($_POST['purpose']=="edit")
{
		$query=mysql_query("UPDATE department SET name='$name' WHERE dept='$dept'");
	if (!$query)
		echo $msg="Updation abored. Try again..! ".mysql_error();
	else
		echo $msg="Successfully updated..!";
}
else if($_POST['purpose']=="del")
{
	$query=mysql_query("DELETE FROM department WHERE dept='$dept'");
	if(!$query)
		echo $msg="Deletion aborted. Try again..!".mysql_error();
	else
		echo $msg="Successfully Deleted..!";
}
?>