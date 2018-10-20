<?php 
error_reporting(0);
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
$con=mysql_connect("localhost","root","");
if(!$con)
die('could not connect: '.mysql_error());
else
{
	mysql_select_db("campusinfocom", $con);

$user=$_COOKIE['user'];
$resultw = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$roww = mysql_fetch_array($resultw);
		$photo=$roww['photo'];
		$src="upload/".$photo;
$query=mysql_query("SELECT * FROM department WHERE hod='$user'");

$row = mysql_fetch_array($query);
if($row)
	include('./hod_trial.htm');
else
	include('./staff_trial.htm');
}
mysql_close($con);
if(isset($_POST['Submit']))
{
	$dept=$_POST['dept'];
	$sem=$_POST['sem'];
	$staffid=$_COOKIE['user'];
	$mode=$_POST['mode'];
	$con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die('COULD NOT CONNECT :'.mysql_error());
  }
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM subhandle where staffid='$staffid' AND dept='$dept' AND sem='$sem'");
 $row = mysql_fetch_array($query);
  if($row)
  {
  	setcookie("dept",$dept);
	setcookie("sem",$sem);
	if($mode=="edit")
	{
  		header('Location: att_list.php');
		exit();
	}
	else if($mode=="view")
	{
		header('Location: att_report.php');
		exit();
	}
  }
  else
  $msg="Sorry, you are not permitted to edit the details of selected batch.";
	mysql_close($con);
}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<link href="box.css" rel="stylesheet" type="text/css">
<link href="text.css" rel="stylesheet" type="text/css">
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="27%" height="213"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="73%" valign="top">
      <table width="450" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="451" border="0" align="center">
              <tr>
                <th colspan="3" scope="row" background="title.jpg">:: EDIT ATTENDANCE :: </th>
                </tr>
              <tr class="text">
                <th width="100" scope="row"><div align="left"><span class="style2 attmain attmain1 attmain1">Department</span></div></th>
                <th width="6" scope="row"><span class="attmain1">:</span></th>
                <td width="238"><span class="style1 attmain1 style2"><strong>
                  <select name="dept" class="box" id="select2">
                    <option value="0">Select</option>
                    <?php
$con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die('COULD NOT CONNECT :'.mysql_error());
  }
  else
  {
  mysql_select_db("campusinfocom",$con);
  $result=mysql_query("SELECT * FROM department");
  
  while($row = mysql_fetch_array($result))
  {
  $a=$row['dept'];
  $b=$row['name'];
    echo "<option value=\"$a\">$b</option>";
  }
	mysql_close($con);
  }
?>
                  </select>
                </strong></span></td>
              </tr>
              <tr class="text">
                <th scope="row"><div align="left"><span class="attmain1 attmain1">Semester</span></div></th>
                <th scope="row"><span class="attmain1">:</span></th>
                <td><span class="style1 attmain1 style2"><strong>
                  <select name="sem" class="box" id="select3">
                    <option value="0">select</option>
                    <option value="1">S1&amp;S2</option>
                    <option value="3">S3</option>
                    <option value="4">S4</option>
                    <option value="5">S5</option>
                    <option value="6">S6</option>
                    <option value="7">S7</option>
                    <option value="8">S8</option>
                  </select>
                </strong></span></td>
              </tr>
              <tr class="text">
                <th scope="row"><div align="left"><span class="attmain1">Select Mode </span></div></th>
                <th scope="row"><span class="attmain1">:</span></th>
                <td><p class="style2"><strong>
                    <input name="mode" type="radio" class="box" value="edit">
          Edit</strong>
                        <input name="mode" type="radio" class="box" value="view" checked>
                        <strong>View Report </strong></p></td>
              </tr>
            </table>
            <p align="center" class="style2">
              <input name="Submit" type="submit" class="butstyle" value="Generate">
            </p>
            </form></td>
        </tr>
    </table></td>
  </tr>
</table>
<div align="center" class="msg"><?php echo $msg; ?></div>
</body>
</html>
