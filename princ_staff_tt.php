<?php
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
if($user=="administrator")
		include('./trial.htm');
	//principal
	else if($user=="principal")
		include('./princ_trial.htm');
else if(substr($user,0,3)=="jec")
	{	
		$query=mysql_query("SELECT * FROM department WHERE hod='$user'");
		$row = mysql_fetch_array($query);
		if($row)
			include('./hod_trial.htm');
	}



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
.style1 {color: #0066FF}
.light {
	font-variant: small-caps;
	color: #00CCFF;
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
}
.light {font-variant: small-caps;
	color: #00CCFF;
}
.butstyle {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	font-weight: bold;
	color: #0033FF;
	background-color: #67C4FF;
	width: 115px;
	cursor: hand;
}.light1 {font-variant: small-caps;
	color: #000000;
	font-weight:bold;
}
.light1 {font-variant: small-caps;
	color: #000000;
	font-weight:bold;
}
.princprof2 {color: #0066FF}
.princprof3 {font-weight: bold}
.princprof4 {color: #0066FF; font-weight: bold; }
-->
</style>
</head>

<body>
<?php
$staffid=$_COOKIE['staffid'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$result = mysql_query("SELECT * FROM staff WHERE staffid='$staffid'");

			while($row = mysql_fetch_array($result))
  			{
  				$name=$row['name'];  				
					$photot=$row['photo'];
					$srct="upload/".$photot;
 			}
  			}
?>
<?php
$staffid=$_COOKIE['staffid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
//retrieving details from timetable
$result2 = mysql_query("SELECT * FROM subhandle WHERE staffid='$staffid'");
while($row = mysql_fetch_array($result2))
{
  		$day=$row['day'];
		$hour=$row['hour'];
		if($day=="Monday" && $hour==1)
		{
			$sub_m1=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m1'");
			$sub=mysql_fetch_array($query);
			$sub_m1=$sub['name'];
			$batch_m1="S".$row['sem'].$row['dept'];
		} 
		if($day=="Monday" && $hour==2)
		{
			$sub_m2=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m2'");
			$sub=mysql_fetch_array($query);
			$sub_m2=$sub['name'];
			$batch_m2="S".$row['sem'].$row['dept'];
		}
		if($day=="Monday" && $hour==3)
		{
			$sub_m3=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m3'");
			$sub=mysql_fetch_array($query);
			$sub_m3=$sub['name'];
			$batch_m3="S".$row['sem'].$row['dept'];
		}
		if($day=="Monday" && $hour==4)
		{
			$sub_m4=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m4'");
			$sub=mysql_fetch_array($query);
			$sub_m4=$sub['name'];
			$batch_m4="S".$row['sem'].$row['dept'];
		}
		if($day=="Monday" && $hour==5)
		{
			$sub_m5=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m5'");
			$sub=mysql_fetch_array($query);
			$sub_m5=$sub['name'];
			$batch_m5="S".$row['sem'].$row['dept'];
		}
		if($day=="Monday" && $hour==6)
		{
			$sub_m6=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m6'");
			$sub=mysql_fetch_array($query);
			$sub_m6=$sub['name'];
			$batch_m6="S".$row['sem'].$row['dept'];
		}
		if($day=="Monday" && $hour==7)
		{
			$sub_m7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_m7'");
			$sub=mysql_fetch_array($query);
			$sub_m7=$sub['name'];
			$batch_m7="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==1)
		{
			$sub_tu1=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu1'");
			$sub=mysql_fetch_array($query);
			$sub_tu1=$sub['name'];
			$batch_tu1="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==2)
		{
			$sub_tu2=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu2'");
			$sub=mysql_fetch_array($query);
			$sub_tu2=$sub['name'];
			$batch_tu2="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==3)
		{
			$sub_tu3=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu3'");
			$sub=mysql_fetch_array($query);
			$sub_tu3=$sub['name'];
			$batch_tu3="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==4)
		{
			$sub_tu4=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu4'");
			$sub=mysql_fetch_array($query);
			$sub_tu4=$sub['name'];
			$batch_tu1="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==5)
		{
			$sub_tu5=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu5'");
			$sub=mysql_fetch_array($query);
			$sub_tu5=$sub['name'];
			$batch_tu5="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==6)
		{
			$sub_tu6=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu6'");
			$sub=mysql_fetch_array($query);
			$sub_tu6=$sub['name'];
			$batch_tu6="S".$row['sem'].$row['dept'];
		}
		if($day=="Tuesday" && $hour==7)
		{
			$sub_tu7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_tu7'");
			$sub=mysql_fetch_array($query);
			$sub_tu7=$sub['name'];
			$batch_tu7="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==1)
		{
			$sub_w1=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w1'");
			$sub=mysql_fetch_array($query);
			$sub_w1=$sub['name'];
			$batch_w1="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==2)
		{
			$sub_w2=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w2'");
			$sub=mysql_fetch_array($query);
			$sub_w2=$sub['name'];
			$batch_w2="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==3)
		{
			$sub_w3=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w3'");
			$sub=mysql_fetch_array($query);
			$sub_w3=$sub['name'];
			$batch_w3="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==4)
		{
			$sub_w4=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w4'");
			$sub=mysql_fetch_array($query);
			$sub_w4=$sub['name'];
			$batch_w4="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==5)
		{
			$sub_w5=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w5'");
			$sub=mysql_fetch_array($query);
			$sub_w5=$sub['name'];
			$batch_w5="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==6)
		{
			$sub_w6=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w6'");
			$sub=mysql_fetch_array($query);
			$sub_w6=$sub['name'];
			$batch_w6="S".$row['sem'].$row['dept'];
		}
		if($day=="Wednesday" && $hour==7)
		{
			$sub_w7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_w7'");
			$sub=mysql_fetch_array($query);
			$sub_w7=$sub['name'];
			$batch_w7="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==1)
		{
			$sub_th1=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th1'");
			$sub=mysql_fetch_array($query);
			$sub_th1=$sub['name'];
			$batch_th1="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==2)
		{
			$sub_th2=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th2'");
			$sub=mysql_fetch_array($query);
			$sub_th2=$sub['name'];
			$batch_th2="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==3)
		{
			$sub_th3=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th3'");
			$sub=mysql_fetch_array($query);
			$sub_th3=$sub['name'];
			$batch_th3="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==4)
		{
			$sub_th4=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th4'");
			$sub=mysql_fetch_array($query);
			$sub_th4=$sub['name'];
			$batch_th4="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==5)
		{
			$sub_th5=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th5'");
			$sub=mysql_fetch_array($query);
			$sub_th5=$sub['name'];
			$batch_th5="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==6)
		{
			$sub_th6=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th6'");
			$sub=mysql_fetch_array($query);
			$sub_th6=$sub['name'];
			$batch_th6="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==7)
		{
			$sub_th7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th7'");
			$sub=mysql_fetch_array($query);
			$sub_th7=$sub['name'];
			$batch_th7="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==7)
		{
			$sub_th7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th7'");
			$sub=mysql_fetch_array($query);
			$sub_th7=$sub['name'];
			$batch_th7="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==7)
		{
			$sub_th7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th7'");
			$sub=mysql_fetch_array($query);
			$sub_th7=$sub['name'];
			$batch_th7="S".$row['sem'].$row['dept'];
		}
		if($day=="Thursday" && $hour==7)
		{
			$sub_th7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_th7'");
			$sub=mysql_fetch_array($query);
			$sub_th7=$sub['name'];
			$batch_th7="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==1)
		{
			$sub_f1=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f1'");
			$sub=mysql_fetch_array($query);
			$sub_f1=$sub['name'];
			$batch_="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==2)
		{
			$sub_f2=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f2'");
			$sub=mysql_fetch_array($query);
			$sub_f2=$sub['name'];
			$batch_f2="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==3)
		{
			$sub_f3=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f3'");
			$sub=mysql_fetch_array($query);
			$sub_f3=$sub['name'];
			$batch_f3="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==4)
		{
			$sub_f4=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f4'");
			$sub=mysql_fetch_array($query);
			$sub_f4=$sub['name'];
			$batch_f4="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==5)
		{
			$sub_f5=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f5'");
			$sub=mysql_fetch_array($query);
			$sub_f5=$sub['name'];
			$batch_f5="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==6)
		{
			$sub_f6=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f6'");
			$sub=mysql_fetch_array($query);
			$sub_f6=$sub['name'];
			$batch_f6="S".$row['sem'].$row['dept'];
		}
		if($day=="Friday" && $hour==7)
		{
			$sub_f7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_f7'");
			$sub=mysql_fetch_array($query);
			$sub_f7=$sub['name'];
			$batch_f7="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==1)
		{
			$sub_s1=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s1'");
			$sub=mysql_fetch_array($query);
			$sub_s1=$sub['name'];
			$batch_s1="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==2)
		{
			$sub_s2=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s2'");
			$sub=mysql_fetch_array($query);
			$sub_s2=$sub['name'];
			$batch_s2="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==3)
		{
			$sub_s3=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s3'");
			$sub=mysql_fetch_array($query);
			$sub_s3=$sub['name'];
			$batch_s3="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==4)
		{
			$sub_s4=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s4'");
			$sub=mysql_fetch_array($query);
			$sub_s4=$sub['name'];
			$batch_s4="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==5)
		{
			$sub_s5=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s5'");
			$sub=mysql_fetch_array($query);
			$sub_s5=$sub['name'];
			$batch_s5="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==6)
		{
			$sub_s6=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s6'");
			$sub=mysql_fetch_array($query);
			$sub_s6=$sub['name'];
			$batch_s6="S".$row['sem'].$row['dept'];
		}
		if($day=="Saturday" && $hour==7)
		{
			$sub_s7=$row['subid'];
			$query=mysql_query("SELECT * from subjects WHERE subid='$sub_s7'");
			$sub=mysql_fetch_array($query);
			$sub_s7=$sub['name'];
			$batch_s7="S".$row['sem'].$row['dept'];
		}
		
}
mysql_close($con);
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
?>	  
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="21%" height="175" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="79%" valign="top">
      <table width="598" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><table width="598" border="0" align="center" bordercolor="#00CCFF" bgcolor="#00CCFF" frame="box">
            <tr bgcolor="#FFFFFF">
              <th height="27" colspan="8" scope="row" background="title.jpg">:: CLASS SCHEDULE :: </th>
              </tr>
            <tr bgcolor="#FFFFFF">
              <th width="80" height="43" scope="row"><div align="center" class="princprof2">DAY/Period</div></th>
              <td width="55"><div align="center" class="princprof2"><strong>1st</strong></div></td>
              <td width="55"><div align="center" class="princprof2"><strong>2nd</strong></div></td>
              <td width="55"><div align="center" class="princprof2"><strong>3rd</strong></div></td>
              <td width="55"><div align="center" class="princprof2"><strong>4th</strong></div></td>
              <td width="55"><div align="center" class="princprof2"><strong>5th</strong></div></td>
              <td width="55"><div align="center" class="princprof2"><strong>6th</strong></div></td>
              <td width="55"><div align="center" class="princprof2"><strong>7th</strong></div></td>
            </tr>
            <tr bgcolor="#AEEFFF">
              <th height="41" scope="row"><span class="princprof2">Monday</span></th>
              <td class="box">
                <div align="center"><?php echo $sub_m1; echo"<br>"; echo $batch_m1;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_m2; echo"<br>"; echo $batch_m2;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_m3; echo"<br>"; echo $batch_m3;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_m4; echo"<br>"; echo $batch_m4;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_m5; echo"<br>"; echo $batch_m5;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_m6; echo"<br>"; echo $batch_m6;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_m7; echo"<br>"; echo $batch_m7;?></div></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <th height="38" scope="row"><span class="princprof2">Tuesday</span></th>
              <td class="box">
                <div align="center"><?php echo $sub_tu1; echo"<br>"; echo $batch_tu1;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_tu2; echo"<br>"; echo $batch_tu2;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_tu3; echo"<br>"; echo $batch_tu3; ?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_tu4; echo"<br>"; echo $batch_tu4;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_tu5; echo"<br>"; echo $batch_tu5;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_tu6; echo"<br>"; echo $batch_tu6;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_tu7; echo"<br>"; echo $batch_tu7;?></div></td>
            </tr>
            <tr bgcolor="#AEEFFF">
              <th height="41" scope="row"><span class="princprof2">Wednesday</span></th>
              <td class="box">
                <div align="center"><?php echo $sub_w1; echo"<br>"; echo $batch_w1;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_w2; echo"<br>"; echo $batch_w2;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_w3; echo"<br>"; echo $batch_w3;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_w4; echo"<br>"; echo $batch_w4;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_w5; echo"<br>"; echo $batch_w5;?></div></td>
              <td bgcolor="#AEEFFF" class="box">
                <div align="center"><?php echo $sub_w6; echo"<br>"; echo $batch_w6;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_w7; echo"<br>"; echo $batch_w7;?></div></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <th height="41" scope="row"><span class="princprof2">Thursday</span></th>
              <td class="box">
                <div align="center"><?php echo $sub_th1; echo"<br>"; echo $batch_th1;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_th2; echo"<br>"; echo $batch_th2;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_th3; echo"<br>"; echo $batch_th3;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_th4; echo"<br>"; echo $batch_th4;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_th5; echo"<br>"; echo $batch_th5;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_th6; echo"<br>"; echo $batch_th6;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_th7; echo"<br>"; echo $batch_th7;?></div></td>
            </tr>
            <tr bgcolor="#AEEFFF">
              <th height="39" scope="row"><span class="princprof2">Friday</span></th>
              <td class="box">
                <div align="center"><?php echo $sub_f1; echo"<br>"; echo $batch_f1;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_f2; echo"<br>"; echo $batch_f2;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_f3; echo"<br>"; echo $batch_f3;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_f4; echo"<br>"; echo $batch_f4;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_f5; echo"<br>"; echo $batch_f5;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_f6; echo"<br>"; echo $batch_f6;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_f7; echo"<br>"; echo $batch_f7;?></div></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <th height="38" scope="row"><span class="princprof2">Saturday</span></th>
              <td class="box">
                <div align="center"><?php echo $sub_s1; echo"<br>"; echo $batch_s1;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_s2; echo"<br>"; echo $batch_s2;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_s3; echo"<br>"; echo $batch_s3;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_s4; echo"<br>"; echo $batch_s4;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_s5; echo"<br>"; echo $batch_s5;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_s6; echo"<br>"; echo $batch_s6;?></div></td>
              <td class="box">
                <div align="center"><?php echo $sub_s7; echo"<br>"; echo $batch_s7;?></div></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="141" border="0">
        <tr>
          <td><img src="<?php echo $srct; ?>" alt="" width="137" height="169" border="1"></td>
        </tr>
        <tr>
          <td><div align="center"><span class="light1"><?php echo $name; ?></span> </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
            <form name="form3" method="post" action="princ_staff_profile.php">
              <input name="Submit22" type="submit" class="butstyle" value="Profile">
            </form>
              </div></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
