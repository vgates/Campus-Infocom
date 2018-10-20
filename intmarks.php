<?php 
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
.attlist2 {color: #0066FF}
.attlist3 {color: #0066FF; font-weight: bold; }
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
.style9 {
	color: #00CCFF;
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
.princprof3 {font-weight: bold}
.studprof {	color: #0033FF;
	font-weight: bold;
}
.studprof2 {color: #0033FF}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="16%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="84%" valign="top">    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <p align="center">
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
<tr>
<th class=\"style10\" colspan='8' background='title.jpg'>:: INTERNAL MARKS ::</th>
</tr>
<tr bgcolor=\"#0099FF\">
<th class=\"ff\">Subject Code</th>
<th class=\"ff\">Subject Name</th>
<th class=\"ff\">Sessional1</th>
<th class=\"ff\">Sessional2</th>
<th class=\"ff\">Assignment1</th>
<th class=\"ff\">Assignment2</th>
<th class=\"ff\">Regularity</th>
<th class=\"ff\">Normalized</th>
</tr>";



// create handle for new PDF document 
$pdf = pdf_new(); 

// open a file 
pdf_open_file($pdf, "C:\wamp\www\intmarks.pdf"); 

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
pdf_show_xy($pdf, "Internal Marks of ".$name, 240, 800); 
$size=750;
pdf_moveto($pdf, 30, 770); 
pdf_lineto($pdf, 575, 770); 
pdf_stroke($pdf); 
pdf_show_xy($pdf, "Subject Code", 40, $size); 
pdf_show_xy($pdf, "Subject Name", 130, $size); 
pdf_show_xy($pdf, "Sessional1", 205, $size); 
pdf_show_xy($pdf, "Sessional2", 265, $size); 
pdf_show_xy($pdf, "Assignment1", 335, $size); 
pdf_show_xy($pdf, "Assignment2", 400, $size); 
pdf_show_xy($pdf, "Regularity", 468, $size); 
pdf_show_xy($pdf, "Normalized", 520, $size); 
//parallel
pdf_moveto($pdf, 30, 740); 
pdf_lineto($pdf, 575, 740); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 500); 
pdf_lineto($pdf, 575, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 120, 770); 
pdf_lineto($pdf, 120, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 200, 770); 
pdf_lineto($pdf, 200, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 575, 770); 
pdf_lineto($pdf, 575, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 260, 770); 
pdf_lineto($pdf, 260, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 465, 770); 
pdf_lineto($pdf, 465, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 515, 770); 
pdf_lineto($pdf, 515, 500); 
pdf_stroke($pdf);
//vertical line
pdf_moveto($pdf, 330, 770); 
pdf_lineto($pdf, 330, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 395, 770); 
pdf_lineto($pdf, 395, 500); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 30, 770); 
pdf_lineto($pdf, 30, 500); 
pdf_stroke($pdf); 



		$studid=$_COOKIE['user']; 
		
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
			echo "<tr bgcolor=\"#BFDFFF\">";
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
		// print text 
		$size=$size-30;
pdf_show_xy($pdf, $sub_identity, 50, $size); 
pdf_show_xy($pdf, $sub_name, 130, $size);
pdf_show_xy($pdf, $mark['ses1'], 225, $size); 
pdf_show_xy($pdf, $mark['ses2'], 290, $size); 
pdf_show_xy($pdf, $mark['ass1'], 355, $size); 
pdf_show_xy($pdf, $mark['ass2'], 425, $size); 
pdf_show_xy($pdf, $regm, 485, $size); 
pdf_show_xy($pdf, $mark['normalized'], 520, $size); 


		}	
	
  echo "</table>";
 echo '</center>';
 // end page 
pdf_end_page($pdf); 

// close and save file 
pdf_close($pdf); 

mysql_close($con);
?>
      </p>
      <table width="76" border="0" align="center" bgcolor="#bdcafd">
        <tr>
          <td><div align="center" class="style9"><a href="intmarks.pdf" title="Check if all data r correct" target="_blank" class="attlist3">PRINT</a></div></td>
        </tr>
      </table>
      <div align="center"></div>
      <p align="center">&nbsp;</p>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
