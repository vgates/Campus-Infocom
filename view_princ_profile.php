<?php 
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./princ_trial.htm'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.princprof1 {
	font-size: 18px;
	font-weight: bold;
	color: #0066FF;
	text-decoration: underline;
}
.princprof2 {color: #0066FF}
.princprof3 {font-weight: bold}
.princprof4 {color: #0066FF; font-weight: bold; }
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
$staffid=$_COOKIE['user'];
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
  				$email=$row['email'];
  				$phone=$row['phone'];
 				 $mobile=$row['mobile'];
				$maritalstatus=$row['marital_status'];
				 $paddress=$row['paddress'];
				 $taddress=$row['taddress'];
				 $gender=$row['gender'];
					$dob=$row['dob'];
					$religion=$row['religion'];
					$caste=$row['caste'];
					$qualification=$row['qualification'];
$photo=$row['photo'];
 $src="upload/".$photo;
 			}
  			}
?>

<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="27%"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="style6"></p>
    <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p></td>
    <td width="73%" valign="top">      <table width="200" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><table width="404" height="390" align="center">
            <tr>
              <td height="21" colspan="3" background="title.jpg"><div align="center"><span class="princprof3">:: MY PROFILE :: </span></div></td>
            </tr>
            <tr>
              <td width="156" height="21"><div align="right" class="princprof2">
                  <div align="left"><strong>Staffid</strong></div>
              </div></td>
              <td width="10"><span class="princprof4">:</span></td>
              <td width="276" class="box"><div align="left" class="box"><?php echo $staffid; ?></div>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof2">
                  <div align="left"><strong>Name</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"><?php echo $name; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left"><strong>Email</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $email; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left"><strong>Phone</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $phone; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left"><strong>Mobile</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $mobile; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left"><strong>Maritalstatus</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $maritalstatus; ?> </div></td>
            </tr>
            <tr valign="top">
              <td height="65"><div align="right" class="princprof4">
                  <div align="left"><strong>Permanent Address</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $paddress; ?> </div></td>
            </tr>
            <tr valign="top">
              <td height="58"><div align="right" class="princprof2">
                  <div align="left"><strong>Temporary Address</strong></div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $taddress; ?> </div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="editstaf2 princprof2 princprof3">
                  <div align="left"><span class="princprof4">Date of Birth</span></div>
              </div></td>
              <td class="style6 princprof2 princprof3">:</td>
              <td class="box">
                <div align="left" class="box">
                  <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date."-".$month."-".$year; ?>
              </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left">Gender</div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $gender; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left">Religion</div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $religion; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left">Caste</div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $caste; ?> </div></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="princprof4">
                  <div align="left">Qualification</div>
              </div></td>
              <td><span class="princprof4">:</span></td>
              <td class="box"><div align="left" class="box"> <?php echo $qualification ?> </div></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
