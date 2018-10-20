

<?php include('./hod_trial.htm');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0033FF;
	font-weight: bold;
}
.style2 {color: #0033FF}
.light {
	font-variant: small-caps;
	color: #00CCFF;
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
<link href="box.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
$studid=$_COOKIE['studid'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$result1 = mysql_query("SELECT * FROM student WHERE studid='$studid'");
     $result2 = mysql_query("SELECT * FROM studet WHERE studid='$studid'");
			while($row = mysql_fetch_array($result1))
  			{
  				$name=$row['name'];
  				$urollno=$row['urollno'];
  				$dept=$row['dept'];
 				$sem=$row['sem'];
 				$rollno=$row['rollno'];
				$photo=$row['photo'];
				$src="upload/".$photo;
				}
				while($row = mysql_fetch_array($result2))
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
 			 }
  			}
			
?>
<div id="Layer2" style="position:absolute; left:11px; top:416px; width:138px; height:19px; z-index:2; background-color: #000000; layer-background-color: #000000; border: 1px none #000000;"><span class="light">
<center><?php echo $name; ?></center></span></div>
<p>&nbsp;</p>
<p><img alt="" name="photo" width="137" height="169" border="2" src="<?php echo $src; ?>">
    
</p>
<div id="Layer1" style="position:absolute; left:247px; top:217px; width:521px; height:678px; z-index:1; background-image: url(view_stud_profile.jpg); layer-background-image: url(view_stud_profile.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="374" border="0" align="center">
      <caption align="top">&nbsp;
      </caption>
      <tr>
        <td width="199"><div align="left" class="style1">Student id</div></td>
        <td width="6" class="style2"><strong>:</strong></td>
        <td width="155" class="box"><?php echo $studid; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style1">Name</div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $name; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style1">University roll no </div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $urollno; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style1">Department</div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $dept; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style1">Semester</div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $sem; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style1">Class Roll no </div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $rollno; ?></td>
      </tr>
      <tr>
        <td height="24" class="style6"><div align="right" class="editstaf2 style2">
            <div align="left" class="style4"><strong>Date of Birth</strong></div>
        </div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box">
          <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date."-".$month."-".$year; ?>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Gender</strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $gender; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Permanent Address </strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $paddress; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Temporory Address </strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $taddress; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Phone no </strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $phone; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Email</strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $email; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Religion</strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $religion; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Caste</strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $caste; ?></td>
      </tr>
      <tr>
        <td class="style1">Extra-curricular activities</td>
        <td class="style1">:</td>
        <td class="box"><?php echo $extra_activities; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Guardian name </strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $gname; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Relation</strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $relation; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Occupation</strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $occupation; ?></td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><strong>Contact no </strong></div></td>
        <td class="style2"><strong>:</strong></td>
        <td class="box"><?php echo $contact_no; ?></td>
      </tr>
    </table>
  </form>
</div>
<p>&nbsp;</p>
<table width="144" border="0">
  <tr>
    <td width="134"><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
        <param name="movie" value="button24.swf">
        <param name="quality" value="high">
        <embed src="button24.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
      </object>
</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
        <param name="movie" value="button25.swf">
        <param name="quality" value="high">
        <embed src="button25.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
      </object>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
        <param name="movie" value="button40.swf">
        <param name="quality" value="high">
        <embed src="button40.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
      </object>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
        <param name="BGCOLOR" value="">
        <param name="movie" value="button27.swf">
        <param name="quality" value="high">
        <embed src="button27.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
      </object>
</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
