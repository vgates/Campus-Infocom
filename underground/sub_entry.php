<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();

$subid=strtoupper($_POST['subid']);
$dept=$_POST['dept'];
$sem=$_POST['sem'];
$internal=$_POST['internal'];
$external=$_POST['external'];
$name=$_POST['name'];

if($_POST['purpose']=="add")
{
	$query=mysql_query("INSERT INTO subjects VALUES ('$subid','$dept','$sem','$name','$internal','$external')");
	if (!$query)
		echo $msg="Error: Insertion aborted..! ".mysql_error();
	else
		echo $msg="Successfully entered..!";
}
else if($_POST['purpose']=="edit")
{
		$query=mysql_query("UPDATE subjects SET name='$name',dept='$dept',sem='$sem',internal='$internal',external='$external' WHERE subid='$subid'");
	if (!$query)
		echo $msg="Updation abored. Try again..! ".mysql_error();
	else
		echo $msg="Successfully updated..!";
}
else if($_POST['purpose']=="del")
{
	$query=mysql_query("DELETE FROM subjects WHERE subid='$subid'");
	if(!$query)
		echo $msg="Deletion aborted. Try again..!".mysql_error();
	else
		echo $msg="Successfully Deleted..!";
}

?>