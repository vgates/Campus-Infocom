<?php 
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
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style9 {font-size: 16px}
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
.style11 {
	color: #00CCFF;
	font-weight: bold;
}
.princprof3 {font-weight: bold}
.princprof4 {color: #0066FF; font-weight: bold; }
.style12 {color: #00FFFF}
body {
	margin-bottom: 0px;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>

</head>

<body>
<?php

$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];	
$sub=$_POST['sub'];	
if($sem==1)
$batch="S1-S2".$sem." ".$dept;
else
$batch="S".$sem." ".$dept;

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

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subjects WHERE sem='$sem' AND dept='$dept'");
while($row = mysql_fetch_array($result))
  {
  $i=$row['subid'];
  $j=$row['name'];
  $listsub[$i]=$j;
  }
mysql_close($con);
}


?>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td width="18%" height="403" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="82%" valign="top">
      <table width="770" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <table width="508" border="0" align="center" class="box">
              <tr>
                <td width="158" nowrap class="princprof4"><div align="right"><span class="style9">Internal Marks of : </span></div></td>
                <td width="138" nowrap class="princprof4"><span class="style9">
                  <?php if($sem==1) echo "S1-S2 ".$dept; else echo "S".$sem." ".$dept; ?>
                </span></td>
                <td width="93" class="princprof4"><div align="right"><span class="style9">Subject:</span></div></td>
                <td width="101"><span class="style9">
                  <select name="sub" class="princprof4" id="select"  onChange="return submitForm('sub')">
                    <option value="0">select</option>
                    <?php print generate_sub($listsub,$sub); ?>
                  </select>
                </span></td>
              </tr>
            </table>
            <p align="center">
              <?php
//$x=number;
if(!empty($_POST['sub'])){
$subid=$_POST['sub'];
//setcookie("subid",$_POST['subid']);
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$student = mysql_query("SELECT * FROM student ORDER BY rollno");
$staff=mysql_query("SELECT * FROM subhandle WHERE subid='$subid'");
$staff_row=mysql_fetch_array($staff);
$staffid=$staff_row['staffid'];
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Sessional1</th>
<th class=\"ff\">Sessional2</th>
<th class=\"ff\">Assignment1</th>
<th class=\"ff\">Assignment2</th>
<th class=\"ff\">Regularity</th>
<th class=\"ff\">RAW</th>
<th class=\"ff\">Normalized</th>
</tr>";


$flag=0; $tm=0; $p=0; $above60=0;
while($row = mysql_fetch_array($student))
  {
  
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{$p++;
		$i=$row['rollno'];
		$k=$row['studid'];
		
		////////////////////
		$stud_id[$p]=$k;
		$stud_roll[$p]=$i;
		///////////////////////
		
		$name="name".$i;		
		$mark_query=mysql_query("SELECT * from intmark WHERE studid='$k' AND subid='$subid'");
		$mark=mysql_fetch_array($mark_query);
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";		
 		echo "<td class=\"cell\">".$row['rollno']."</td>";
		echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";	
		$pdfname=$row['name'];
		//////////////////
		$stud_name[$p]=$row['name'];
		////////////////////
		$pdfrollno=$row['rollno'];
		$markses1=$mark['ses1'];
		if($markses1==999)
			$markses1=NULL;
		else if($markses1==65)
  			$markses1="A";  
		$markses2=$mark['ses2'];
		if($markses2==999)
			$markses2=NULL;
		else if($markses2==65)
  			$markses2="A";
		$markass1=$mark['ass1'];
		if($markass1==999)
			$markass1=NULL;
		$markass2=$mark['ass2'];
		if($markass2==999)
			$markass2=NULL;
		$marknor=$mark['normalized'];
		if($marknor==999)
			$marknor=NULL;
			if($marknor>=30 && $marknor!=999) $above60++;
		$tm=$tm+$marknor;
		$query_att=mysql_query("SELECT * FROM attendance1 WHERE subid='$subid' AND staffid='$staffid'");
   $totalhours=mysql_num_rows($query_att);
    $absent=0;
   while($row=mysql_fetch_array($query_att))
   {
   		$id=$row['id']; 
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
		$sone="sone".$i;
		$stwo="stwo".$i;
		$aone="aone".$i;
		$atwo="atwo".$i;
		$reg="reg".$i;
		$norm="norm".$i;
		echo "<td class=\"cell\">".$markses1."</td>";
		echo "<td class=\"cell\">".$markses2."</td>";
		echo "<td class=\"cell\">".$markass1."</td>";
		echo "<td class=\"cell\">".$markass2."</td>";
		echo "<td class=\"cell\">".$regm."</td>";		
		if($markses1!=NULL && $markses2!=NULL && $markass1!=NULL && $markass2!=NULL && $regm!=NULL)
		{
		$marksesn1=(($markses1*15)/50);
		$marksesn2=(($markses2*15)/50);
		$markassn1=(($markass1*7.5)/10);
		$markassn2=(($markass2*7.5)/10);
		$raw=$marksesn1+$marksesn2+$markassn1+$markassn2+$regm;		
		echo "<td class=\"cell\">".$raw."</td>";	
		if($marknor!=NULL)		
			echo "<td class=\"cell\">".$marknor."</td>";
		else
			echo "<td class=\"cell\">".$raw."</td>";
		}
		else
		{
		echo "<td class=\"cell\">-</td>";		
		echo "<td class=\"cell\">-</td>";
		}
		
		/////////////////////////////////
		$stud_ses1[$p]=$markses1;
		$stud_ses2[$p]=$markses2;
		$stud_ass1[$p]=$markass1;
		$stud_ass2[$p]=$markass2;
		$stud_reg[$p]=$regm;
		$stud_norm[$p]=$marknor;
		/////////////////////////////////
		
		echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
		
  		echo "</tr>";		
	
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
pdf_open_file($pdf, "C:\wamp\www\int_report.pdf"); 

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
	pdf_show_xy($pdf, "Internal Marks of ".$batch, 230, 780); 
	//line
	pdf_moveto($pdf, 30, 775); 
	pdf_lineto($pdf,570, 775); 
	pdf_stroke($pdf); 

$size=763;
pdf_setfont($pdf, $candara, 9);
pdf_show_xy($pdf, "Rollno", 35, $size); 
pdf_show_xy($pdf, "Name", 75, $size); 
pdf_show_xy($pdf, "Sessional1", 250, $size); 
pdf_show_xy($pdf, "Sessional2", 305, $size); 
pdf_show_xy($pdf, "Assignment1", 355, $size); 
pdf_show_xy($pdf, "Assignment2", 415, $size); 
pdf_show_xy($pdf, "Regularity", 472, $size); 
pdf_show_xy($pdf, "Normalized", 520, $size); 
//parallel
pdf_moveto($pdf, 30, 758); 
pdf_lineto($pdf, 570, 758); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 30); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 65, 775); 
pdf_lineto($pdf, 65, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 245, 775); 
pdf_lineto($pdf, 245, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 570, 775); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 300, 775); 
pdf_lineto($pdf, 300, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 469, 775); 
pdf_lineto($pdf, 469, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 515, 775); 
pdf_lineto($pdf, 515, 30); 
pdf_stroke($pdf);
//vertical line
pdf_moveto($pdf, 350, 775); 
pdf_lineto($pdf, 350, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 410, 775); 
pdf_lineto($pdf, 410, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 30, 775); 
pdf_lineto($pdf, 30, 30); 
pdf_stroke($pdf); 

$size=760;
pdf_setfont($pdf, $calibri, 9);
for($m=1;$m<=50;$m++){
$size=$size-14;
pdf_show_xy($pdf, $stud_roll[$m], 40, $size); 
pdf_show_xy($pdf, $stud_name[$m], 75, $size);
pdf_show_xy($pdf, $stud_ses1[$m], 260, $size); 
pdf_show_xy($pdf, $stud_ses2[$m], 315, $size); 
pdf_show_xy($pdf, $stud_ass1[$m], 370, $size); 
pdf_show_xy($pdf, $stud_ass2[$m], 430, $size); 
pdf_show_xy($pdf, $stud_reg[$m], 485, $size); 
pdf_show_xy($pdf, $stud_norm[$m], 540, $size); 
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
	pdf_show_xy($pdf, "Internal Marks of ".$batch, 230, 780); 
	//line
	pdf_moveto($pdf, 30, 775); 
	pdf_lineto($pdf,570, 775); 
	pdf_stroke($pdf); 

$size=760;
pdf_setfont($pdf, $candara, 9);
pdf_show_xy($pdf, "Rollno", 35, $size); 
pdf_show_xy($pdf, "Name", 75, $size); 
pdf_show_xy($pdf, "Sessional1", 250, $size); 
pdf_show_xy($pdf, "Sessional2", 305, $size); 
pdf_show_xy($pdf, "Assignment1", 355, $size); 
pdf_show_xy($pdf, "Assignment2", 415, $size); 
pdf_show_xy($pdf, "Regularity", 472, $size); 
pdf_show_xy($pdf, "Normalized", 520, $size); 
//parallel
pdf_moveto($pdf, 30, 758); 
pdf_lineto($pdf, 570, 758); 
pdf_stroke($pdf); 
//parallel
pdf_moveto($pdf, 30, 30); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 65, 775); 
pdf_lineto($pdf, 65, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 245, 775); 
pdf_lineto($pdf, 245, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 570, 775); 
pdf_lineto($pdf, 570, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 300, 775); 
pdf_lineto($pdf, 300, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 469, 775); 
pdf_lineto($pdf, 469, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 515, 775); 
pdf_lineto($pdf, 515, 30); 
pdf_stroke($pdf);
//vertical line
pdf_moveto($pdf, 350, 775); 
pdf_lineto($pdf, 350, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 410, 775); 
pdf_lineto($pdf, 410, 30); 
pdf_stroke($pdf); 
//vertical line
pdf_moveto($pdf, 30, 775); 
pdf_lineto($pdf, 30, 30); 
pdf_stroke($pdf); 


pdf_setfont($pdf, $calibri, 9);
$rx=$m+22;
for($n=$m;$n<=$rx;$n++){
$size=$size-14;
pdf_show_xy($pdf, $stud_roll[$n], 40, $size); 
pdf_show_xy($pdf, $stud_name[$n], 75, $size);
pdf_show_xy($pdf, $stud_ses1[$n], 260, $size); 
pdf_show_xy($pdf, $stud_ses2[$n], 315, $size); 
pdf_show_xy($pdf, $stud_ass1[$n], 370, $size); 
pdf_show_xy($pdf, $stud_ass2[$n], 430, $size); 
pdf_show_xy($pdf, $stud_reg[$n], 485, $size); 
pdf_show_xy($pdf, $stud_norm[$n], 540, $size); 
}

 // end page 
pdf_end_page($pdf); 

// close and save file 
pdf_close($pdf); 
 
 if($p==0) $p=1; $avg=$tm/$p;
mysql_close($con);
}

?>
            </p>
            <p>
              <input name="sendtype" type="hidden" id="sendtype3">
            </p>
            <?php
if(!empty($_POST['sub'])){

echo  "<table width=\"195\" border=\"0\" align=\"center\" class=\"box\">
    <tr>
      <td width=\"110\"><div align=\"right\"><strong>Class Average: </strong></div></td>
      <td width=\"10\"><strong>:</strong></td>
      <td width=\"63\"><strong>".substr($avg,0,6)."</strong></td>
    </tr>
    <tr>
      <td><strong>Above 60% </strong></td>
      <td><strong>:</strong></td>
      <td><strong>$above60</strong></td>
    </tr>
  </table>

  <table width=\"71\" border=\"0\" align=\"center\">
    <tr>
      <td width=\"128\" bgcolor=\"#0000CC\"><div align=\"center\"><a href=\"int_report.pdf\" target=\"_blank\" class=\"style11\">PRINT</a></div></td>
    </tr>
  </table>";
  }
  ?>
          </form></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
