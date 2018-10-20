<?php
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./stud_trial.htm');
$studid=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$query = mysql_query("SELECT * FROM student WHERE studid='$studid'");
$fetch=mysql_fetch_array($query);
$dept=$fetch['dept'];
$photo=$fetch['photo'];
 $src="upload/".$photo;
mysql_close($con);
$sem=$_POST['sem'];
if(isset($_POST['Submit'])){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else{
mysql_select_db("campusinfocom", $con);
$int1=$_POST['int1']; $ext1=$_POST['ext1']; $sub1=$_POST['sub1'];
$int2=$_POST['int2']; $ext2=$_POST['ext2']; $sub2=$_POST['sub2'];
$int3=$_POST['int3']; $ext3=$_POST['ext3']; $sub3=$_POST['sub3'];
$int4=$_POST['int4']; $ext4=$_POST['ext4']; $sub4=$_POST['sub4'];
$int5=$_POST['int5']; $ext5=$_POST['ext5']; $sub5=$_POST['sub5'];
$int6=$_POST['int6']; $ext6=$_POST['ext6']; $sub6=$_POST['sub6'];
$int7=$_POST['int7']; $ext7=$_POST['ext7']; $sub7=$_POST['sub7'];
$int8=$_POST['int8']; $ext8=$_POST['ext8']; $sub8=$_POST['sub8'];
$int9=$_POST['int9']; $ext9=$_POST['ext9']; $sub9=$_POST['sub9'];
$int10=$_POST['int10']; $ext10=$_POST['ext10']; $sub10=$_POST['sub10'];
$int11=$_POST['int11']; $ext11=$_POST['ext11']; $sub11=$_POST['sub11'];
$int12=$_POST['int12']; $ext12=$_POST['ext12']; $sub12=$_POST['sub12'];
$int12=$_POST['int13']; $ext12=$_POST['ext13']; $sub12=$_POST['sub13'];
$int12=$_POST['int14']; $ext12=$_POST['ext14']; $sub12=$_POST['sub14'];
$int12=$_POST['int15']; $ext12=$_POST['ext15']; $sub12=$_POST['sub15'];
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub1'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int1 WHERE studid='$studid' AND subid='$sub1'");			
		mysql_query("UPDATE extmark SET external=$ext1 WHERE studid='$studid' AND subid='$sub1'");
	}
	else
	{		
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub1','$int1','$ext1')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub2'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int2 WHERE studid='$studid' AND subid='$sub2'");			
		mysql_query("UPDATE extmark SET external=$ext2 WHERE studid='$studid' AND subid='$sub2'");
	}
	else
	{		
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub2','$int2','$ext2')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub3'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int3 WHERE studid='$studid' AND subid='$sub3'");			
		mysql_query("UPDATE extmark SET external=$ext3 WHERE studid='$studid' AND subid='$sub3'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub3','$int3','$ext3')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub4'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int4 WHERE studid='$studid' AND subid='$sub4'");			
		mysql_query("UPDATE extmark SET external=$ext4 WHERE studid='$studid' AND subid='$sub4'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub4','$int4','$ext4')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub5'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int5 WHERE studid='$studid' AND subid='$sub5'");			
		mysql_query("UPDATE extmark SET external=$ext5 WHERE studid='$studid' AND subid='$sub5'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub5','$int5','$ext5')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub6'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int6 WHERE studid='$studid' AND subid='$sub6'");			
		mysql_query("UPDATE extmark SET external=$ext6 WHERE studid='$studid' AND subid='$sub6'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub6','$int6','$ext6')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub7'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int7 WHERE studid='$studid' AND subid='$sub7'");			
		mysql_query("UPDATE extmark SET external=$ext7 WHERE studid='$studid' AND subid='$sub7'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub7','$int7','$ext7')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub8'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int8 WHERE studid='$studid' AND subid='$sub8'");			
		mysql_query("UPDATE extmark SET external=$ext8 WHERE studid='$studid' AND subid='$sub8'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub8','$int8','$ext8')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub9'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int9 WHERE studid='$studid' AND subid='$sub9'");			
		mysql_query("UPDATE extmark SET external=$ext9 WHERE studid='$studid' AND subid='$sub9'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub9','$int9','$ext9')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub10'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int10 WHERE studid='$studid' AND subid='$sub10'");			
		mysql_query("UPDATE extmark SET external=$ext10 WHERE studid='$studid' AND subid='$sub10'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub10','$int10','$ext10')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub11'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int11 WHERE studid='$studid' AND subid='$sub11'");			
		mysql_query("UPDATE extmark SET external=$ext11 WHERE studid='$studid' AND subid='$sub11'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub11','$int11','$ext11')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub12'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int12 WHERE studid='$studid' AND subid='$sub12'");			
		mysql_query("UPDATE extmark SET external=$ext12 WHERE studid='$studid' AND subid='$sub12'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub12','$int12','$ext12')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub13'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int13 WHERE studid='$studid' AND subid='$sub13'");			
		mysql_query("UPDATE extmark SET external=$ext13 WHERE studid='$studid' AND subid='$sub13'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub13','$int13','$ext13')");
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub14'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int14 WHERE studid='$studid' AND subid='$sub14'");			
		mysql_query("UPDATE extmark SET external=$ext14 WHERE studid='$studid' AND subid='$sub14'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub14','$int14','$ext14')");
	}
	$query=mysql_query("SELECT * from extmark WHERE studid='$studid' AND subid='$sub15'");	
	$row=mysql_fetch_array($query);
	if($row)
	{
		mysql_query("UPDATE extmark SET internal=$int15 WHERE studid='$studid' AND subid='$sub15'");			
		mysql_query("UPDATE extmark SET external=$ext15 WHERE studid='$studid' AND subid='$sub15'");
	}
	else
	{
		mysql_query("INSERT INTO extmark (studid,subid,internal,external) VALUES ('$studid','$sub15','$int15','$ext15')");
	}
	}
	mysql_close($con);
	header('Location: stud_home.php');
}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<style type="text/css">
<!--
.style1 {
	color: #0066FF;
	font-weight: bold;
}
.ff {
	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0033FF;
	font-weight: normal;
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
<style type="text/css">
<!--
.princprof3 {font-weight: bold}
.studprof {	color: #0033FF;
	font-weight: bold;
}
.studprof2 {color: #0033FF}
body {
	margin-bottom: 0px;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="15%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="85%" valign="top">    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <table width="200" border="0" align="center">
        <tr>
          <td nowrap><div align="right" class="style1">Select semester to generate External marks:</div></td>
          <td><select name="sem" class="box" id="select" onChange="return submitForm('sem')">
              <option value="0">select</option>
              <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
              <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
              <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
              <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
              <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
              <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
              <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
          </select></td>
        </tr>
      </table>
      <p align="center">
        <?php
if(!empty($_POST['sem'])){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0099FF\">
<th class=\"ff\">Code</th>
<th class=\"ff\">Subject</th>
<th class=\"ff\">Internal</th>
<th class=\"ff\">External</th>
<th class=\"ff\">Total</th>
</tr>";
$flag=0; $i=0;
$grandtotal=0;
while($row = mysql_fetch_array($result))
  {
		$i++;
		$ext="ext".$i;
		$int="int".$i;
		$sub="sub".$i;
		$x=$row['subid'];
		$intmark = mysql_query("SELECT * FROM extmark WHERE studid='$studid' AND subid='$x'");
		$intmark=mysql_fetch_array($intmark);
		if($intmark)
			$intmark=$intmark['internal'];
		else
			$intmark=NULL;
		$extmark = mysql_query("SELECT * FROM extmark WHERE studid='$studid' AND subid='$x'");
		$extmark=mysql_fetch_array($extmark);
		if($extmark)
			$extmark=$extmark['external'];
		else
			$extmark=NULL;
		$total=$intmark+$extmark;
		$grandtotal=$grandtotal+$total;
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#BFDFFF\">";
 		echo "<input type=\"hidden\" name=\"$sub\" value=\"$x\">";
		echo "<td class=\"cell\">".$row['subid']."</td>";
		echo "<td class=\"cell\">".$row['name']."</td>";		
		echo "<td>"."<input type=\"text\" name=\"$int\" value=\"$intmark\" size=\"3\" maxlength=\"3\" class=\"cell\">"."</td>";
		echo "<td>"."<input type=\"text\" name=\"$ext\" value=\"$extmark\" size=\"3\" maxlength=\"3\" class=\"cell\">"."</td>";
		echo "<td class=\"cell\">".$total."</td>";
  		echo "</tr>";
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
	$j=$i;
  }
  echo "</table>";
 echo '</center>';
mysql_close($con);
}
?>
      </p>
      <p align="center">
       <?php echo "<table border='0'>
<tr bgcolor=\"#0099FF\">
<th class=\"ff\">Grand Total = $grandtotal </th>
</tr></table>"; ?><input name="Submit" type="submit" class="butstyle" value="Save">
</p>
      <p align="center">
        <input name="sendtype" type="hidden" id="sendtype">
      </p>
    </form></td>
  </tr>
</table>
</body>
</html>
