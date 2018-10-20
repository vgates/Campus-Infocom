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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.ff {
	color: #FFFFFF;
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
<style type="text/css">
<!--
.style8 {
	color: #000000;
	font-weight: bold;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style9 {color: #00FFFF}
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
.style11 {color: #0066FF}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="20%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="80%" valign="top">      <table width="597" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p align="center">
              <?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0099FF\">
<th class=\"style8\" colspan='5' background=\"title.jpg\">ATTENDANCE REPORT</th>
</tr>
<tr bgcolor=\"#0099FF\">
<th class=\"ff\">Subject Code</th>
<th class=\"ff\">Subject Name</th>
<th class=\"ff\">Total Hours</th>
<th class=\"ff\">Leave</th>
<th class=\"ff\">Regularity</th>
</tr>";
// create handle for new PDF document 
$pdf = pdf_new(); 

// open a file 
pdf_open_file($pdf, "C:\wamp\www\att_generate.pdf"); 

// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 

// Open few .TTF (true type font)  
// be sure that your font file contains enough character for your language 
 
pdf_set_parameter($pdf, "FontOutline", "Arial=C:\WINDOWS\Fonts\arial.ttf"); 

// get and use a font object 
$arial = pdf_findfont($pdf, "Arial", "host",1);
pdf_setfont($pdf, $arial, 10);
pdf_show_xy($pdf, "Attendance Report of ".$name, 30, 800); 
$size=750;
pdf_moveto($pdf, 30, 770); 
pdf_lineto($pdf, 395, 770); 
pdf_stroke($pdf); 
pdf_show_xy($pdf, "Subject Code", 40, $size); 
pdf_show_xy($pdf, "Subject Name", 130, $size); 
pdf_show_xy($pdf, "Total Hours", 205, $size); 
pdf_show_xy($pdf, "Leave", 265, $size); 
pdf_show_xy($pdf, "Regularity", 335, $size); 
//parallel
pdf_moveto($pdf, 30, 740); 
pdf_lineto($pdf, 395, 740); 
pdf_stroke($pdf); 
//parallel
if($sem!=1)
{
pdf_moveto($pdf, 30, 500); 
pdf_lineto($pdf, 395, 500); 
pdf_stroke($pdf); 
}
else
{
pdf_moveto($pdf, 30, 400); 
pdf_lineto($pdf, 395, 400); 
pdf_stroke($pdf); 
}
//vertical line
if($sem!=1){
pdf_moveto($pdf, 120, 770); 
pdf_lineto($pdf, 120, 500); 
pdf_stroke($pdf); }
else
{pdf_moveto($pdf, 120, 770); 
pdf_lineto($pdf, 120, 400); 
pdf_stroke($pdf); }
//vertical line
if($sem!=1){
pdf_moveto($pdf, 200, 770); 
pdf_lineto($pdf, 200, 500); 
pdf_stroke($pdf); }
else
{pdf_moveto($pdf, 200, 770); 
pdf_lineto($pdf, 200, 400); 
pdf_stroke($pdf); }

//vertical line
if($sem!=1){
pdf_moveto($pdf, 260, 770); 
pdf_lineto($pdf, 260, 500); 
pdf_stroke($pdf); }
else
{pdf_moveto($pdf, 260, 770); 
pdf_lineto($pdf, 260, 400); 
pdf_stroke($pdf); }



//vertical line
if($sem!=1){
pdf_moveto($pdf, 330, 770); 
pdf_lineto($pdf, 330, 500); 
pdf_stroke($pdf); }
else
{pdf_moveto($pdf, 330, 770); 
pdf_lineto($pdf, 330, 400); 
pdf_stroke($pdf); }
//vertical line
if($sem!=1){
pdf_moveto($pdf, 395, 770); 
pdf_lineto($pdf, 395, 500); 
pdf_stroke($pdf); 
}
else
{
pdf_moveto($pdf, 395, 770); 
pdf_lineto($pdf, 395, 400); 
pdf_stroke($pdf); }
//vertical line
if($sem!=1){
pdf_moveto($pdf, 30, 770); 
pdf_lineto($pdf, 30, 500); 
pdf_stroke($pdf); }
else
{
pdf_moveto($pdf, 30, 770); 
pdf_lineto($pdf, 30, 400); 
pdf_stroke($pdf); }



		$studid=$_COOKIE['user'];
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
		if($totalhours>0)
		{
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
				echo "<tr bgcolor=\"#BFDFFF\">";
 			echo "<td class=\"cell\">".$sub_identity."</td>";
			echo "<td class=\"cell\">".$sub_name."</td>";
			echo "<td class=\"cell\" align=\"center\">".$totalhours."</td>";
 			echo "<td class=\"cell\" align=\"center\">".$absent."</td>";
			echo "<td class=\"cell\" align=\"center\">".substr($regularity,0,5)."%"."</td>";
  			echo "</tr>";
			$motham_hour=$motham_hour+$totalhours;
			$motham_absent=$motham_absent+$absent;
		
		
			// print text 
			$size=$size-30;
			pdf_show_xy($pdf, $sub_identity, 50, $size); 
			pdf_show_xy($pdf, $sub_name, 130, $size);
			pdf_show_xy($pdf, $totalhours, 225, $size); 
			pdf_show_xy($pdf, $absent, 290, $size); 
			pdf_show_xy($pdf, substr($regularity,0,5), 355, $size); 
		}
		else
		{
			if($flag==0)
				echo "<tr>";
			else
				echo "<tr bgcolor=\"#0099FF\">";
 			echo "<td class=\"cell\">".$sub_identity."</td>";
			echo "<td class=\"cell\">".$sub_name."</td>";
			echo "<td class=\"cell\">-</td>";
 			echo "<td class=\"cell\">-</td>";
			echo "<td class=\"cell\">-</td>";
  			echo "</tr>";
		
// print text 
			$size=$size-30;
			pdf_show_xy($pdf, $sub_identity, 50, $size); 
			pdf_show_xy($pdf, $sub_name, 130, $size);
			pdf_show_xy($pdf, "-", 225, $size); 
			pdf_show_xy($pdf, "-", 290, $size); 
				pdf_show_xy($pdf, "-", 355, $size); 

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
 if($sem!=1)
	 pdf_show_xy($pdf, "Total Attendance = ".substr($motham,0,6)."%", 50, 470);
 else
	 pdf_show_xy($pdf, "Total Attendance = ".substr($motham,0,6)."%", 50, 370);
 
 // end page 
pdf_end_page($pdf); 

// close and save file 
pdf_close($pdf); 

mysql_close($con);
?>
            </p>
            <table width="64" border="0" align="center" bgcolor="#bdcafd">
              <tr>
                <td><div align="center" class="style8"><a href="att_generate.pdf" target="_blank" class="style9"><span class="style11">PRINT</span></a></div></td>
              </tr>
            </table>
            <p align="center">&nbsp;</p>
          </form></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
