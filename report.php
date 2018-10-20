<?php 
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./hod_trial.htm');
$user=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
 	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom",$con);
		$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
mysql_close($con);

if(isset($_POST['Submit']))
{
	$dept=$_POST['dept'];
	$sem=$_POST['sem'];
	$staffid=$_COOKIE['user'];
	$mode=$_POST['mode'];
	
  	setcookie("dept",$dept);
	setcookie("sem",$sem);
	if($mode=="int")
	{
  		header('Location: int_list.php');
		exit();
	}
	else if($mode=="att")
	{
		header('Location: m_att_report.php');
		exit();
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
<link href="btstyle.css" rel="stylesheet" type="text/css">
<link href="text.css" rel="stylesheet" type="text/css">
</head>
<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="29%" height="213"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
    <p class="princprof3">&nbsp;</p></td>
    <td width="71%" valign="top">
      <table width="450" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="450" border="0" align="center">
              <tr>
                <th colspan="3" scope="row" background="title.jpg">:: GENERATE REPORT :: </th>
                </tr>
              <tr>
                <th width="100" class="text" scope="row"><div align="left" class="style2 attmain attmain1  attmain1">Department</div></th>
                <th width="6" class="text" scope="row"><span class="attmain1">:</span></th>
                <td width="238" class="text">
                  <?php
$con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die('COULD NOT CONNECT :'.mysql_error());
  }
  else
  {
  mysql_select_db("campusinfocom",$con);
  $hod=$_COOKIE['user'];
  $result=mysql_query("SELECT * FROM department WHERE hod='$hod'");  
  $row = mysql_fetch_array($result);
  $a=$row['dept'];
  $b=$row['name'];
  echo "<b>$b</b>";
  echo "<input type=\"hidden\" name=\"dept\" value=\"$a\">";
  mysql_close($con);
  }
?>
                </td>
              </tr>
              <tr>
                <th class="text" scope="row"><div align="left"><span class="attmain1  attmain1">Semester</span></div></th>
                <th class="text" scope="row"><span class="attmain1">:</span></th>
                <td class="text"><span class="style1 attmain1  attmain1"><strong>
                  <select name="sem" class="box" id="select2">
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
              <tr>
                <th rowspan="2" class="text" scope="row"><div align="left"><span class="attmain1">Select Mode </span></div></th>
                <th rowspan="2" class="text" scope="row"><span class="attmain1">:</span></th>
                <td class="text"><p class="style2"><strong>
                    <input name="mode" type="radio" class="box" value="int">
          Internal Marks</strong></p></td>
              </tr>
              <tr>
                <td class="text"><span class="style2">
                  <input name="mode" type="radio" class="box" value="att" checked>
                  <strong>Attendance </strong></span></td>
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
