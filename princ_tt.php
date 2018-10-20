<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./princ_trial.htm');
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
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.butstyle {	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	font-weight: bold;
	color: #00CCFF;
	background-color: #0000CC;
	width: 115px;
	cursor: hand;
}
.light1 {font-variant: small-caps;
	color: #00CCFF;
	font-weight:bold;
}
.light1 {font-variant: small-caps;
	color: #00CCFF;
	font-weight:bold;
}
.princprof2 {color: #0066FF}
.princprof3 {font-weight: bold}
body {
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<?php
function generate_list($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
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
//generating array of subjects
			if(!empty($_POST['dept'])){
			$con = mysql_connect("localhost","root","");
			if (!$con)
 			{
 			 die('Could not connect: ' . mysql_error());
  			}
			else
			{
			mysql_select_db("campusinfocom", $con);

			
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

			}}
?>	  
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="25%" height="175" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="75%" valign="top">
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <div align="left"></div>
        <table width="536" border="0">
          <tr>
            <th colspan="5" scope="row" background="title.jpg"><span class="princprof3">:: TIME TABLE :: </span></th>
          </tr>
          <tr>
            <th width="115" scope="row"><div align="right" class="princprof2 princprof3">Semester:</div></th>
            <td width="109"><span class="princprof2 princprof3">
              <select name="sem" class="box" id="select3"   onChange="return submitForm('sem')">
                <option value="0">select</option>
                <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
                <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
                <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
                <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
                <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
                <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
                <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
              </select>
            </span></td>
            <td width="103">&nbsp;</td>
            <td width="85"><span class="princprof2 princprof3">Department:</span></td>
            <td width="102"><div align="left" class="princprof2 princprof3">
                <select name="dept" class="box" id="select4"  onChange="return submitForm('dept')">
                  <option value="0">select</option>
                  <?php print generate_list($listdept,$dept); ?>
                </select>
              </div></td>
          </tr>
        </table>
          <div align="left"></div>
        <table width="536" border="0" bordercolor="#00CCFF" bgcolor="#00CCFF" frame="box">
          <tr bgcolor="#FFFFFF">
            <th width="80" height="43" scope="row"><div align="center" class="princprof2">DAY/Period</div></th>
            <td width="60"><div align="center" class="princprof2"><strong>1st</strong></div></td>
            <td width="58"><div align="center" class="princprof2"><strong>2nd</strong></div></td>
            <td width="55"><div align="center" class="princprof2"><strong>3rd</strong></div></td>
            <td width="55"><div align="center" class="princprof2"><strong>4th</strong></div></td>
            <td width="55"><div align="center" class="princprof2"><strong>5th</strong></div></td>
            <td width="62"><div align="center" class="princprof2"><strong>6th</strong></div></td>
            <td width="59"><div align="center" class="princprof2"><strong>7th</strong></div></td>
          </tr>
          <tr bgcolor="#AEEFFF">
            <th height="41" scope="row"><span class="princprof2">Monday</span></th>
            <td align="center" class="box"><?php echo $m1; ?></td>
            <td align="center" class="box"><?php echo $m2; ?></td>
            <td align="center" class="box"><?php echo $m3; ?></td>
            <td align="center" class="box"><?php echo $m4; ?></td>
            <td align="center" class="box"><?php echo $m5; ?></td>
            <td align="center" class="box"><?php echo $m6; ?></td>
            <td align="center" class="box"><?php echo $m7; ?></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <th height="38" scope="row"><span class="princprof2">Tuesday</span></th>
            <td align="center" class="box"><?php echo $tu1; ?></td>
            <td align="center" class="box"><?php echo $tu2; ?></td>
            <td align="center" class="box"><?php echo $tu3; ?></td>
            <td align="center" class="box"><?php echo $tu4; ?></td>
            <td align="center" class="box"><?php echo $tu5; ?></td>
            <td align="center" class="box"><?php echo $tu6; ?></td>
            <td align="center" class="box"><?php echo $tu7; ?></td>
          </tr>
          <tr bgcolor="#AEEFFF">
            <th height="41" scope="row"><span class="princprof2">Wednesday</span></th>
            <td align="center" class="box"><?php echo $w1; ?></td>
            <td align="center" class="box"><?php echo $w2; ?></td>
            <td align="center" class="box"><?php echo $w3; ?></td>
            <td align="center" class="box"><?php echo $w4; ?></td>
            <td align="center" class="box"><?php echo $w5; ?></td>
            <td align="center" class="box"><?php echo $w6; ?></td>
            <td align="center" class="box"><?php echo $w7; ?></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <th height="41" scope="row"><span class="princprof2">Thursday</span></th>
            <td align="center" class="box"><?php echo $th1; ?></td>
            <td align="center" class="box"><?php echo $th2; ?></td>
            <td align="center" class="box"><?php echo $th3; ?></td>
            <td align="center" class="box"><?php echo $th4; ?></td>
            <td align="center" class="box"><?php echo $th5; ?></td>
            <td align="center" class="box"><?php echo $th6; ?></td>
            <td align="center" class="box"><?php echo $th7; ?></td>
          </tr>
          <tr bgcolor="#AEEFFF">
            <th height="39" scope="row"><span class="princprof2">Friday</span></th>
            <td align="center" class="box"><?php echo $f1; ?></td>
            <td align="center" class="box"><?php echo $f2; ?></td>
            <td align="center" class="box"><?php echo $f3; ?></td>
            <td align="center" class="box"><?php echo $f4; ?></td>
            <td align="center" class="box"><?php echo $f5; ?></td>
            <td align="center" class="box"><?php echo $f6; ?></td>
            <td align="center" class="box"><?php echo $f7; ?></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <th height="38" scope="row"><span class="princprof2">Saturday</span></th>
            <td align="center" class="box"><?php echo $s1; ?></td>
            <td align="center" class="box"><?php echo $s2; ?></td>
            <td align="center" class="box"><?php echo $s3; ?></td>
            <td align="center" class="box"><?php echo $s4; ?></td>
            <td align="center" class="box"><?php echo $s5; ?></td>
            <td align="center" class="box"><?php echo $s6; ?></td>
            <td align="center" class="box"><?php echo $s7; ?></td>
          </tr>
        </table>
        <p align="center">
          <input name="sendtype" type="hidden" id="sendtype3">
        </p>
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
