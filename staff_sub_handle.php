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

	if(isset($_POST['Submit'])){
	if(empty($_POST['sem']))
		$a=false;
	else
		$a=$_POST['sem'];		
	if(empty($_POST['dept']))
		$c=false;
	else
		$c=$_POST['dept'];
	if(empty($_POST['subid']))
		$d=false;
	else
		$d=$_POST['subid'];
	if(empty($_POST['day']))
		$day=false;
	else
		$day=$_POST['day'];
		if(empty($_POST['hour']))
		$hour=false;
	else
		$hour=$_POST['hour'];
		$staffid=$_COOKIE['user'];
		if($a && $c && $d && $day && $hour)
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$result2 = mysql_query("SELECT * FROM subhandle WHERE dept='$c' AND sem='$a' AND day='$day' AND hour='$hour'");
			$name=mysql_fetch_array($result2);
			if($name)
				$msg="Already entered...!!";
			else
			{
			$query="INSERT INTO subhandle(staffid,subid,dept,sem,day,hour) VALUES ('$staffid','$d','$c','$a','$day','$hour')";
			if (!mysql_query($query,$con))
			{
  				die('Error: ' . mysql_error());
 			}
			else
			{
				mysql_close();				
				header("Location: staff_sub_handle.php");
				exit();
			}
			}
		}
	}
	else
	{
		 $msg="<p>PLEASE TRY AGAIN.......!!!</p>";
	}
}
if(isset($_POST['Submit2'])){
	if(empty($_POST['sem']))
		$a=false;
	else
		$a=$_POST['sem'];		
	if(empty($_POST['dept']))
		$c=false;
	else
		$c=$_POST['dept'];
	if(empty($_POST['subid']))
		$d=false;
	else
		$d=$_POST['subid'];
	if(empty($_POST['day']))
		$day=false;
	else
		$day=$_POST['day'];
		if(empty($_POST['hour']))
		$hour=false;
	else
		$hour=$_POST['hour'];
		$staffid=$_COOKIE['user'];
		if($a && $c && $d && $day && $hour)
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			mysql_query("DELETE FROM subhandle WHERE staffid='$staffid' AND subid='$d' AND dept='$c' AND sem='$a' AND day='$day' AND hour='$hour'");
			mysql_close($con);	
		}
	}
	else
	{
		 $msg="PLEASE TRY AGAIN.......!!!";
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
.handle1 {font-size: 16px}
.handle2 {color: #0033FF}
.table {
	font-size: 14px;
	color: #FFFFFF;
}
.cell {
	font-size: 16px;
	color: #0066FF;
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
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<link href="box.css" rel="stylesheet" type="text/css">
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="46%" valign="top"><span class="bg">
      <?php
$staffid=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subhandle WHERE staffid='$staffid'");
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0099FF\">
<th class=\"table\">Department</th>
<th class=\"table\">Semester  </th>
<th class=\"table\">Subject   </th>
<th class=\"table\">Day       </th>
<th class=\"table\">Hour   </th>
</tr>";
$flag=0;
while($row = mysql_fetch_array($result))
  {
		$i=$row['subid'];
		$result2 = mysql_query("SELECT * FROM subjects WHERE subid='$i'");
		$name=mysql_fetch_array($result2);
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#BFDFFF\">";
 			
 		echo "<td class=\"cell\">".$row['dept']."</td>";
		echo "<td class=\"cell\">".$row['sem']."</td>";	
		if($i=="Seminar")
		echo "<td class=\"cell\">Seminar</td>";
		else if($i=="Debate")
		echo "<td class=\"cell\">Debate</td>";
		else
		echo "<td class=\"cell\">".$name['name']."</td>";
		echo "<td class=\"cell\">".$row['day']."</td>";
		echo "<td class=\"cell\">".$row['hour']."</td>";
  		echo "</tr>";		
	
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
  }
  echo "</table>";
 echo '</center>';
mysql_close($con);
?>
    </span></td>
    <td width="54%" valign="top"><span class="bg">
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
</span>
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div align="center">
          <table width="200" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
            <tr>
              <td bgcolor="#FFFFFF"><table width="489" border="0" align="center">
                <tr>
                  <th colspan="3" scope="row" background="title.jpg">:: SUBJECT SCHEDULING :: </th>
                </tr>
                <tr>
                  <th width="180" scope="row"><div align="left" class="style7 handle1 handle2"><strong>Semester</strong></div></th>
                  <th width="14" class="bg handle2" scope="row">:</th>
                  <td width="281">
                    <div align="left"> <span class="bg">
                      <select name="sem" class="box" id="select">
                        <option value="0">select</option>
                        <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
                        <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
                        <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
                        <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
                        <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
                        <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
                        <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
                      </select>
                  </span></div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="left" class="bg handle1 handle2"><strong>Department</strong></div></th>
                  <th class="bg handle2" scope="row">:</th>
                  <td>
                    <div align="left"> <span class="bg">
                      <select name="dept" class="box" id="select3" onChange="return submitForm('dept')">
                        <option value="0">select</option>
                        <?php print generate_list($listdept,$dept); ?>
                      </select>
                  </span></div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="left" class="style7 handle1 handle2"><strong>Subject</strong></div></th>
                  <th class="bg handle2" scope="row">:</th>
                  <td>
                    <div align="left"> <span class="bg">
                      <select name="subid" class="box" id="subid">
                        <option value="0">select </option>
                        <option value="Seminar">Seminar</option>
                        <option value="Debate">Debate</option>
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

			$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");

			while($row = mysql_fetch_array($result))
 			{
			 $c=$row['subid'];
			 $d=$row['name'];
 			 echo "<option value=\"$c\">$d</option>";
			 echo "<br />";
 			 }
			mysql_close($con);
			}}
?>
                      </select>
                  </span></div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="left" class="style7 handle1 handle2"><strong>Day</strong></div></th>
                  <th class="bg handle2" scope="row">:</th>
                  <td>
                    <div align="left"> <span class="bg">
                      <select name="day" class="box" id="day">
                        <option value="0">select</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                      </select>
                  </span></div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="left" class="style7 handle1 handle2"><strong>Hour</strong></div></th>
                  <th class="bg handle2" scope="row">:</th>
                  <td>
                    <div align="left"> <span class="bg">
                      <select name="hour" class="box" id="hour">
                        <option value="0">select</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                        <option value="6">6th</option>
                        <option value="7">7th</option>
                      </select>
                  </span></div></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <p> <span class="bg">
            <input name="sendtype" type="hidden" id="sendtype">
            <input name="Submit" type="submit" class="butstyle" value="Add">
            <input name="Submit2" type="submit" class="butstyle" value="Delete">
          </span></p>
        </div>
      </form>
    <span class="bg">    </span></td>
  </tr>
</table>
<?php echo "<p align=\"center\" class=\"table\">".$msg."</p>"; ?>
</body>
</html>
