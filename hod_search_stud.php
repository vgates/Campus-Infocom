<?php 
	$user=$_COOKIE['user'];
	if($user=="principal")
		include('./princ_trial.htm');
	else
		include('./hod_trial.htm');
if(isset($_POST['batch']))
{
	header('Location: princ_search_stud_batch.php');
	exit();
}
if(isset($_POST['name']))
{
	header('Location: princ_search_stud_name.php');
	exit();
}
if(isset($_POST['urollno']))
{
	header('Location: hod_search_stud_urollno.php');
	exit();
}
if(isset($_POST['absent']))
{
	header('Location: hod_search_stud_absent.php');
	exit();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.butname {
	color: #0099FF;
	background-color: #0000CC;
	font-size: 16px;
	font-weight: bold;
	width: 300px;
	font-family: "Times New Roman", Times, serif;
	cursor: hand;
}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <div align="center">
    <p>&nbsp;    </p>
    <p>&nbsp;</p>
    <p>
      <input name="batch" type="submit" class="butname" value="Search Batchwise">
    </p>
    <p>
      <input name="name" type="submit" class="butname" value="Search by name">
    </p>
    <p>
      <input name="urollno" type="submit" class="butname" value="Search by University Roll No."> 
    </p>
    <p>
      <input name="absent" type="submit" class="butname" value="Search Absentees">    
      </p>
  </div>
</form>
</body>
</html>
