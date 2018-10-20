<?php 
$studid=$_COOKIE['studid'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM student WHERE studid='$studid'");
while($row = mysql_fetch_array($result))
{
		$name=$row['name'];
  		$urollno=$row['urollno'];
  		$dept=$row['dept'];
 		$sem=$row['sem'];
 		$rollno=$row['rollno'];
		$photo=$row['photo'];
		$src="upload/".$photo;
}
	 
$result = mysql_query("SELECT * FROM studet WHERE studid='$studid'");
while($row = mysql_fetch_array($result))
{
	$dob=$row['dob'];
	$gender=$row['gender'];
	$paddress=$row['paddress'];
	$taddress=$row['taddress'];
	$phone=$row['phone'];
	$email=$row['email'];
	$religion=$row['religion'];				 
	$caste=$row['caste'];
	$extra_activities=$row['extra_activities'];
	$gname=$row['gname'];
	$relation=$row['relation'];
	$occupation=$row['occupation'];
	$contact_no=$row['contact_no'];
	
	$cetrank=$row['cetrank'];
	$xinst=$row['xinst'];
	$xboard=$row['xboard'];
	$xyear=$row['xyear'];
	$xmarks=$row['xmarks'];
	$xmaxmarks=$row['xmaxmarks'];
	$xiiinst=$row['xiiinst'];
	$xiiboard=$row['xiiboard'];
	$xiiyear=$row['xiiyear'];
	$xiimarks=$row['xiimarks'];
	$xiimaxmarks=$row['xiimaxmarks'];
	$maths=$row['maths'];
	$maxmaths=$row['maxmaths'];
	$phy=$row['phy'];
	$maxphy=$row['maxphy'];
	$chem=$row['chem'];
	$maxchem=$row['maxchem'];
}
	 
mysql_close($con);

// create handle for new PDF document 
$fff="C:\wamp\www\greencard.pdf";
$pdf = pdf_new(); 

// open a file 
pdf_open_file($pdf, $fff); 

// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 

// Open few .TTF (true type font)  
// be sure that your font file contains enough character for your language 
 
pdf_set_parameter($pdf, "FontOutline", "Arial=C:\WINDOWS\Fonts\Times.ttf"); 

// get and use a font object 
$arial = pdf_findfont($pdf, "Arial", "host",1);
pdf_setfont($pdf, $arial, 10);


// add an image under the text 
$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bansm.jpg","",0); 
pdf_place_image($pdf, $image, 50, 720, 0.50); 
pdf_close_image($pdf, $image);

$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg.jpg","",0); 
pdf_place_image($pdf, $image, 50, 700, 0.50); 
pdf_close_image($pdf, $image);

$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\upload/".$photo,"",0); 
pdf_place_image($pdf, $image, 460, 623, 0.50); 
pdf_close_image($pdf, $image);


pdf_show_xy($pdf, "Name", 50, 685);
pdf_show_xy($pdf, ": ".$name, 120, 685); 

pdf_show_xy($pdf, "Date of Birth", 50, 665);
$birthdob=substr($dob,8,2).substr($dob,5,2).substr($dob,0,4);
pdf_show_xy($pdf, ": ".$dob, 120, 665); 

pdf_show_xy($pdf, "Gender: ", 50, 645);
pdf_show_xy($pdf, ": ".$gender, 120, 645);

pdf_show_xy($pdf, "Religion", 50, 625);
pdf_show_xy($pdf, ": ".$religion, 120, 625); 

pdf_show_xy($pdf,"Caste: ", 50, 605);
pdf_show_xy($pdf,": ".$caste, 120, 605);


pdf_show_xy($pdf, "Email", 50, 585); 
pdf_show_xy($pdf, ": ".$email, 120, 585);

pdf_show_xy($pdf, "Permanent address", 50, 565);
pdf_show_xy($pdf, $paddress, 100, 550); 

pdf_show_xy($pdf, "Temporary address", 50, 530);
pdf_show_xy($pdf, $taddress, 100, 515); 

$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-4.jpg","",0); 
pdf_place_image($pdf, $image, 50, 485, 0.50); 
pdf_close_image($pdf, $image);
pdf_show_xy($pdf, "Name of guardian : ".$gname, 50, 470); 
pdf_show_xy($pdf, "Relationship         : ".$relation, 50, 450); 
pdf_show_xy($pdf, "Occupation           : ".$occupation, 50, 430); 
pdf_show_xy($pdf, "Contact No           : ".$contact_no, 50, 410); 

 $image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-10th.jpg","",0); 
pdf_place_image($pdf, $image, 50, 380, 0.50); 
pdf_close_image($pdf, $image);

pdf_show_xy($pdf, "Institution              : ".$xinst , 50, 365);
pdf_show_xy($pdf, "Board                    : ". $xboard , 50, 350);
pdf_show_xy($pdf, "Year                      : ". $xyear , 50, 335);
pdf_show_xy($pdf, "Obtained Marks    : ". $xmarks , 50, 320);
pdf_show_xy($pdf, "Maximum Marks  : ". $xmaxmarks , 50, 305);

 $image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-12th.jpg","",0); 
pdf_place_image($pdf, $image, 50, 275, 0.50); 
pdf_close_image($pdf, $image);

pdf_show_xy($pdf, "Institution              : ".$xiiinst , 50, 260);
pdf_show_xy($pdf, "Board                    : ". $xiiboard , 50, 245);
pdf_show_xy($pdf, "Year                      : ". $xiiyear , 50, 230);
pdf_show_xy($pdf, "Obtained Marks    : ". $xiimarks , 50, 215);
pdf_show_xy($pdf, "Maximum Marks  : ". $xiimaxmarks , 50, 200);

pdf_show_xy($pdf, "                                   Maths        Physics       Chemistry" , 50, 180);
pdf_show_xy($pdf, "Marks obtained", 50, 165);
pdf_show_xy($pdf, $maths , 142, 165);
pdf_show_xy($pdf, $phy , 194, 165);
pdf_show_xy($pdf, $chem , 245, 165);
pdf_show_xy($pdf, $sum , 297, 165);

pdf_show_xy($pdf, "Maximum Marks", 50, 150);
pdf_show_xy($pdf, $maxmaths , 142, 150);
pdf_show_xy($pdf, $maxphy , 194, 150);
pdf_show_xy($pdf, $maxchem , 245, 150);
pdf_show_xy($pdf, $maxsum , 297, 150);

pdf_show_xy($pdf, "CET RANK  :  ".$cetrank , 50, 120);

pdf_show_xy($pdf, "Page: 1", 280, 40); 

/*$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-4.jpg","",0); 
pdf_place_image($pdf, $image, 50, 150, 0.50); 
pdf_close_image($pdf, $image);


$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-5.jpg","",0); 
pdf_place_image($pdf, $image, 50, 95, 0.50); 
pdf_close_image($pdf, $image);

pdf_show_xy($pdf, "Bank Name", 50, 75);
pdf_show_xy($pdf, $b_name, 135, 75);

pdf_show_xy($pdf, "DD/Cheque No.", 50, 60);
pdf_show_xy($pdf, $b_cheque, 135, 60);
pdf_show_xy($pdf, "Issue Date", 50, 45);
pdf_show_xy($pdf, $b_dd."-".$b_mm."-".$b_yy, 135, 45);

*/




// end page 
pdf_end_page($pdf); 


// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 

// Open few .TTF (true type font)  
// be sure that your font file contains enough character for your language 
 
pdf_set_parameter($pdf, "FontOutline", "Arial=C:\WINDOWS\Fonts\Times.ttf"); 

// get and use a font object 
$arial = pdf_findfont($pdf, "Arial", "host",1);
pdf_setfont($pdf, $arial, 10);


// add an image under the text 
$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bansm.jpg","",0); 
pdf_place_image($pdf, $image, 50, 720, 0.50); 
pdf_close_image($pdf, $image);

$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-sem.jpg","",0); 
pdf_place_image($pdf, $image, 50, 700, 0.50); 
pdf_close_image($pdf, $image);
$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom", $con);

//888888888888888 SEMESTER1&2 8888888888888888888888888888
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='1' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, 690); 
	pdf_lineto($pdf,450, 690); 
	pdf_stroke($pdf);
	pdf_show_xy($pdf, ":: SEMESTER 1 and SEMESTER 2 ::", 150, 680);
	//parallel line
	pdf_moveto($pdf, 50, 675); 
	pdf_lineto($pdf,450, 675); 
	pdf_stroke($pdf);
	
	pdf_show_xy($pdf, "CODE", 50, 665);
	pdf_show_xy($pdf, "NAME", 150, 665);
	pdf_show_xy($pdf, "INTERNAL", 250, 665);
	pdf_show_xy($pdf, "EXTERNAL", 320, 665);
	pdf_show_xy($pdf, "STATUS", 390, 665);
	//parallel line
	pdf_moveto($pdf, 50, 660); 
	pdf_lineto($pdf,450, 660); 
	pdf_stroke($pdf);
	$size=650; $failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, 675); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, 675); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, 675); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, 675); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	
	//888888888888888 SEMESTER3 8888888888888888888888888888
	$size=$size-25;
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='3' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;
	pdf_show_xy($pdf, ":: SEMESTER 3 ::", 200, $size);
	$size=$size-5;
	$ver=$size;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	pdf_show_xy($pdf, "CODE", 50, $size);
	pdf_show_xy($pdf, "NAME", 150, $size);
	pdf_show_xy($pdf, "INTERNAL", 250, $size);
	pdf_show_xy($pdf, "EXTERNAL", 320, $size);
	pdf_show_xy($pdf, "STATUS", 390, $size);
	$size=$size-5;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;$failed=0;$failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, $ver); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, $ver); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, $ver); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, $ver); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);

