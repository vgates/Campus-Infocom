<?php 
error_reporting(0);
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
$user=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
 	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom",$con);
	if($user=="principal")
	{
		include('./princ_trial.htm');
		$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
	}
	else
	{
		include('./hod_trial.htm');
		$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
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
	color: #00CCFF;
	background-color: #0000CC;
	font-size: 16px;
	font-weight: bold;
	width: 300px;
	font-family: "Times New Roman", Times, serif;
	cursor: hand;
}
.princprof3 {font-weight: bold}
.style1 {color: #0066FF}
.style3 {color: #0066FF; font-weight: bold; }
.studet1 {font-size: 12px}
.style6 {color: #0033FF}
.style7 {font-size: 12px; color: #0033FF; }
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
function generate_list($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
 // $t_dump.="                                ";
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  //$t_dump.="n";
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
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="26%" height="175"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
      <p class="princprof3">&nbsp;</p>
      <p class="princprof3">&nbsp;</p></td>
    <td width="74%" valign="top">
      <table width="493" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="princ_search_stud_list.php">
              <table width="489" border="0" align="center">
                <tr>
                  <td height="27" colspan="3" background="title.jpg"><div align="center" class="princprof3">:: SEARCH :: </div></td>
                </tr>
                <tr>
                  <td width="245" height="32" nowrap><div align="right" class="style1">
                      <div align="left"><strong>Enter name</strong></div>
                  </div></td>
                  <td width="8"><div align="center"><span class="style3">:</span></div></td>
                  <td width="222"><input name="name" type="text" class="style6" id="name"></td>
                </tr>
                <tr>
                  <td height="33" class="style1 princprof3"><strong>Enter university number</strong></td>
                  <td><div align="center"><span class="style3">:</span></div></td>
                  <td><input name="urollno" type="text" class="style6" id="urollno"></td>
                </tr>
                <tr>
                  <td height="33" class="style1 princprof3">Department</td>
                  <td><div align="center"><strong class="style1">:</strong></div></td>
                  <td><select name="dept" class="style6" id="dept">
                    <option value="0">select</option>
                    <?php print generate_list($listdept,$dept); ?>
                                    </select></td>
                </tr>
                <tr>
                  <td height="33"><div align="right" class="style1">
                      <div align="left"><strong>Semester</strong></div>
                  </div></td>
                  <td><div align="center"><span class="style3">:</span></div></td>
                  <td><select name="sem" class="style6" id="sem">
                    <option value="0">select</option>
                    <option value="1">S1 &amp; S2</option>
                    <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
                    <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
                    <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
                    <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
                    <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
                    <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
                                    </select></td>
                </tr>
                <tr class="style1">
                  <td height="33"><strong>Enter date to search absentees </strong></td>
                  <td><div align="center"><strong>:</strong></div></td>
                  <td><span class="style7">DD</span> <span class="style6">
                    <input name="date" type="text" class="style6" id="date" size="2">
                    <span class="studet1">MM
                    <input name="month" type="text" class="style6" id="month" size="2">
YYYY
<input name="year" type="text" class="style6" id="year" size="4">
                    </span></span></td>
                </tr>
                <tr class="style1">
                  <td height="26" colspan="3"><div align="center">
                      <input name="Submit" type="submit" class="butstyle" value="Search">
                  </div></td>
                </tr>
              </table>
          </form></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
