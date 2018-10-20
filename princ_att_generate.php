<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
	$user=$_COOKIE['user'];
	if($user=="principal")
		include('./princ_trial.htm');
	else
		include('./hod_trial.htm');
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
<style type="text/css">
<!--
.light {	font-variant: small-caps;
	color: #00CCFF;
	font-weight: bold;
}
.butstyle {
	cursor: hand;
	background-color: #0000CC;
	width: 115px;
	font-weight: bold;
	color: #00CCFF;
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
.style8 {
	color: #0033FF;
	font-weight: bold;
}
.butstyle1 {	cursor: hand;
	background-color: #0000CC;
	width: 115px;
	font-weight: bold;
	color: #00CCFF;
	list-style-type: disc;
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
body {
	margin-bottom: 0px;
}
.style9 {color: #000000; font-weight:bold;}
-->
</style>
</head>

<body>
<?php
$studid=$_COOKIE['studid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$student_query = mysql_query("SELECT * FROM student WHERE studid='$studid'");
$student=mysql_fetch_array($student_query);
$dept=$student['dept'];
$sem=$student['sem'];
$name=$student['name'];
$rollno=$student['rollno'];
$photo=$student['photo'];
$src="upload/".$photo;
mysql_close($con);
}
$studid=$_COOKIE['studid'];
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="16%" valign="top"><table width="144" border="0">
        <tr>
          <td width="134"><img alt="" name="photo" width="137" height="169" border="2" src="<?php echo $src; ?>"></td>
        </tr>
        <tr>
          <td bgcolor="#000000"><div align="center"><span class="light"><?php echo $name; ?></span></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form2" method="post" action="princ_intmarks.php">
                <input name="Submit" type="submit" class="butstyle" value="Internal Marks">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form3" method="post" action="princ_extmarks.php">
                <input name="Submit2" type="submit" class="butstyle" value="External Marks">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="formtt" method="post" action="greencard.php">
                <input name="Submit3" type="submit" class="butstyle" value="White Card">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form4" method="post" action="princ_studsearchprofile.php">
                <input name="Submit3" type="submit" class="butstyle" value="Profile">
              </form>
          </div></td>
        </tr>
    </table></td>
    <td width="84%" valign="top"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <p align="center" class="style8 style9">
        <?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
echo '<center>';
echo "<table border='0' width='500'>
<tr bgcolor=\"#0000FF\">
<th colspan=\"5\" class=\"style9\" background=\"title.jpg\">:: ATTENDANCE REPORT ::</th>
</tr>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Subject Code</th>
<th class=\"ff\">Subject Name</th>
<th class=\"ff\">Total Hours</th>
<th class=\"ff\">Leave</th>
<th class=\"ff\">Regularity</th>
</tr>";
$flag=0;
		$i=$row['rollno'];
		$studid=$_COOKIE['studid'];
		
		$sub_query = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
		$flag=0; $motham_hour=0; $motham_absent=0;
		while($subj=mysql_fetch_array($sub_query)){
		$sub_identity=$subj['subid'];
		$sub_name=$subj['name'];
		$staff_query=mysql_query("SELECT * FROM subhandle WHERE dept='$dept' AND sem='$sem' AND subid='$sub_identity'");
		$staff=mysql_fetch_array($staff_query);
		$staffid=$staff['staffid'];
				
		$query=mysql_query("SELECT * FROM attendance1 WHERE subid='$sub_identity' AND staffid='$staffid'");
        $totalhours=mysql_num_rows($query);
		$absent=0;
		if($totalhours>0){
		while($row1=mysql_fetch_array($query))
  		{
   		$id=$row1['id']; 
		$query3=mysql_query("SELECT * FROM attendance2 WHERE id='$id' AND studid='$studid'");
		$row3=mysql_fetch_array($query3);
		
		if($row3)
			$absent=$absent+1;
		}		
		if($totalhours!=0)
		{
			$present=$totalhours - $absent;
			$regularity=(($present/$totalhours)*100);
		}		
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<td class=\"cell\">".$sub_identity."</td>";
		echo "<td class=\"cell\">".$sub_name."</td>";
		echo "<td class=\"cell\">".$totalhours."</td>";
 		echo "<td class=\"cell\">".$absent."</td>";
		echo "<td class=\"cell\">".substr($regularity,0,5)."%"."</td>";
  		echo "</tr>";
		$motham_hour=$motham_hour+$totalhours;
		$motham_absent=$motham_absent+$absent;
		}
		else
		{
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<td class=\"cell\">".$sub_identity."</td>";
		echo "<td class=\"cell\">".$sub_name."</td>";
		echo "<td class=\"cell\">-</td>";
 		echo "<td class=\"cell\">-</td>";
		echo "<td class=\"cell\">-</td>";
  		echo "</tr>";
		}
				
		if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
}
  echo "</table>";
  $motham_present=$motham_hour-$motham_absent;
  if($motham_hour==0) $motham_hour=1;
  $motham=($motham_present/$motham_hour)*100;
  echo "<p class=\"cell\"><b>Total Attendance = ".substr($motham,0,6)."%</p>";
 echo '</center>';
mysql_close($con);
?>
      </p>
      <input name="sendtype" type="hidden" id="sendtype2">
    </form></td>
  </tr>
</table>
</body>
</html>