//888888888888888 SEMESTER4 8888888888888888888888888888
	$size=$size-25;
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='4' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;
	pdf_show_xy($pdf, ":: SEMESTER 4 ::", 200, $size);
	$size=$size-5;
	$ver=$size;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	pdf_show_xy($pdf, "CODE", 50, $size);
	pdf_show_xy($pdf, "NAME", 150, $size);
	pdf_show_xy($pdf, "INTERNAL", 250, $size);
	pdf_show_xy($pdf, "EXTERNAL", 320, $size);
	pdf_show_xy($pdf, "STATUS", 390, $size);
	$size=$size-5;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;$failed=0;$failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, $ver); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, $ver); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, $ver); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, $ver); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);

pdf_show_xy($pdf, "Page: 2", 280, 40); 


// end page 
pdf_end_page($pdf); 

// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 

// Open few .TTF (true type font)  
// be sure that your font file contains enough character for your language 
 
pdf_set_parameter($pdf, "FontOutline", "Arial=C:\WINDOWS\Fonts\Times.ttf"); 

// get and use a font object 
$arial = pdf_findfont($pdf, "Arial", "host",1);
pdf_setfont($pdf, $arial, 10);


// add an image under the text 
$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bansm.jpg","",0); 
pdf_place_image($pdf, $image, 50, 720, 0.50); 
pdf_close_image($pdf, $image);

