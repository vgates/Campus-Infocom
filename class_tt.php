<?php if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
else
{
include('./stud_trial.htm');
$studid=$_COOKIE['user'];
$user=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
 	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom",$con);
		$result = mysql_query("SELECT * FROM student WHERE studid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
mysql_close($con);
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {color: #0066FF}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
.style8 {	color: #000000;
	font-weight: bold;
}
.style9 {color: #00FFFF}
-->
</style>
</head>
<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM student WHERE studid='$studid'");
while($row = mysql_fetch_array($result))
  {
  $dept=$row['dept'];
  $sem=$row['sem'];
 
  }
			 //retrieving details from timetable
			$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=1");
			$row1 = mysql_fetch_array($result2);
  				$m1=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m1'");
				$row=mysql_fetch_array($result3);
				if($m1=="Seminar")
					$m1="Seminar";
				else if($m1=="Debate")
					$m1="Debate";
				else if($m1==NULL)
					$m1="Tutorial";
				else
				$m1=$row['name'];
				
  				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=2");
				$row1 = mysql_fetch_array($result2);
				$m2=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m2'");
				$row=mysql_fetch_array($result3);
				if($m2=="Seminar")
					$m2="Seminar";
				else if($m2=="Debate")
					$m2="Debate";
				else if($m2==NULL)
					$m2="Tutorial";
				else
				$m2=$row['name'];
				
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=3");
				$row1 = mysql_fetch_array($result2);
				$m3=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m3'");
				$row=mysql_fetch_array($result3);
				if($m3=="Seminar")
					$m3="Seminar";
				else if($m3=="Debate")
					$m3="Debate";
				else if($m3==NULL)
					$m3="Tutorial";
				else
				$m3=$row['name'];
				
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=4");
				$row1 = mysql_fetch_array($result2);
				$m4=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m4'");
				$row=mysql_fetch_array($result3);
				if($m4=="Seminar")
					$m4="Seminar";
				else if($m4=="Debate")
					$m4="Debate";
				else if($m4==NULL)
					$m4="Tutorial";
				else
				$m4=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=5");
				$row1 = mysql_fetch_array($result2);
				$m5=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m5'");
				$row=mysql_fetch_array($result3);
				if($m5=="Seminar")
					$m5="Seminar";
				else if($m5=="Debate")
					$m5="Debate";
				else if($m5==NULL)
					$m5="Tutorial";
				else
				$m5=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=6");
				$row1 = mysql_fetch_array($result2);
				$m6=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m6'");
				$row=mysql_fetch_array($result3);
				if($m6=="Seminar")
					$m6="Seminar";
				else if($m6=="Debate")
					$m6="Debate";
				else if($m6==NULL)
					$m6="Tutorial";
				else
				$m6=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Monday' AND hour=7");
				$row1 = mysql_fetch_array($result2);
				$m7=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$m7'");
				$row=mysql_fetch_array($result3);
				if($m7=="Seminar")
					$m7="Seminar";
				else if($m7=="Debate")
					$m7="Debate";
				else if($m7==NULL)
					$m7="Tutorial";
				else
				$m7=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=1");
				$row1 = mysql_fetch_array($result2);
				$tu1=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu1'");
				$row=mysql_fetch_array($result3);
				if($tu1=="Seminar")
					$tu1="Seminar";
				else if($tu1=="Debate")
					$tu1="Debate";
				else if($tu1==NULL)
					$tu1="Tutorial";
				else
				$tu1=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=2");
				$row1 = mysql_fetch_array($result2);
				$tu2=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu2'");
				$row=mysql_fetch_array($result3);
				if($tu2=="Seminar")
					$tu2="Seminar";
				else if($tu2=="Debate")
					$tu2="Debate";
				else if($tu2==NULL)
					$tu2="Tutorial";
				else
				$tu2=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=3");
				$row1 = mysql_fetch_array($result2);
				$tu3=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu3'");
				$row=mysql_fetch_array($result3);
				if($tu3=="Seminar")
					$tu3="Seminar";
				else if($tu3=="Debate")
					$tu3="Debate";
				else if($tu3==NULL)
					$tu3="Tutorial";
				else
				$tu3=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=4");
				$row1 = mysql_fetch_array($result2);
				$tu4=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu4'");
				$row=mysql_fetch_array($result3);
				if($tu4=="Seminar")
					$tu4="Seminar";
				else if($tu4=="Debate")
					$tu4="Debate";
				else if($tu4==NULL)
					$tu4="Tutorial";
				else
				$tu4=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=5");
				$row1 = mysql_fetch_array($result2);
				$tu5=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu5'");
				$row=mysql_fetch_array($result3);
				if($tu5=="Seminar")
					$tu5="Seminar";
				else if($tu5=="Debate")
					$tu5="Debate";
				else if($tu5==NULL)
					$tu5="Tutorial";
				else
				$tu5=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=6");
				$row1 = mysql_fetch_array($result2);
				$tu6=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu6'");
				$row=mysql_fetch_array($result3);
				if($tu6=="Seminar")
					$tu6="Seminar";
				else if($tu6=="Debate")
					$tu6="Debate";
				else if($tu6==NULL)
					$tu6="Tutorial";
				else
				$tu6=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Tuesday' AND hour=7");
				$row1 = mysql_fetch_array($result2);
				$tu7=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$tu7'");
				$row=mysql_fetch_array($result3);
				if($tu7=="Seminar")
					$tu7="Seminar";
				else if($tu7=="Debate")
					$tu7="Debate";
				else if($tu7==NULL)
					$tu7="Tutorial";
				else
				$tu7=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=1");
				$row1 = mysql_fetch_array($result2);
				$w1=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w1'");
				$row=mysql_fetch_array($result3);
				if($w1=="Seminar")
					$w1="Seminar";
				else if($w1=="Debate")
					$w1="Debate";
				else if($w1==NULL)
					$w1="Tutorial";
				else
				$w1=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=2");
				$row1 = mysql_fetch_array($result2);
				$w2=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w2'");
				$row=mysql_fetch_array($result3);
				if($w2=="Seminar")
					$w2="Seminar";
				else if($w2=="Debate")
					$w2="Debate";
				else if($w2==NULL)
					$w2="Tutorial";
				else
				$w2=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=3");
				$row1 = mysql_fetch_array($result2);
				$w3=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w3'");
				$row=mysql_fetch_array($result3);
				if($w3=="Seminar")
					$w3="Seminar";
				else if($w3=="Debate")
					$w3="Debate";
				else if($w3==NULL)
					$w3="Tutorial";
				else
				$w3=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=4");
				$row1 = mysql_fetch_array($result2);
				$w4=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w4'");
				$row=mysql_fetch_array($result3);
				if($w4=="Seminar")
					$w4="Seminar";
				else if($w4=="Debate")
					$w4="Debate";
				else if($w4==NULL)
					$w4="Tutorial";
				else
				$w4=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=5");
				$row1 = mysql_fetch_array($result2);
				$w5=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w5'");
				$row=mysql_fetch_array($result3);
				if($w5=="Seminar")
					$w5="Seminar";
				else if($w5=="Debate")
					$w5="Debate";
				else if($w5==NULL)
					$w5="Tutorial";
				else
				$w5=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=6");
				$row1 = mysql_fetch_array($result2);
				$w6=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w6'");
				$row=mysql_fetch_array($result3);
				if($w6=="Seminar")
					$w6="Seminar";
				else if($w6=="Debate")
					$w6="Debate";
				else if($w6==NULL)
					$w6="Tutorial";
				else
				$w6=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Wednesday' AND hour=7");
				$row1 = mysql_fetch_array($result2);
				$w7=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$w7'");
				$row=mysql_fetch_array($result3);
				if($w7=="Seminar")
					$w7="Seminar";
				else if($w7=="Debate")
					$w7="Debate";
				else if($w7==NULL)
					$w7="Tutorial";
				else
				$w7=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=1");
				$row1 = mysql_fetch_array($result2);
				$th1=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th1'");
				$row=mysql_fetch_array($result3);
				if($th1=="Seminar")
					$th1="Seminar";
				else if($th1=="Debate")
					$th1="Debate";
				else if($th1==NULL)
					$th1="Tutorial";
				else
				$th1=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=2");
				$row1 = mysql_fetch_array($result2);
				$th2=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th2'");
				$row=mysql_fetch_array($result3);
				if($th2=="Seminar")
					$th2="Seminar";
				else if($th2=="Debate")
					$th2="Debate";
				else if($th2==NULL)
					$th2="Tutorial";
				else
				$th2=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=3");
				$row1 = mysql_fetch_array($result2);
				$th3=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th3'");
				$row=mysql_fetch_array($result3);
				if($th3=="Seminar")
					$th3="Seminar";
				else if($th3=="Debate")
					$th3="Debate";
				else if($th3==NULL)
					$th3="Tutorial";
				else
				$th3=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=4");
				$row1 = mysql_fetch_array($result2);
				$th4=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th4'");
				$row=mysql_fetch_array($result3);
				if($th4=="Seminar")
					$th4="Seminar";
				else if($th4=="Debate")
					$th4="Debate";
				else if($th4==NULL)
					$th4="Tutorial";
				else
				$th4=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=5");
				$row1 = mysql_fetch_array($result2);
				$th5=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th5'");
				$row=mysql_fetch_array($result3);
				if($th5=="Seminar")
					$th5="Seminar";
				else if($th5=="Debate")
					$th5="Debate";
				else if($th5==NULL)
					$th5="Tutorial";
				else
				$th5=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=6");
				$row1 = mysql_fetch_array($result2);
				$th6=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th6'");
				$row=mysql_fetch_array($result3);
				if($th6=="Seminar")
					$th6="Seminar";
				else if($th6=="Debate")
					$th6="Debate";
				else if($th6==NULL)
					$th6="Tutorial";
				else
				$th6=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Thursday' AND hour=7");
				$row1 = mysql_fetch_array($result2);
				$th7=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$th7'");
				$row=mysql_fetch_array($result3);
				if($th7=="Seminar")
					$th7="Seminar";
				else if($th7=="Debate")
					$th7="Debate";
				else if($th7==NULL)
					$th7="Tutorial";
				else
				$th7=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=1");
				$row1 = mysql_fetch_array($result2);
				$f1=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f1'");
				$row=mysql_fetch_array($result3);
				if($f1=="Seminar")
					$f1="Seminar";
				else if($f1=="Debate")
					$f1="Debate";
				else if($f1==NULL)
					$f1="Tutorial";
				else
				$f1=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=2");
				$row1 = mysql_fetch_array($result2);
				$f2=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f2'");
				$row=mysql_fetch_array($result3);
				if($f2=="Seminar")
					$f2="Seminar";
				else if($f2=="Debate")
					$f2="Debate";
				else if($f2==NULL)
					$f2="Tutorial";
				else
				$f2=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=3");
				$row1 = mysql_fetch_array($result2);
				$f3=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f3'");
				$row=mysql_fetch_array($result3);
				if($f3=="Seminar")
					$f3="Seminar";
				else if($f3=="Debate")
					$f3="Debate";
				else if($f3==NULL)
					$f3="Tutorial";
				else
				$f3=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=4");
				$row1 = mysql_fetch_array($result2);
				$f4=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f4'");
				$row=mysql_fetch_array($result3);
				if($f4=="Seminar")
					$f4="Seminar";
				else if($f4=="Debate")
					$f4="Debate";
				else if($f4==NULL)
					$f4="Tutorial";
				else
				$f4=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=5");
				$row1 = mysql_fetch_array($result2);
				$f5=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f5'");
				$row=mysql_fetch_array($result3);
				if($f5=="Seminar")
					$f5="Seminar";
				else if($f5=="Debate")
					$f5="Debate";
				else if($f5==NULL)
					$f5="Tutorial";
				else
				$f5=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=6");
				$row1 = mysql_fetch_array($result2);
				$f6=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f6'");
				$row=mysql_fetch_array($result3);
				if($f6=="Seminar")
					$f6="Seminar";
				else if($f6=="Debate")
					$f6="Debate";
				else if($f6==NULL)
					$f6="Tutorial";
				else
				$f6=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Friday' AND hour=7");
				$row1 = mysql_fetch_array($result2);
				$f7=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$f7'");
				$row=mysql_fetch_array($result3);
				if($f7=="Seminar")
					$f7="Seminar";
				else if($f7=="Debate")
					$f7="Debate";
				else if($f7==NULL)
					$f7="Tutorial";
				else
				$f7=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=1");
				$row1 = mysql_fetch_array($result2);
				$s1=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s1'");
				$row=mysql_fetch_array($result3);
				if($s1=="Seminar")
					$s1="Seminar";
				else if($s1=="Debate")
					$s1="Debate";
				else if($s1==NULL && $sem<6)
					$s1="Tutorial";
				else
				$s1=$row['name'];
				
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=2");
				$row1 = mysql_fetch_array($result2);
				$s2=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s2'");
				$row=mysql_fetch_array($result3);
				if($s2=="Seminar")
					$s2="Seminar";
				else if($s2=="Debate")
					$s2="Debate";
				else if($s2==NULL && $sem<6)
					$s2="Tutorial";
				else
				$s2=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=3");
				$row1 = mysql_fetch_array($result2);
				$s3=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s3'");
				$row=mysql_fetch_array($result3);
				if($s3=="Seminar")
					$s3="Seminar";
				else if($s3=="Debate")
					$s3="Debate";
				else if($s3==NULL && $sem<6)
					$s3="Tutorial";
				else
				$s3=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=4");
				$row1 = mysql_fetch_array($result2);
				$s4=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s4'");
				$row=mysql_fetch_array($result3);
				if($s4=="Seminar")
					$s4="Seminar";
				else if($s4=="Debate")
					$s4="Debate";
				else if($s4==NULL && $sem<6)
					$s4="Tutorial";
				else
				$s4=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=5");
				$row1 = mysql_fetch_array($result2);
				$s5=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s5'");
				$row=mysql_fetch_array($result3);
				if($s5=="Seminar")
					$s5="Seminar";
				else if($s5=="Debate")
					$s5="Debate";
				else if($s5==NULL && $sem<6)
					$s5="Tutorial";
				else
				$s5=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=6");
				$row1 = mysql_fetch_array($result2);
				$s6=$row1['subid'];
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s6'");
				$row=mysql_fetch_array($result3);
				if($s6=="Seminar")
					$s6="Seminar";
				else if($s6=="Debate")
					$s6="Debate";
				else if($s6==NULL && $sem<6)
					$s6="Tutorial";
				else
				$s6=$row['name'];
				
				$result2 = mysql_query("SELECT * FROM subhandle WHERE sem='$sem' AND dept='$dept' AND day='Saturday' AND hour=7");
				$row1 = mysql_fetch_array($result2);
				$s7=$row1['subid'];	
				$result3=mysql_query("SELECT * FROM subjects WHERE subid='$s7'");
				$row=mysql_fetch_array($result3);
				if($s7=="Seminar")
					$s7="Seminar";
				else if($s7=="Debate")
					$s7="Debate";
				else if($s7==NULL && $sem<6)
					$s7="Tutorial";
				else
				$s7=$row['name'];
							
			mysql_close($con);

?>	  
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="27%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="73%" valign="top"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div align="left"> </div>
      <div align="left"></div>
      <table width="517" border="0" cellpadding="1" cellspacing="1" bordercolor="#00CCFF" bgcolor="#00CCFF" frame="box">
        <tr bgcolor="#FFFFFF">
          <th height="26" colspan="8" scope="row" background="title.jpg">:: TIME TABLE :: </th>
          </tr>
        <tr bgcolor="#FFFFFF">
          <th width="80" height="43" scope="row"><div align="center" class="style1">
              <div align="left">DAY/Period</div>
          </div></th>
          <td width="55"><div align="center" class="style1"><strong>1st</strong></div></td>
          <td width="55"><div align="center" class="style1"><strong>2nd</strong></div></td>
          <td width="55"><div align="center" class="style1"><strong>3rd</strong></div></td>
          <td width="55"><div align="center" class="style1"><strong>4th</strong></div></td>
          <td width="55"><div align="center" class="style1"><strong>5th</strong></div></td>
          <td width="55"><div align="center" class="style1"><strong>6th</strong></div></td>
          <td width="55"><div align="center" class="style1"><strong>7th</strong></div></td>
        </tr>
        <tr bgcolor="#AEEFFF">
          <th height="41" scope="row"><div align="left"><span class="style1">Monday</span></div></th>
          <td class="box">
            <div align="center"><?php echo $m1; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $m2; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $m3; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $m4; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $m5; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $m6; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $m7; ?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <th height="38" scope="row"><div align="left"><span class="style1">Tuesday</span></div></th>
          <td class="box">
            <div align="center"><?php echo $tu1; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $tu2; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $tu3; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $tu4; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $tu5; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $tu6; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $tu7; ?></div></td>
        </tr>
        <tr bgcolor="#AEEFFF">
          <th height="41" scope="row"><div align="left"><span class="style1">Wednesday</span></div></th>
          <td class="box">
            <div align="center"><?php echo $w1; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $w2; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $w3; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $w4; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $w5; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $w6; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $w7; ?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <th height="41" scope="row"><div align="left"><span class="style1">Thursday</span></div></th>
          <td class="box">
            <div align="center"><?php echo $th1; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $th2; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $th3; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $th4; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $th5; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $th6; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $th7; ?></div></td>
        </tr>
        <tr bgcolor="#AEEFFF">
          <th height="39" scope="row"><div align="left"><span class="style1">Friday</span></div></th>
          <td class="box">
            <div align="center"><?php echo $f1; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $f2; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $f3; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $f4; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $f5; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $f6; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $f7; ?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <th height="38" scope="row"><div align="left"><span class="style1">Saturday</span></div></th>
          <td class="box">
            <div align="center"><?php echo $s1; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $s2; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $s3; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $s4; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $s5; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $s6; ?></div></td>
          <td class="box">
            <div align="center"><?php echo $s7; ?></div></td>
        </tr>
      </table>
       <p align="center">
        <input name="sendtype" type="hidden" id="sendtype">
      </p>
    </form></td>
  </tr>
</table>
</body>
</html>
