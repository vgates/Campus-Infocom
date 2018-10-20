

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #0066FF}
.style4 {font-weight: bold}
.style5 {color: #0066FF; font-weight: bold; }
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
				$gname=$row['gname'];
				$relation=$row['relation'];
				$occupation=$row['occupation'];
				$contact_no=$row['contact_no'];
 			 }
  			}
?>
<div id="Layer1" style="position:absolute; left:247px; top:113px; width:524px; height:601px; z-index:1; background-image: url(file:///C|/Documents%20and%20Settings/user/My%20Documents/Mysite/profilemed.jpg); layer-background-image: url(file:///C|/Documents%20and%20Settings/user/My%20Documents/Mysite/profilemed.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table width="410" border="0" align="center">
      <caption align="top">
      <strong><br>
      <br>
      <br>
      </strong>
                  </caption>
      <tr>
        <td width="156"><div align="left" class="style1"><strong>Studentid</strong></div></td>
        <td width="10"><span class="style1"><strong>:</strong></span></td>
        <td width="222"><span class="style5"><?php echo $studid; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Name</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $name; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">University roll no </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $urollno; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Department</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $dept; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Semester</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $sem; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Class roll no </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $classrollno; ?></span></td>
      </tr>
      <tr>
        <td height="24" class="style6"><div align="right" class="editstaf2 style1 style4">
            <div align="left">Date of Birth</div>
        </div></td>
        <td class="style6"><span class="style1"><strong>:</strong></span></td>
        <td class="style6">
          <div align="left" class="style5"><span class="style9">
            <?php $date=substr($dob,8,2);$month=substr($dob,5,2);$year=substr($dob,0,2);
		  echo $date."-".$month."-".$year;
		  ?>
        </span> </div></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Gender</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $gender; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Permanent Address </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $paddress; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Temporary Address </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $taddress; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Phone no </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $phone; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Email</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $email; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Religion</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $religion; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Caste</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $caste; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Guardian name </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $gname; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Relation</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $relation; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Occupation</div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $occupation; ?></span></td>
      </tr>
      <tr>
        <td><div align="left" class="style5">Contact no </div></td>
        <td><span class="style1"><strong>:</strong></span></td>
        <td><span class="style5"><?php echo $contact_no; ?></span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
</div>
</body>
</html>
