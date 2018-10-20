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


$selectsem=$_POST['sem'];
$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];
if($sem==1)
$batch="S1-S2".$sem." ".$dept;
else
$batch="S".$sem." ".$dept;
$user=$_COOKIE['user'];
$resultw = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$roww = mysql_fetch_array($resultw);
		$photo=$roww['photo'];
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
<style type="text/css">
<!--
.style6 {font-size: 16px; font-weight: bold; color: #0033FF; }
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
	color: #0000FF;
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
.style9 {color: #0066FF}
-->
</style>
</head>

<body>
<?php
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
$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];		
$staffid=$_COOKIE['user'];
$sub=$_POST['subid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subhandle WHERE staffid='$staffid' AND sem='$sem' AND dept='$dept'");
while($row = mysql_fetch_array($result))
  {
  $i=$row['subid'];
  $query = mysql_query("SELECT * FROM subjects WHERE subid='$i'");
  $subname=mysql_fetch_array($query);
  $j=$subname['name'];
  $listsub[$i]=$j;
  }
mysql_close($con);
}
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="15%" height="213" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
    <p class="princprof3">&nbsp;</p></td>
    <td width="85%" valign="top"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <table width="200" border="0" align="center">
        <tr>
          <td nowrap><div align="right" class="style7">
              <div align="right">Select subject to generate attendance report:</div>
          </div></td>
          <td><span class="style6">
            <select name="subid" class="box" id="select2" onChange="return submitForm('subid')">
              <option value="0">select</option>
              <?php print generate_sub($listsub,$sub); ?>
            </select>
          </span></td>
        </tr>
      </table>
      <p align="center">
        <?php
  if(!empty($_POST['subid'])){  
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
  $subquery = mysql_query("SELECT * FROM subjects WHERE subid='$sub'");
  $subname=mysql_fetch_array($subquery);
  $subname=$subname['name'];
$student = mysql_query("SELECT * FROM student ORDER BY rollno");
echo '<center>';
$tot_query=mysql_query("SELECT * FROM attendance1 WHERE subid='$sub' AND staffid='$staffid'");
$tot=mysql_num_rows($tot_query);
echo "<p class=\"cell\"><b>Total Hours = </b>".$tot."</p>";
echo "<table border='0'>
<tr bgcolor=\"#0099FF\">
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Leave</th>
<th class=\"ff\">Regularity</th>
</tr>";
$flag=0; $p=0;
while($row = mysql_fetch_array($student))
  {
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{	$p++;
		$i=$row['rollno'];
		$studid=$row['studid'];
        $staffid=$_COOKIE['user'];
		$query=mysql_query("SELECT * FROM attendance1 WHERE subid='$sub' AND staffid='$staffid'");
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
			$regularity=(($present/$totalhours)*100);
		}
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#BFDFFF\">";
 		echo "<td class=\"cell\">".$row['rollno']."</td>";
		echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";
 		echo "<td class=\"cell\">".$absent."</td>";
		echo "<td class=\"cell\">".substr($regularity,0,5)."%"."</td>";
  		echo "</tr>";	
		
		////////////////////////////
		$stud_roll[$p]=$row['rollno'];	
		$stud_name[$p]=$row['name'];
		$stud_abs[$p]=$absent;
		$stud_reg[$p]=substr($regularity,0,5);
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
pdf_open_file($pdf, "C:\wamp\www\att_report.pdf"); 

// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 

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
pdf_show_xy($pdf, "Jyothi Engineering College", 225, 800); 
pdf_setfont($pdf, $arial, 9);
pdf_show_xy($pdf, "Attendance Report of ".$batch. "      Subject: ".$subname."       Total Hours: ".$totalhours, 155, 785); 

pdf_setfont($pdf, $candara, 9);
pdf_show_xy($pdf, "Rollno", 40, 765); 
pdf_show_xy($pdf, "Name", 85, 765); 
pdf_show_xy($pdf, "Leave(hrs)", 455, 765); 
pdf_show_xy($pdf, "Regularity(%)", 505, 765); 
$size=760;

//parallel-after jec
pdf_moveto($pdf, 30, 780); 
pdf_lineto($pdf, 570, 780); 
pdf_stroke($pdf); 
//parallel-after jec
pdf_moveto($pdf, 30, 795); 
pdf_lineto($pdf, 570, 795); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 760); 
pdf_lineto($pdf, 570, 760); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 30); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 80, 780); 
pdf_lineto($pdf, 80, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 450, 780); 
pdf_lineto($pdf, 450, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 570, 795); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 500, 780); 
pdf_lineto($pdf, 500, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 30, 795); 
pdf_lineto($pdf, 30, 30); 
pdf_stroke($pdf); 

pdf_setfont($pdf, $calibri, 9);

for($m=1;$m<=50;$m++){
$size=$size-14.5;
pdf_show_xy($pdf, $stud_roll[$m], 50, $size); 
pdf_show_xy($pdf, $stud_name[$m], 85, $size);
pdf_show_xy($pdf, $stud_abs[$m], 470, $size); 
pdf_show_xy($pdf, $stud_reg[$m], 515, $size); 
}


 // end page 
pdf_end_page($pdf); 
// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 
// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 
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
pdf_show_xy($pdf, "Jyothi Engineering College", 225, 800); 
pdf_setfont($pdf, $arial, 9);
pdf_show_xy($pdf, "Attendance Report of ".$batch. "      Subject: ".$subname."       Total Hours: ".$totalhours, 155, 785); 

pdf_setfont($pdf, $candara, 9);
pdf_show_xy($pdf, "Rollno", 40, 765); 
pdf_show_xy($pdf, "Name", 85, 765); 
pdf_show_xy($pdf, "Leave(hrs)", 455, 765); 
pdf_show_xy($pdf, "Regularity(%)", 505, 765); 
$size=760;

//parallel-after jec
pdf_moveto($pdf, 30, 780); 
pdf_lineto($pdf, 570, 780); 
pdf_stroke($pdf); 
//parallel-after jec
pdf_moveto($pdf, 30, 795); 
pdf_lineto($pdf, 570, 795); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 760); 
pdf_lineto($pdf, 570, 760); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 30); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 80, 780); 
pdf_lineto($pdf, 80, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 450, 780); 
pdf_lineto($pdf, 450, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 570, 795); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 500, 780); 
pdf_lineto($pdf, 500, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 30, 795); 
pdf_lineto($pdf, 30, 30); 
pdf_stroke($pdf); 
pdf_setfont($pdf, $calibri, 9);
$rx=$m+22;
for($n=$m;$n<=$p;$n++){
$size=$size-14.5;
pdf_show_xy($pdf, $stud_roll[$n], 50, $size); 
pdf_show_xy($pdf, $stud_name[$n], 85, $size);
pdf_show_xy($pdf, $stud_abs[$n], 470, $size); 
pdf_show_xy($pdf, $stud_reg[$n], 515, $size); 
}



 // end page 
pdf_end_page($pdf); 


// close and save file 
pdf_close($pdf); 
mysql_close($con);
}
?>
      </p>
      <?php
if(!empty($_POST['subid'])){  
echo "<table width=\"99\" border=\"0\" align=\"center\" bgcolor=\"#bdcafd\">
  <tr>
    <td bgcolor=\"#bdcafd\"><div align=\"center\" class=\"style8\"><a href=\"att_report.pdf\" target=\"_blank\" class=\"style9\">PRINT</a></div></td>
  </tr>
</table>";
}
?>
      <input name="sendtype" type="hidden" id="sendtype2">
    </form></td>
  </tr>
</table>
</body>
</html>
