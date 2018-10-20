<?php 
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
if(isset($_POST['Submit']))
{
$date1=$_POST['y1']."-".$_POST['m1']."-".$_POST['d1'];
$date2=$_POST['y2']."-".$_POST['m2']."-".$_POST['d2'];
$pdate1=$_POST['d1']."-".$_POST['m1']."-".$_POST['y1'];
$pdate2=$_POST['d2']."-".$_POST['m2']."-".$_POST['y2'];
}
include('./hod_trial.htm');
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
$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];
if($sem==1)
$batch="S1-S2".$sem." ".$dept;
else
$batch="S".$sem." ".$dept;

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
.style6 {font-size: 16px; font-weight: bold; color: #0033FF; }
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
.style7 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style8 {
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
.style9 {color: #00FFFF}
.light {	font-size: 16px;
	color: #0033FF;
}
.princprof3 {font-weight: bold}
.princprof4 {color: #0066FF; font-weight: bold; }
.style10 {color: #0033FF}
body {
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<?php

$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];		
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="21%" height="403" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="79%" valign="top">
      <table width="600" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="200" border="0" align="center">
              <tr>
                <td nowrap><div align="right" class="princprof4">
                    <div align="right">Generate report from
                        <input name="d1" type="text" class="box" id="d1" size="2" value="<?php if($date1==NULL) echo "DD"; else echo substr($date1,8,2); ?>">
                        <input name="m1" type="text" class="box" id="m1"  value="<?php if($date1==NULL) echo "MM"; else echo substr($date1,5,2); ?>" size="2">
                        <input name="y1" type="text" class="box" id="y1" value="<?php if($date1==NULL) echo "YYYY"; else echo substr($date1,0,4); ?>" size="4">
            to
            <input name="d2" type="text" class="box" id="d2" value="<?php if($date2==NULL) echo "DD"; else echo substr($date2,8,2); ?>" size=" 2">
            <input name="m2" type="text" class="box" id="m2" value="<?php if($date2==NULL) echo "MM"; else echo substr($date2,5,2); ?>" size="2">
            <input name="y2" type="text" class="box" id="y2" value="<?php if($date2==NULL) echo "YYYY"; else echo substr($date2,0,4); ?>" size="4">
                    </div>
                </div></td>
              </tr>
            </table>
            <p align="center">
              <input type="submit" name="Submit" value="GENERATE">
            </p>
            <p align="center">
              <?php
//if(isset($_POST['Submit'])){  
$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];
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
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Leave(in hours)</th>
<th class=\"ff\">Regularity</th>
</tr>";
$flag=0; $p=0;
while($row = mysql_fetch_array($student))
  {
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{	$p++;
		$i=$row['rollno'];
		$studid=$row['studid'];
		
		$subquery = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
		$grand_a=0; $grand_p=0; $grand_th=0;
 		 while($subname=mysql_fetch_array($subquery))
		 {
 				$sub=$subname['subid'];
		  		$staff=mysql_query("SELECT * FROM subhandle WHERE dept='$dept' AND sem='$sem' AND subid='$sub'");
  				$staffid=mysql_fetch_array($staff);
		  		$staffid=$staffid['staffid'];
	        
				$query=mysql_query("SELECT * FROM attendance1 WHERE subid='$sub' AND staffid='$staffid' AND date between '$date1' and '$date2'");
       			 $totalhours=mysql_num_rows($query);
				$absent=0;
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
					
				
		$grand_a=$grand_a+$absent;
		$grand_p=$grand_p+$present;
		$grand_th=$grand_th+$totalhours;
		$regularity=(($grand_p/$grand_th)*100);
		}}
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<td class=\"cell\">".$row['rollno']."</td>";
		echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";
 		echo "<td class=\"cell\">".$grand_a."</td>";
		echo "<td class=\"cell\">".substr($regularity,0,5)."%"."</td>";
  		echo "</tr>";	
		
		////////////////////////////
		$stud_uroll[$p]=$row['urollno'];
		$stud_roll[$p]=$row['rollno'];	
		$stud_name[$p]=$row['name'];
		$stud_abs[$p]=$grand_a;
		$stud_reg[$p]=substr($regularity,0,5)."%";
		///////////////////////////	
	
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
		
	}
  }
  echo "</table>";
 echo '</center>';
 // create handle for new PDF document 
$pdf = pdf_new(); 

// open a file 
pdf_open_file($pdf, "C:\wamp\www\m_att_report.pdf"); 

// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

$fontdir = "C:\wamp\www\Fonts"; 

	// Open few .TTF (true type font)  
	// be sure that your font file contains enough character for your language 
 
	pdf_set_parameter($pdf, "FontOutline", "Times=C:\wamp\www\Fonts\Times.ttf"); 
	pdf_set_parameter($pdf, "FontOutline", "Arial=C:\wamp\www\Fonts\Arial.ttf");
	pdf_set_parameter($pdf, "FontOutline", "Candara=C:\wamp\www\Fonts\CANDARA.TTF");
	pdf_set_parameter($pdf, "FontOutline", "Calibri=C:\wamp\www\Fonts\CALIBRI.TTF");
	// get and use a font object 
	$times = pdf_findfont($pdf, "Times", "host",1);
	$arial = pdf_findfont($pdf, "Arial", "host",1);
	$candara = pdf_findfont($pdf, "Candara", "host",1);
	$calibri = pdf_findfont($pdf, "Calibri", "host",1);
	
	pdf_setfont($pdf, $times, 20);
pdf_show_xy($pdf, "Jyothi Engineering College", 200, 800);

//line
	pdf_moveto($pdf, 30, 792); 
	pdf_lineto($pdf,570, 792); 
	pdf_stroke($pdf); 
	//subheading
	pdf_setfont($pdf, $arial, 10);
pdf_show_xy($pdf, "Attendance Report of ".$batch." from ".$pdate1." to ".$pdate2, 165, 780); 
	//line
	pdf_moveto($pdf, 30, 775); 
	pdf_lineto($pdf,570, 775); 
	pdf_stroke($pdf); 
	//fields..
	pdf_setfont($pdf, $candara, 9);
	pdf_show_xy($pdf, "University Reg No", 35, 763);
	pdf_show_xy($pdf, "Roll No", 110, 763);
	//vertical line
	pdf_moveto($pdf, 145, 775); 
	pdf_lineto($pdf, 145, 45); 
	pdf_stroke($pdf);
	//field
	pdf_show_xy($pdf, "Name", 150, 763);
	//vertical line
	pdf_moveto($pdf, 105, 775); 
	pdf_lineto($pdf, 105, 45); 
	pdf_stroke($pdf);
	//field
	pdf_show_xy($pdf, "Leave(hrs)", 480, 763);
	//vertical line
	pdf_moveto($pdf, 525, 775); 
	pdf_lineto($pdf, 525, 45); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 475, 775); 
	pdf_lineto($pdf, 475, 45); 
	pdf_stroke($pdf);
	pdf_show_xy($pdf, "Regularity", 530, 763);
	
	//line
	pdf_moveto($pdf, 30, 758); 
	pdf_lineto($pdf,570, 758); 
	pdf_stroke($pdf); 
	//line
	pdf_moveto($pdf, 30, 45); 
	pdf_lineto($pdf,570, 45); 
	pdf_stroke($pdf); 
	
	
	//rank list
	

// get and use a font object 

pdf_setfont($pdf, $calibri, 9);
$size=760;
 



for($m=1;$m<=50;$m++){
$size=$size-14;
pdf_show_xy($pdf, $stud_uroll[$m], 35, $size); 
pdf_show_xy($pdf, $stud_roll[$m], 115, $size); 
pdf_show_xy($pdf, $stud_name[$m], 150, $size);
pdf_show_xy($pdf, $stud_abs[$m], 490, $size); 
pdf_show_xy($pdf, $stud_reg[$m], 535, $size); 
}


 // end page 
pdf_end_page($pdf); 
// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 
// path of your TTF font directory 
$fontdir = "C:\wamp\www\Fonts"; 

	// Open few .TTF (true type font)  
	// be sure that your font file contains enough character for your language 
 
	pdf_set_parameter($pdf, "FontOutline", "Times=C:\wamp\www\Fonts\Times.ttf"); 
	pdf_set_parameter($pdf, "FontOutline", "Arial=C:\wamp\www\Fonts\Arial.ttf");
	pdf_set_parameter($pdf, "FontOutline", "Candara=C:\wamp\www\Fonts\CANDARA.TTF");
	pdf_set_parameter($pdf, "FontOutline", "Calibri=C:\wamp\www\Fonts\CALIBRI.TTF");
	// get and use a font object 
	$times = pdf_findfont($pdf, "Times", "host",1);
	$arial = pdf_findfont($pdf, "Arial", "host",1);
	$candara = pdf_findfont($pdf, "Candara", "host",1);
	$calibri = pdf_findfont($pdf, "Calibri", "host",1);
	
	pdf_setfont($pdf, $times, 20);
pdf_show_xy($pdf, "Jyothi Engineering College", 200, 800);

//line
	pdf_moveto($pdf, 30, 792); 
	pdf_lineto($pdf,570, 792); 
	pdf_stroke($pdf); 
	//subheading
	pdf_setfont($pdf, $arial, 10);
pdf_show_xy($pdf, "Attendance Report of ".$batch." from ".$pdate1." to ".$pdate2, 165, 780); 
	//line
	pdf_moveto($pdf, 30, 775); 
	pdf_lineto($pdf,570, 775); 
	pdf_stroke($pdf); 
	//fields..
	pdf_setfont($pdf, $candara, 9);
	pdf_show_xy($pdf, "University Reg No", 35, 763);
	pdf_show_xy($pdf, "Roll No", 110, 763);
	//vertical line
	pdf_moveto($pdf, 145, 775); 
	pdf_lineto($pdf, 145, 45); 
	pdf_stroke($pdf);
	//field
	pdf_show_xy($pdf, "Name", 150, 763);
	//vertical line
	pdf_moveto($pdf, 105, 775); 
	pdf_lineto($pdf, 105, 45); 
	pdf_stroke($pdf);
	//field
	pdf_show_xy($pdf, "Leave(hrs)", 480, 763);
	//vertical line
	pdf_moveto($pdf, 525, 775); 
	pdf_lineto($pdf, 525, 45); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 475, 775); 
	pdf_lineto($pdf, 475, 45); 
	pdf_stroke($pdf);
	pdf_show_xy($pdf, "Regularity", 530, 763);
	
	//line
	pdf_moveto($pdf, 30, 758); 
	pdf_lineto($pdf,570, 758); 
	pdf_stroke($pdf); 
	//line
	pdf_moveto($pdf, 30, 45); 
	pdf_lineto($pdf,570, 45); 
	pdf_stroke($pdf); 
	
	
	//rank list
	

// get and use a font object 

pdf_setfont($pdf, $calibri, 9);
$size=760;

$rx=$m+22;
for($n=$m;$n<=$rx;$n++){
$size=$size-14;
pdf_show_xy($pdf, $stud_uroll[$n], 35, $size); 
pdf_show_xy($pdf, $stud_roll[$n], 115, $size); 
pdf_show_xy($pdf, $stud_name[$n], 150, $size);
pdf_show_xy($pdf, $stud_abs[$n], 490, $size); 
pdf_show_xy($pdf, $stud_reg[$n], 535, $size); 
}


 // end page 
pdf_end_page($pdf); 

// close and save file 
pdf_close($pdf); 
mysql_close($con);
//}
?>
            </p>
            <table width="99" border="0" align="center" bgcolor="#000099">
              <tr>
                <td bgcolor="#0000CC"><div align="center" class="style8"><a href="m_att_report.pdf" target="_blank" class="style9">PRINT</a></div></td>
              </tr>
            </table>
            <p align="center">
              <input name="sendtype" type="hidden" id="sendtype">
          </p>
            </form></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
