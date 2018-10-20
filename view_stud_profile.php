<?php include('./stud_trial.htm'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.studprof {
	color: #0033FF;
	font-weight: bold;
}
.studprof2 {color: #0033FF}
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
<style type="text/css">
<!--
.light {	font-size: 16px;
	color: #0033FF;
}
.princprof3 {font-weight: bold}
.style1 {color: #0066FF}
-->
</style>
</head>

<body>
<?php
$studid=$_COOKIE['user'];
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
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="31%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="69%" valign="top">
      <table width="378" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><table width="374" border="0" align="center">
            <tr>
              <td colspan="3" background="title.jpg"><div align="center" class="princprof3">:: MY PROFILE :: </div></td>
              </tr>
            <tr>
              <td width="199"><div align="left" class="studprof style1">Studentid</div></td>
              <td width="6" class="studprof2"><strong>:</strong></td>
              <td width="155" class="box"><?php echo $studid; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof style1">Name</div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $name; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof style1">University roll no </div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $urollno; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof style1">Department</div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $dept; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof style1">Semester</div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $sem; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof style1">Class Roll no </div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $rollno; ?></td>
            </tr>
            <tr>
              <td height="24" class="style6"><div align="right" class="editstaf2 studprof2 style1">
                  <div align="left" class="style4"><strong>Date of Birth</strong></div>
              </div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box">
                <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date.$month.$year; ?>
              </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Gender</strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $gender; ?></td>
            </tr>
            <tr>
              <td valign="top"><div align="left" class="studprof2 style1"><strong>Permanent Address </strong></div></td>
              <td valign="top" class="studprof2"><strong>:</strong></td>
              <td valign="top" class="box"><?php echo $paddress; ?></td>
            </tr>
            <tr>
              <td valign="top"><div align="left" class="studprof2 style1"><strong>Temporary Address </strong></div></td>
              <td valign="top" class="studprof2"><strong>:</strong></td>
              <td valign="top" class="box"><?php echo $taddress; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Phone no </strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $phone; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Email</strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $email; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Religion</strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $religion; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Caste</strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $caste; ?></td>
            </tr>
            <tr valign="top">
              <td class="studprof style1">Extra-curricular activities</td>
              <td class="studprof">:</td>
              <td class="box"><?php echo $extra_activities; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Guardian name </strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $gname; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Relation</strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $relation; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Occupation</strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $occupation; ?></td>
            </tr>
            <tr>
              <td><div align="left" class="studprof2 style1"><strong>Contact no </strong></div></td>
              <td class="studprof2"><strong>:</strong></td>
              <td class="box"><?php echo $contact_no; ?></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