$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-sem.jpg","",0); 
pdf_place_image($pdf, $image, 50, 700, 0.50); 
pdf_close_image($pdf, $image);
$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom", $con);
$studid="2005/CS/59";

//888888888888888 SEMESTER-5 8888888888888888888888888888
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='5' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, 690); 
	pdf_lineto($pdf,450, 690); 
	pdf_stroke($pdf);
	pdf_show_xy($pdf, ":: SEMESTER 5 ::", 200, 680);
	//parallel line
	pdf_moveto($pdf, 50, 675); 
	pdf_lineto($pdf,450, 675); 
	pdf_stroke($pdf);
	
	pdf_show_xy($pdf, "CODE", 50, 665);
	pdf_show_xy($pdf, "NAME", 150, 665);
	pdf_show_xy($pdf, "INTERNAL", 250, 665);
	pdf_show_xy($pdf, "EXTERNAL", 320, 665);
	pdf_show_xy($pdf, "STATUS", 390, 665);
	//parallel line
	pdf_moveto($pdf, 50, 660); 
	pdf_lineto($pdf,450, 660); 
	pdf_stroke($pdf);
	$size=650;$failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, 675); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, 675); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, 675); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, 675); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	
	//888888888888888 SEMESTER3 8888888888888888888888888888
	$size=$size-25;
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='6' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;
	pdf_show_xy($pdf, ":: SEMESTER 6 ::", 200, $size);
	$size=$size-5;
	$ver=$size;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	pdf_show_xy($pdf, "CODE", 50, $size);
	pdf_show_xy($pdf, "NAME", 150, $size);
	pdf_show_xy($pdf, "INTERNAL", 250, $size);
	pdf_show_xy($pdf, "EXTERNAL", 320, $size);
	pdf_show_xy($pdf, "STATUS", 390, $size);
	$size=$size-5;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;$failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, $ver); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, $ver); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, $ver); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, $ver); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);

//888888888888888 SEMESTER-7 8888888888888888888888888888
	$size=$size-25;
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='7' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;
	pdf_show_xy($pdf, ":: SEMESTER 7 ::", 200, $size);
	$size=$size-5;
	$ver=$size;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	pdf_show_xy($pdf, "CODE", 50, $size);
	pdf_show_xy($pdf, "NAME", 150, $size);
	pdf_show_xy($pdf, "INTERNAL", 250, $size);
	pdf_show_xy($pdf, "EXTERNAL", 320, $size);
	pdf_show_xy($pdf, "STATUS", 390, $size);
	$size=$size-5;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	$size=$size-10;$failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, $ver); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, $ver); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, $ver); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, $ver); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);

pdf_show_xy($pdf, "Page: 3", 280, 40); 


// end page 
pdf_end_page($pdf); 

// start a new page (A4) 
pdf_begin_page($pdf, 595, 842); 

