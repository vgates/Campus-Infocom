<?php
include('../class/Gen.php');
$genObj=new gen;
$genObj->db();
$studid=strtoupper($_POST['studid']);
$pass=sha1($studid);	
$name=strtoupper($_POST['name']);
$urollno=strtoupper($_POST['urollno']);
$dept=$_POST['dept'];
$sem=$_POST['sem'];
$rollno=$_POST['rollno'];

$dob=$_POST['dob'];
$gender=$_POST['gender'];
$paddress=$_POST['paddress'];
$taddress=$_POST['taddress'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$gname=$_POST['gname'];
$relation=$_POST['relation'];
$occupation=$_POST['occupation'];
$contactno=$_POST['contactno'];
$religion=$_POST['religion'];
$caste=$_POST['caste'];
$xtra=$_POST['xtra'];

$cetrank=$_POST['cetrank'];
$xinst=$_POST['xinst'];
$xboard=$_POST['xboard'];
$xyear=$_POST['xyear'];
$xmarks=$_POST['xmarks'];
$xmaxmarks=$_POST['xmaxmarks'];
$xiiinst=$_POST['xiiinst'];
$xiiboard=$_POST['xiiboard'];
$xiiyear=$_POST['xiiyear'];
$xiimarks=$_POST['xiimarks'];
$xiimaxmarks=$_POST['xiimaxmarks'];
$maths=$_POST['maths'];
$maxmaths=$_POST['maxmaths'];
$phy=$_POST['phy'];
$maxphy=$_POST['maxphy'];
$chem=$_POST['chem'];
$maxchem=$_POST['maxchem'];
if($_POST['purpose']=="add")
{
	$query=mysql_query("INSERT INTO student VALUES ('$studid','$pass','$name','$urollno','$dept','$sem','$rollno')");
	if($query)
		$query=mysql_query("INSERT INTO studet VALUES ('$studid','$dob','$gender','$paddress','$taddress','$phone','$email','$religion','$caste','$xtra','$gname','$relation','$occupation','$contactno','$cetrank','$xinst','$xboard','$xyear','$xmarks','$xmaxmarks','$xiiinst','$xiiboard','$xiiyear','$xiimarks','$xiimaxmarks','$maths','$maxmaths','$chem','$maxchem','$phy','$maxphy')");
	
	if (!$query)
		echo $msg="Error: Student ID:$studid already exists".mysql_error();
	else
		echo $msg="Successfully entered..!";
}
else if($_POST['purpose']=="edit")
{
	$query=mysql_query("UPDATE student SET name='$name',urollno='$urollno',dept='$dept',sem='$sem',rollno='$rollno' WHERE studid='$studid'");
	if($query)
		$query=mysql_query("UPDATE studet SET dob='$dob',gender='$gender',paddress='$paddress',taddress='$taddress',phone='$phone',email='$email',religion='$religion',occupation='$occupation',contactno='$contactno',cetrank='$cetrank',xinst='$xinst',xboard='$xboard',xyear='$xyear',xmarks='$xmarks',xmaxmarks='$xmaxmarks',xiiinst='$xiiinst',xiiboard='$xiiboard',xiiyear='$xiiyear',xiimarks='$xiimarks',xiimaxmarks='$xiimaxmarks',maths='$maths',maxmaths='$maxmaths',chem='$chem',maxchem='$maxchem',phy='$phy',maxphy='$maxphy' WHERE studid='$studid'");
	if (!$query)
		echo $msg="Updation aborted. Try again..!".mysql_error();
	else
		echo $msg="Successfully updated..!";
}
else if($_POST['purpose']=="del")
{
	$query=mysql_query("DELETE FROM student WHERE studid='$studid'");
	$query=mysql_query("DELETE FROM studet WHERE studid='$studid'");
	if(!$query)
		echo $msg="Deletion aborted. Try again..!".mysql_error();
	else
		echo $msg="Successfully Deleted..!";
}
?>