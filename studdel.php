<?php 
if(isset($_POST['Submit']))
{
$studid=$_POST['studid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
mysql_query("DELETE FROM student WHERE studid='$studid'");
mysql_query("DELETE FROM studet WHERE studid='$studid'");
mysql_close($con);
header("Location: admin_home.php");
}
include('./trial.htm');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.delsub1 {
	color: #00CC33;
	font-weight: bold;
}
.delsub2 {color: #00CC33}
.delsub5 {font-size: 18px}
.style1 {color: #0033FF}
.style3 {font-size: 14px}
.style4 {color: #0066FF}
.style8 {font-weight: bold; color: #0066FF; }
.dfd {
	color: #0066FF;
	font-weight: bold;
}

-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
</head>
<body>

<p>&nbsp;</p>
</body>
</html>
