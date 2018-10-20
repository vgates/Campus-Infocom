<?php include('./princ_trial.htm'); ?>
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
 			}
  			}
?>

<div id="Layer1" style="position:absolute; left:264px; top:219px; width:524px; height:450px; z-index:1; background-image: url(file:///C|/Documents%20and%20Settings/user/My%20Documents/Mysite/profile.jpg); layer-background-image: url(file:///C|/Documents%20and%20Settings/user/My%20Documents/Mysite/profile.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div align="center">
      <p>&nbsp;</p>
      <table width="449" border="0">
        <caption align="top">&nbsp;
        </caption>
        <tr>
          <td width="156"><div align="right" class="princprof2">
            <div align="left"><strong>Staffid</strong></div>
          </div></td>
          <td width="10"><span class="princprof4">:</span></td>
          <td width="276"><div align="left" class="princprof2"><?php echo $staffid; ?></div>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Name</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"><?php echo $name; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Email</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $email; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Phone</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $phone; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Mobile</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $mobile; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Maritalstatus</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $maritalstatus; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Permanent Address</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $paddress; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof2">
            <div align="left"><strong>Temporary Address</strong></div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $taddress; ?> </div></td>
        </tr>
        <tr>
          <td height="24" class="style6"><div align="right" class="editstaf2 princprof2 princprof3">
              <div align="left"><span class="princprof4">Date of Birth</span></div>
          </div></td>
          <td class="style6 princprof2 princprof3">:</td>
          <td class="style6">
            <div align="left" class="princprof2">
              <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date.$month.$year; ?>
          </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof4">
            <div align="left">Gender</div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $gender; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof4">
            <div align="left">Religion</div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $religion; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof4">
            <div align="left">Caste</div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $caste; ?> </div></td>
        </tr>
        <tr>
          <td><div align="right" class="princprof4">
            <div align="left">Qualification</div>
          </div></td>
          <td><span class="princprof4">:</span></td>
          <td><div align="left" class="princprof2"> <?php echo $qualification ?> </div></td>
        </tr>
      </table>
    </div>
  </form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
