<?php 
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
	$subid=$_POST['subid'];
	$mode=$_POST['mode'];
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
	setcookie("subid",$subid);
	if($mode==edit){
	header('Location: int_mark.php');
	exit();}
	else{
	header('Location: int_mark_report.php');
	exit();}
  }
  else
  $msg="Sorry, you are not permitted to edit the details of selected batch.";
	mysql_close($con);
}
}
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
.style1 {font-size: 12}
.style2 {color: #0066FF; font-size: 12; }
.msg {
	font-size: 12px;
	font-weight: bold;
	font-variant: small-caps;
	color: #00CCFF;
}
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
<link href="box.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<style type="text/css">
<!--
.editstud5 {color: #0033FF}
.princprof3 {font-weight: bold}
-->
</style>
</head>

<body>
<?php
$staffid=$_COOKIE['user'];
function generate_sub($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
 
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  
  }
 return $t_dump; 
}
$dept=$_POST['dept'];
$sem=$_POST['sem'];
if($dept!=NULL && $sem!=NULL){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$resultsub = mysql_query("SELECT * FROM subhandle WHERE staffid='$staffid' AND sem='$sem' AND dept='$dept'");
while($row = mysql_fetch_array($resultsub))
  {
  $i=$row['subid'];
  $query = mysql_query("SELECT * FROM subjects WHERE subid='$i'");
  $subname=mysql_fetch_array($query);
  $j=$subname['name'];
  $listsub[$i]=$j;
  }
  mysql_close($con);
 }
 }
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
                <th colspan="4" scope="row" background="title.jpg">:: EDIT INTERNAL MARKS :: </th>
                </tr>
              <tr>
                <th width="100" scope="row"><div align="left" class="attmain1">Department</div></th>
                <th width="6" scope="row"><span class="attmain1">:</span></th>
                <td colspan="2"><span class="style1 attmain1 style2"><strong>
                  <select name="dept" class="box" id="select2" onChange="return submitForm('dept')">
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
  if($dept==$a)
    echo "<option value=\"$a\" selected>$b</option>";
else
echo "<option value=\"$a\">$b</option>";
  }
	mysql_close($con);
  }
?>
                  </select>
                </strong></span></td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="attmain1 attmain1">Semester</span></div></th>
                <th scope="row"><span class="attmain1">:</span></th>
                <td colspan="2"><span class="style1 attmain1 style2"><strong>
                  <select name="sem" class="box" id="select3" onChange="return submitForm('sem')">
                    <option value="0">select</option>
                    <option value="1" <?php if($sem==1) echo "selected"; ?>>S1&amp;S2</option>
                    <option value="3" <?php if($sem==3) echo "selected"; ?>>S3</option>
                    <option value="4" <?php if($sem==4) echo "selected"; ?>>S4</option>
                    <option value="5" <?php if($sem==5) echo "selected"; ?>>S5</option>
                    <option value="6" <?php if($sem==6) echo "selected"; ?>>S6</option>
                    <option value="7" <?php if($sem==7) echo "selected"; ?>>S7</option>
                    <option value="8" <?php if($sem==8) echo "selected"; ?>>S8</option>
                  </select>
                </strong></span></td>
              </tr>
              <tr>
                <th scope="row"><div align="left" class="attmain1">Subject</div></th>
                <th scope="row"><span class="attmain1">:</span></th>
                <td colspan="2"><select name="subid" class="box" id="select3">
                    <option value="0">select</option>
                    <?php print generate_sub($listsub,$sub); ?>
                </select></td>
              </tr>
              <tr>
                <th scope="row"><div align="left" class="attmain1">Mode</div></th>
                <th scope="row"><span class="attmain1">:</span></th>
                <td width="103"><span class="attmain1">
                  <input name="mode" type="radio" value="edit" checked>
                  <strong>Edit</strong></span></td>
                <td width="131"><span class="attmain1">
                  <input name="mode" type="radio" value="view">
                  <strong>View Report</strong> </span></td>
              </tr>
            </table>
            <p align="center" class="style2">
              <input name="sendtype" type="hidden" id="sendtype3">
              <input type="submit" name="Submit" value="Generate">
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
