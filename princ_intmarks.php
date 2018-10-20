<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
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
<style type="text/css">
<!--
.attlist2 {color: #0066FF}
.attlist3 {color: #0066FF; font-weight: bold; }
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
.style9 {color: #000000; font-weight:bold;}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.butstyle {
	cursor: hand;
	background-color: #0000CC;
	width: 115px;
	font-weight: bold;
	color: #00CCFF;
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
.light {
	font-variant: small-caps;
	color: #00CCFF;
	font-weight: bold;
}
.style1 {
	color: #0033FF;
	font-weight: bold;
}
body {
	margin-bottom: 0px;
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
              <form name="form2" method="post" action="princ_att_generate.php">
                <input name="Submit" type="submit" class="butstyle" value="Attendance">
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
      <p align="left">
        <?php
//$x=number;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th colspan=\"8\" class=\"style9\" background=\"title.jpg\">:: INTERNAL MARKS ::</th>
</tr>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Subject Code</th>
<th class=\"ff\">Subject Name</th>
<th class=\"ff\">Sessional1</th>
<th class=\"ff\">Sessional2</th>
<th class=\"ff\">Assignment1</th>
<th class=\"ff\">Assignment2</th>
<th class=\"ff\">Regularity</th>
<th class=\"ff\">Normalized</th>
</tr>";
		$i=$row['rollno'];
		$studid=$_COOKIE['studid'];
		
		$query = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
		$flag=0;
		while($subj=mysql_fetch_array($query)){
		$sub_identity=$subj['subid'];
		$sub_name=$subj['name'];
		$staff_query=mysql_query("SELECT * FROM subhandle WHERE dept='$dept' AND sem='$sem' AND subid='$sub_identity'");
		$staff=mysql_fetch_array($staff_query);
		$staffid=$staff['staffid'];
		$mark_query=mysql_query("SELECT * from intmark WHERE studid='$studid' AND subid='$sub_identity'");
		$mark=mysql_fetch_array($mark_query);
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
		if($mark){
		$sub_identity=$mark['subid'];
		echo "<td class=\"cell\">".$sub_identity."</td>";
		echo "<td class=\"cell\">".$sub_name."</td>";	
		if($mark['ses1']==999)	
			echo "<td class=\"cell\">-</td>";
		else if($mark['ses1']==65)
			echo "<td class=\"cell\">A</td>";
		else
			echo "<td class=\"cell\">".$mark['ses1']."</td>";
		if($mark['ses2']==999)	
			echo "<td class=\"cell\">-</td>";
		else if($mark['ses2']==65)
			echo "<td class=\"cell\">A</td>";
		else
			echo "<td class=\"cell\">".$mark['ses2']."</td>";
		if($mark['ass1']==999)	
			echo "<td class=\"cell\">-</td>";
		else
			echo "<td class=\"cell\">".$mark['ass1']."</td>";
		if($mark['ass2']==999)	
			echo "<td class=\"cell\">-</td>";
		else
			echo "<td class=\"cell\">".$mark['ass2']."</td>";
		
		$query_att=mysql_query("SELECT * FROM attendance1 WHERE subid='$sub_identity' AND staffid='$staffid'");
   $totalhours=mysql_num_rows($query_att);
    $absent=0;
   while($row_r=mysql_fetch_array($query_att))
   {
   		$id=$row_r['id']; 
		$query1=mysql_query("SELECT * FROM attendance2 WHERE id='$id' AND studid='$k'");
		$row1=mysql_fetch_array($query1);
		
		if($row1)
			$absent=$absent+1;
	}	
	if($totalhours!=0)
	{
	$present=$totalhours - $absent;
	$regularity=(($present/$totalhours)*100);
	if($regularity>=90)
	$regm=5;
	else if($regularity>=80 && $regularity<90)
	$regm=4;
	else if($regularity>=70 && $regularity<80)
	$regm=3;
	else if($regularity>=60 && $regularity<70)
	$regm=2;
	else if($regularity>=50 && $regularity<60)
	$regm=1;
	else $regm=0;
	}
		echo "<td class=\"cell\">".$regm."</td>";
		if($mark['normalized']==999)	
			echo "<td class=\"cell\">-</td>";
		else
			echo "<td class=\"cell\">".$mark['normalized']."</td>";
		//echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
		}
		else
		{
				echo "<td class=\"cell\">".$sub_identity."</td>";
				echo "<td class=\"cell\">".$sub_name."</td>";	
				echo "<td class=\"cell\">-</td>";
			echo "<td class=\"cell\">-</td>";
			echo "<td class=\"cell\">-</td>";
			echo "<td class=\"cell\">-</td>";
			echo "<td class=\"cell\">-</td>";
			echo "<td class=\"cell\">-</td>";
			}
			if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
		

  		echo "</tr>";	
		}	
	
  echo "</table>";
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
