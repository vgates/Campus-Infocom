<?php 
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
error_reporting(0);
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

$staffid=$_COOKIE['user'];
$sem=$_COOKIE['sem'];
$dept=$_COOKIE['dept'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.attlist2 {color: #0066FF}
.attlist3 {color: #0066FF; font-weight: bold; }
.style6 {font-size: 16px; font-weight: bold; color: #0033FF; }
.style8 {font-size: 12px; font-weight: bold; color: #0033FF; }
.ff {
	color: #00CCFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
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
$staffid=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subhandle WHERE staffid='$staffid' AND sem='$sem' AND dept='$dept'");
if(date(D)=="Tue")
	$day="Tuesday";
else if(date(D)=="Wed")
	$day="Wednesday";
	else if(date(D)=="Thu")
	$day="Thursday";
	else if(date(D)=="Sat")
	$day="Saturday";
	else
	$day=date(D)."day";
while($row = mysql_fetch_array($result))
  {
  $i=$row['subid'];
  $d=$row['day'];
  if($day==$d)
  {
  	$sub=$row['subid'];
	$h=$row['hour'];
 }
  $query = mysql_query("SELECT * FROM subjects WHERE subid='$i'");
  $subname=mysql_fetch_array($query);
  $j=$subname['name'];
  $listsub[$i]=$j;
  }
mysql_close($con);
}
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><form name="form1" method="post" action="att_entry.php">
      <table width="624" border="0" align="center">
        <tr>
          <td width="32"><span class="style6">Date:</span></td>
          <td width="242"><span class="style8">DD
                <input name="date" type="text" class="box" id="date" value="<?php $date=date(d); echo $date; ?>" size="2">
        MM
        <input name="month" type="text" class="box" id="month" value="<?php $month=date(m); echo $month; ?>" size="2">
        YYYY
        <input name="year" type="text" class="box" id="year" value="<?php $year=date(Y); echo $year; ?>" size="4">
          </span></td>
          <td width="49"><span class="style6">Subject:</span></td>
          <td width="163"><span class="style6">
            <select name="subid" class="box" id="select">
              <?php print generate_sub($listsub,$sub); ?>
            </select>
          </span></td>
          <td width="34"><span class="style6">Hour:</span></td>
          <td width="64"><span class="style6">
            <select name="hour" class="box" id="select2">
              <option value="1" <?php if($h==1) echo "selected"; ?>>1st</option>
              <option value="2" <?php if($h==2) echo "selected"; ?>>2nd</option>
              <option value="3" <?php if($h==3) echo "selected"; ?>>3rd</option>
              <option value="4" <?php if($h==4) echo "selected"; ?>>4th</option>
              <option value="5" <?php if($h==5) echo "selected"; ?>>5th</option>
              <option value="6" <?php if($h==6) echo "selected"; ?>>6th</option>
              <option value="7" <?php if($h==7) echo "selected"; ?>>7th</option>
              <option value="8" <?php if($h==8) echo "selected"; ?>>8th</option>
            </select>
          </span></td>
        </tr>
      </table>
      <p align="center">
        <?php
$x=number;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$student = mysql_query("SELECT * FROM student ORDER BY rollno");
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Click Absentees</th>
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
</tr>";
$flag=0;
while($row = mysql_fetch_array($student))
  {
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{
		$i=$row['rollno'];
		$k=$row['studid'];
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<td>"."<input type=\"checkbox\" name=\"$i\" value=\"$k\">"."</td>";		
 		echo "<td class=\"cell\">".$row['rollno']."</td>";
		echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";		
  		echo "</tr>";		
	
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
	}
  }
  echo "</table>";
 echo '</center>';
mysql_close($con);
?>
      </p>
      <p align="center">
        <input type="submit" name="Submit" value="Submit">
      </p>
    </form></td>
  </tr>
</table>
</body>
</html>
