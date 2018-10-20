<?php 
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
if($user=="administrator")
		include('./trial.htm');
	//principal
	else if($user=="principal")
		include('./princ_trial.htm');
else if(substr($user,0,3)=="jec")
	{	
		$query=mysql_query("SELECT * FROM department WHERE hod='$user'");
		$row = mysql_fetch_array($query);
		if($row)
			include('./hod_trial.htm');
	}



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
.princprof1 {
	font-size: 18px;
	font-weight: bold;
	color: #0066FF;
	text-decoration: underline;
}
.light {
	font-variant: small-caps;
	color: #00CCFF;
	font-weight:bold;
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
<style type="text/css">
<!--
.light {	font-variant: small-caps;
	color: #00CCFF;
	font-weight:bold;
}
.butstyle {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	font-weight: bold;
	color: #0033FF;
	background-color: #67C4FF;
	width: 115px;
	cursor: hand;
}
.staff4 {color: #0033FF}
.light1 {	font-variant: small-caps;
	color: #00CCFF;
	font-weight:bold;
}
.light1 {font-variant: small-caps;
	color: #000000;
	font-weight:bold;
}
.style1 {color: #000000}
-->
</style>
</head>

<body>
<?php
$staffid=$_COOKIE['staffid'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$result1 = mysql_query("SELECT * FROM staff WHERE staffid='$staffid'");

			while($row = mysql_fetch_array($result1))
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
					$photot=$row['photo'];
					$srct="upload/".$photot;
 			}
  			}
?>

<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="25%" height="175" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="75%" valign="top">
      <table width="453" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div align="center">
              <table width="449" border="0">
                <tr>
                  <td height="28" colspan="3" background="title.jpg"><div align="center" class="princprof3 style1">:: PROFILE ::                 </div></td>
                  </tr>
                <tr>
                  <td width="156" height="28"><div align="right" class="princprof2">
                      <div align="left"><strong>Staffid</strong></div>
                  </div></td>
                  <td width="10"><span class="princprof4">:</span></td>
                  <td width="276" class="box"><div align="left"><?php echo $staffid; ?></div>
                </tr>
                <tr>
                  <td height="27"><div align="right" class="princprof2">
                      <div align="left"><strong>Name</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $name; ?></div></td>
                </tr>
                <tr>
                  <td height="30"><div align="right" class="princprof2">
                      <div align="left"><strong>Email</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $email; ?></div></td>
                </tr>
                <tr>
                  <td height="29"><div align="right" class="princprof2">
                      <div align="left"><strong>Phone</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $phone; ?></div></td>
                </tr>
                <tr>
                  <td height="30"><div align="right" class="princprof2">
                      <div align="left"><strong>Mobile</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $mobile; ?></div></td>
                </tr>
                <tr>
                  <td height="29"><div align="right" class="princprof2">
                      <div align="left"><strong>Maritalstatus</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $maritalstatus; ?></div></td>
                </tr>
                <tr>
                  <td height="33"><div align="right" class="princprof2">
                      <div align="left"><strong>Permanent Address</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $paddress; ?></div></td>
                </tr>
                <tr>
                  <td height="28"><div align="right" class="princprof2">
                      <div align="left"><strong>Temporary Address</strong></div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $taddress; ?></div></td>
                </tr>
                <tr>
                  <td height="30" class="style6"><div align="right" class="editstaf2 princprof2 princprof3">
                      <div align="left"><span class="princprof4">Date of Birth</span></div>
                  </div></td>
                  <td class="style6 princprof2 princprof3">:</td>
                  <td class="box">
                    <div align="left">
                      <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date."-".$month."-".$year; ?>
                  </div></td>
                </tr>
                <tr>
                  <td height="27"><div align="right" class="princprof4">
                      <div align="left">Gender</div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $gender; ?></div></td>
                </tr>
                <tr>
                  <td height="30"><div align="right" class="princprof4">
                      <div align="left">Religion</div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $religion; ?></div></td>
                </tr>
                <tr>
                  <td height="27"><div align="right" class="princprof4">
                      <div align="left">Caste</div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $caste; ?></div></td>
                </tr>
                <tr>
                  <td height="30"><div align="right" class="princprof4">
                      <div align="left">Qualification</div>
                  </div></td>
                  <td><span class="princprof4">:</span></td>
                  <td class="box">
                    <div align="left"><?php echo $qualification ?></div></td>
                </tr>
              </table>
            </div>
          </form></td>
        </tr>
    </table>
      <table width="141" border="0">
        <tr>
          <td><img src="<?php echo $srct; ?>" alt="" width="137" height="169" border="1"></td>
        </tr>
        <tr>
          <td bordercolor="#000000" bgcolor="#FFFFFF"><div align="center"><span class="light1"><?php echo $name; ?></span> </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form2" method="post" action="princ_staff_tt.php">
                <input name="Submit" type="submit" class="butstyle" value="Class Schedule">
              </form>
          </div></td>
        </tr>
      </table>      
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
