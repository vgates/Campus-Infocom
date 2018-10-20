<?php 
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}

include('./pat_trial.htm');

if($_POST['batch'])
	$batch=$_POST['batch']-4;
else
	$batch="";
if($_POST['aggregate'])
	$aggregate=$_POST['aggregate'];
else
	$aggregate="";
if($_POST['arrears'])
	$arrears=$_POST['arrears'];
else
	$arrears="";
if($_POST['placed'])
	$placed=$_POST['placed'];
else
	$placed="";
 
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
$result = mysql_query("SELECT * FROM department");
$count=1;
while($row = mysql_fetch_array($result))
{
	 $i=$row['dept'];
	if($_POST["$i"]) 
		$arr["$i"]="check";
}
	if($user=="pat")
	{
		//include('./pat_trial.htm');
		$result = mysql_query("SELECT * FROM staff WHERE staffid='pat'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
	}
for($x=0;$x<=100;$x++)
	{	
		$name="name".$x;
		if(isset($_POST["$name"]))
		{
			$studid=$_POST["$x"];
			setcookie("studid",$studid);
			header('Location: princ_studsearchprofile.php');
			exit();
			}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css" class="butt">
<!--
.butt {
	background-image: none;
	display: marker;
	width: 250px;
	cursor: hand;
	background-color: #FFFFFF;
	text-transform: uppercase;
	color: #0000FF;
	text-align: center;
	border: none #FFFFFF;
	text-decoration: underline;
}
.ff {
	color: #00CCFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0000FF;
	font-weight: normal;
}
.tcelh {
	background-color: #FFFF99;
}
.tcelf {
	background-color: #FFCCCC;
}
.msg {
	font-family: "BankGothic Md BT";
	color: #0066FF;
}
.title {color:#000000; font-weight:bold}
.buttP {
	background-image: none;
	display: marker;
	width: 250px;
	cursor: hand;
	background-color: #FFFF99;
	text-transform: uppercase;
	color: #0000FF;
	text-align: center;
	border: none #FFFFFF;
	text-decoration: underline;
}
.buttY {
	background-image: none;
	display: marker;
	width: 250px;
	cursor: hand;
	background-color: #FFCCCC;
	text-transform: uppercase;
	color: #0000FF;
	text-align: center;
	border: none #FFFFFF;
	text-decoration: underline;
}
.princprof3 {font-weight: bold}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	color: #FFFFFF;
	text-decoration: none;
}
a:hover {
	color: #FFFFFF;
	text-decoration: none;
}
a:active {
	color: #FFFFFF;
	text-decoration: none;
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

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p></p>
  <p>&nbsp;</p>
  <table width="980" border="0" align="center">
    <tr>
      <td width="142" height="170" valign="top"><span class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></span></td>
      <td width="712" rowspan="2" valign="top"><?php
  //doing batch listing
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"title\" colspan='6' background='title.jpg'>:: List of Students Eligible for the Recruitment Process ::</th>
</tr>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Admission No.</th>
<th class=\"ff\">University Reg No.</th>
<th class=\"ff\">Department</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Aggregate</th>
<th class=\"ff\">Arrears</th>
</tr>";
// create handle for new PDF document 
$pdf = pdf_new(); 

// open a file 
pdf_open_file($pdf, "C:\wamp\www\pat_list.pdf"); 

// start a new page (A4) 
$limit=0; $page=1; $pages=1; $number=0;
while($pages>0)
{
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
	//heading
	pdf_show_xy($pdf, "Jyothi Engineering College", 200, 800);
	//line
	pdf_moveto($pdf, 30, 792); 
	pdf_lineto($pdf,570, 792); 
	pdf_stroke($pdf); 
	//subheading
	pdf_setfont($pdf, $arial, 10);
	pdf_show_xy($pdf, ":: List of Students Eligible for the Recruitment Process ::", 185, 780);
	//line
	pdf_moveto($pdf, 30, 775); 
	pdf_lineto($pdf,570, 775); 
	pdf_stroke($pdf); 
	//fields..
	pdf_setfont($pdf, $candara, 9);
	pdf_show_xy($pdf, "Admission No", 35, 763);
	pdf_show_xy($pdf, "University Reg No", 100, 763);
	pdf_show_xy($pdf, "Department", 180, 763);
	//vertical line
	pdf_moveto($pdf, 173, 775); 
	pdf_lineto($pdf, 173, 45); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 237, 775); 
	pdf_lineto($pdf, 237, 45); 
	pdf_stroke($pdf);
	//field
	pdf_show_xy($pdf, "Name", 245, 763);
	//vertical line
	pdf_moveto($pdf, 93, 775); 
	pdf_lineto($pdf, 93, 45); 
	pdf_stroke($pdf);
	//field
	pdf_show_xy($pdf, "Aggregate", 480, 763);
	//vertical line
	pdf_moveto($pdf, 535, 775); 
	pdf_lineto($pdf, 535, 45); 
	pdf_stroke($pdf);
	//vertical line
	pdf_moveto($pdf, 475, 775); 
	pdf_lineto($pdf, 475, 45); 
	pdf_stroke($pdf);
	pdf_show_xy($pdf, "Arrears", 540, 763);
	
	//line
	pdf_moveto($pdf, 30, 758); 
	pdf_lineto($pdf,570, 758); 
	pdf_stroke($pdf); 
	//line
	pdf_moveto($pdf, 30, 45); 
	pdf_lineto($pdf,570, 45); 
	pdf_stroke($pdf); 
	
	
	//rank list
	pdf_setfont($pdf, $calibri, 9);

	$size=742;
	$query=mysql_query("SELECT * FROM student WHERE studid LIKE '$batch%' ORDER BY dept,name LIMIT $limit,50"); 

	
  while($row=mysql_fetch_array($query))
  {
	  $flag=1;
 	 $stud_name=$row['name'];
  	$i=$row['rollno'];
  	$k=$row['studid'];
  	$name="name".$i;
 	 $dept=$row['dept'];
 	 $querysum=mysql_query("SELECT * from extmark_app where studid='$k'"); 
	$sum=0; $total=0; $supply=0; $lag=0;
	while($rowsum=mysql_fetch_array($querysum))
	{
		$lag=1;
		$sum=$sum+$rowsum['internal']+$rowsum['external'];		
		$tempsum=$rowsum['internal']+$rowsum['external'];
		$subcode=$rowsum['subid'];
		$querysub=mysql_query("SELECT * from subjects where subid='$subcode'"); 
		$rowsub=mysql_fetch_array($querysub);
		$total=$total+$rowsub['internal']+$rowsub['external'];
		$temptotal=$rowsub['internal']+$rowsub['external'];
		if($tempsum<($temptotal/2)) $supply++;
	}
	$queryplaced=mysql_query("SELECT * from placedstud where studid='$k'");
	$noplaced=mysql_num_rows($queryplaced);
	
	if($total>0) $agg=substr(($sum/$total)*100,0,5);// else $agg=0;
	if($arr["$dept"]=="check" && $agg>=$aggregate && $supply<=$arrears && $lag==1 && $noplaced<=$placed)
	{
		$number++;
		echo"<tr align=\"center\">";
  		echo "<td class=\"cell\">".$row['studid']."</td>";
  		echo "<td class=\"cell\">".$row['urollno']."</td>";
		echo "<td class=\"cell\">".$row['dept']."</td>";
  		echo "<td class=\"cell\">"."<input name=\"$name\" type=\"submit\" class=\"butt\" value=\"$stud_name\" border=\"0\">"."</td>";
		echo "<td class=\"cell\">".$agg."</td>";			
		echo "<td class=\"cell\">".$supply."</td>";
		echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
  		echo "</tr>";			
		pdf_show_xy($pdf, $row['studid'], 35, $size);
		pdf_show_xy($pdf, $row['urollno'], 110, $size);
		pdf_show_xy($pdf, $row['dept'], 195, $size);
		pdf_show_xy($pdf, $row['name'], 245, $size);
		pdf_show_xy($pdf, $agg, 490, $size);
		pdf_show_xy($pdf, $supply, 549, $size); $size=$size-14;
	}		
	
 }
	//end page
	pdf_show_xy($pdf, "< PAGE No: ".$page." >", 275, 30);
	pdf_end_page($pdf); 
	
	
	 $limit=$limit+50; $page++;
	if($number==50) { $pages=1; $number=0; } else {$pages=0;}
	
}
// close and save file 
pdf_close($pdf); 
   mysql_close($con);
   echo "</table>";
 echo '</center>';
 if($flag==0) echo "<p class=\"msg\" align=\"center\">NO entries found</p>";
   }
   ?>
        <br>
        <table width="90" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#0000CC">
        <tr>
          <td nowrap><span class="style1"><a href="pat_list.pdf" target="_blank">Generate PDF</a></span></td>
        </tr>
      </table>      
        <div align="center"></div>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>&nbsp;  </p>
</form>

</body>
</html>
