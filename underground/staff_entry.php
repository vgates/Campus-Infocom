<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();

$staffid=$_POST['staffid'];	
$pass=sha1($_POST['$staffid']);	
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$mobile=$_POST['mobile'];
$qualification=$_POST['qualification'];
$maritalStatus=$_POST['maritalStatus'];
$paddress=$_POST['paddress'];
$taddress=$_POST['taddress'];
$gender=$_POST['gender'];
$dept=$_POST['dept'];
$religion=$_POST['religion'];
$caste=$_POST['caste'];
$dob=$_POST['dob'];
$designation=$_POST['designation'];

if($_POST['purpose']=="add")
{
	$query=mysql_query("INSERT INTO staff VALUES ('$staffid','$pass','$name','$email','$phone','$mobile','$maritalStatus','$paddress','$taddress','$dob','$gender','$religion','$caste','$dept','$qualification','$designation')");
	
	if (!$query)
		echo $msg="Error: Insertion aborted..! ".mysql_error();
	else
		echo $msg="Successfully entered..!".mysql_error();
}
else if($_POST['purpose']=="edit")
{
		$query=mysql_query("UPDATE staff SET name='$name',gender='$gender',paddress='$paddress',taddress='$taddress',phone='$phone',email='$email',religion='$religion',qualification='$qualification',maritalStatus='$maritalStatus',designation='$designation',dob='$dob',dept='$dept',caste='$caste',mobile='$mobile' WHERE staffid='$staffid'");
	if (!$query)
		echo $msg="Updation abored. Try again..! ".mysql_error();
	else
		echo $msg="Successfully updated..!";
}
else if($_POST['purpose']=="del")
{
	$query=mysql_query("DELETE FROM staff WHERE staffid='$staffid'");
	if(!$query)
		echo $msg="Deletion aborted. Try again..!".mysql_error();
	else
		echo $msg="Successfully Deleted..!";
}

?>