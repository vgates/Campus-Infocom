<?php 
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./staff_trial.htm');
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
	setcookie("studid",$_POST['studid']);
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
	header('Location: editstud_staff.php');
	exit();
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
<style type="text/css">
<!--
.attmain {color: #00CC33}
.attmain1 {color: #0066FF}
.style2 {color: #0066FF; font-size: 12; }
.msg {
	font-size: 12px;
	font-weight: bold;
	font-variant: small-caps;
	color: #00CCFF;
}
.editstud5 {color: #0033FF}
-->
</style>
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
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.light {	font-size: 16px;
	color: #0033FF;
}
.princprof3 {font-weight: bold}
.style3 {color: #0066FF; font-weight: normal; }
.style9 {color: #000000}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
function generate_list($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
  $t_dump.="                                ";
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  $t_dump.="n";
  }
 return $t_dump; 
}
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM department");
while($row = mysql_fetch_array($result))
  {
  $i=$row['dept'];
  $j=$row['name'];
  $listdept[$i]=$j;
  }
mysql_close($con);
$dept=$_POST['dept'];
$sem=$_POST['sem'];
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="29%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="editstud5"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="71%" valign="top">
      <table width="450" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td height="150" bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="450" border="0" align="center">
              <tr>
                <th colspan="3" scope="row" background="title.jpg">:: EDIT STUDENTS PROFILE :: </th>
                </tr>
              <tr>
                <th width="170" scope="row"><div align="right" class="attmain1">
                    <div align="left">Semester</div>
                </div></th>
                <td width="5"><span class="attmain1"><strong>:</strong></span></td>
                <td width="261"><div align="left">
                    <select name="sem" class="box" id="sem">
                      <option value="0">select</option>
                      <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
                      <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
                      <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
                      <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
                      <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
                      <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
                      <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
                    </select>
                </div></td>
              </tr>
              <tr>
                <th scope="row"><div align="right" class="attmain1">
                    <div align="left">Department</div>
                </div></th>
                <td><span class="attmain1"><strong>:</strong></span></td>
                <td><div align="left">
                    <select name="dept" class="box" id="select2" onChange="return submitForm('dept')">
                      <option value="0">select</option>
                      <?php print generate_list($listdept,$dept); ?>
                    </select>
                </div></td>
              </tr>
              <tr>
                <th height="26" nowrap scope="row"><div align="right" class="attmain1">
                    <p align="left">Select Student</p>
                </div></th>
                <td><span class="attmain1"><strong>:</strong></span></td>
                <td><div align="left">
                    <select name="studid" class="box" id="studid">
                      <option value="0">select</option>
                      <?php			
			if(!empty($_POST['dept'])){
			$con = mysql_connect("localhost","root","");
			if (!$con)
 			{
 			 die('Could not connect: ' . mysql_error());
  			}
			else
			{
			mysql_select_db("campusinfocom", $con);

			$result = mysql_query("SELECT * FROM student ORDER BY rollno");

			while($row = mysql_fetch_array($result))
 			{
			 $department=$row['dept'];
			 $semester=$row['sem'];
			 if($dept==$department && $sem==$semester)
			 {
			 $c=$row['studid'];
			 $d=$row['name'];
 			 echo "<option value=\"$c\">$d</option>";
			 echo "<br />";
			 }
 			 }
			mysql_close($con);
			}}
?>
                    </select>
                </div></td>
              </tr>
            </table>
            <p align="center" class="style2">
              <input name="sendtype" type="hidden" id="sendtype">
              <input name="Submit" type="submit" class="butstyle" value="Generate Profile">
            </p>
            </form></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center" class="msg"><?php echo $msg; ?></div>
</body>
</html>