// path of your TTF font directory 
$fontdir = "C:\WINDOWS\Fonts"; 

// Open few .TTF (true type font)  
// be sure that your font file contains enough character for your language 
 
pdf_set_parameter($pdf, "FontOutline", "Arial=C:\WINDOWS\Fonts\Times.ttf"); 

// get and use a font object 
$arial = pdf_findfont($pdf, "Arial", "host",1);
pdf_setfont($pdf, $arial, 10);


// add an image under the text 
$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bansm.jpg","",0); 
pdf_place_image($pdf, $image, 50, 720, 0.50); 
pdf_close_image($pdf, $image);

$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-sem.jpg","",0); 
pdf_place_image($pdf, $image, 50, 700, 0.50); 
pdf_close_image($pdf, $image);
$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom", $con);
$studid="2005/CS/59";

//888888888888888 SEMESTER5 8888888888888888888888888888
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' and sem='8' order by subid");
 
	
	//parallel line
	pdf_moveto($pdf, 50, 690); 
	pdf_lineto($pdf,450, 690); 
	pdf_stroke($pdf);
	pdf_show_xy($pdf, ":: SEMESTER 8 ::", 200, 680);
	//parallel line
	pdf_moveto($pdf, 50, 675); 
	pdf_lineto($pdf,450, 675); 
	pdf_stroke($pdf);
	
	pdf_show_xy($pdf, "CODE", 50, 665);
	pdf_show_xy($pdf, "NAME", 150, 665);
	pdf_show_xy($pdf, "INTERNAL", 250, 665);
	pdf_show_xy($pdf, "EXTERNAL", 320, 665);
	pdf_show_xy($pdf, "STATUS", 390, 665);
	//parallel line
	pdf_moveto($pdf, 50, 660); 
	pdf_lineto($pdf,450, 660); 
	pdf_stroke($pdf);
	$size=650;$failed=0;$obt=0;$max=0;
while($row = mysql_fetch_array($result))
{
	
	$subid=$row['subid'];
	$querymark = mysql_query("SELECT * FROM extmark_app WHERE subid='$subid' and studid='$studid'");
	$markrow = mysql_fetch_array($querymark);
	$subname=$row['name'];
	$internal=$markrow['internal'];
	$external=$markrow['external'];
	$obt=$obt+$internal+$external;
	$max=$max+$row['internal']+$row['external'];
	pdf_show_xy($pdf, $subid, 50, $size);
	pdf_show_xy($pdf, $subname, 150, $size);
	pdf_show_xy($pdf, $internal, 265, $size);
	pdf_show_xy($pdf, $external, 335, $size);
	if($obt>=($max/2))
		pdf_show_xy($pdf, "passed", 391, $size);
	else
	{
		$failed++;
		pdf_show_xy($pdf, "failed", 391, $size);
	}
	$size=$size-14;
}	
$size=$size+7;
//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 145, 675); 
	pdf_lineto($pdf, 145, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 245, 675); 
	pdf_lineto($pdf, 245, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 315, 675); 
	pdf_lineto($pdf, 315, $size); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 380, 675); 
	pdf_lineto($pdf, 380, $size); 
	pdf_stroke($pdf);
	
	$size=$size-10;
	if($failed==0) 
		$msg="passed"; 
	else 
		$msg=$failed." arrears"; 
	$percentage=($obt/$max)*100;
	pdf_show_xy($pdf, "Status: ".$msg."         Percentage: ".$percentage."%", 50, $size);
	$size=$size-7;
	//parallel line
	pdf_moveto($pdf, 50, $size); 
	pdf_lineto($pdf,450, $size); 
	pdf_stroke($pdf);
$size=$size-30;
$image = pdf_open_image_file($pdf, "jpeg", "C:\wamp\www\bg-pat.jpg","",0); 
pdf_place_image($pdf, $image, 50, $size, 0.50); 
pdf_close_image($pdf, $image);
$size=$size-15;
$result = mysql_query("SELECT * FROM placedstud WHERE studid='$studid'");
$x=1;
$placed=mysql_num_rows($result);
while($row=mysql_fetch_array($result))
{
	$id=$row['id'];
	$resultid = mysql_query("SELECT * FROM company WHERE id='$id'");
	$rowid=mysql_fetch_array($resultid);
	$name=$rowid['name'];
	pdf_show_xy($pdf, $x.". ".$name, 50, $size);
	$x++;
	$size=$size-14;
}
if(!$placed)
			pdf_show_xy($pdf, "Not placed", 50, $size);
		

pdf_show_xy($pdf, "Page: 4", 280, 40); 


// end page 
pdf_end_page($pdf); 

// close and save file 
pdf_close($pdf);
header('Location: print_gc.php');
exit();
?> 