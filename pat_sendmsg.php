<?php 
if(isset($_POST['Submit']))
{
 $text=$_POST['news'];
 $dept=$_POST['dept'];
 $sem=$_POST['sem'];
$staffid=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
		mysql_select_db("campusinfocom",$con);
		mysql_query("INSERT INTO news VALUES('$staffid','$dept','$sem','$text')" );
		mysql_close($con);
		header('Location: pat_return.php');
		exit();
		}
}
include('./pat_trial.htm');
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
<style type="text/css">
<!--
.style1 {color: #0066FF}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<center>
  <p>&nbsp;</p>
  <table width="980" border="0" align="center">
    <tr>
      <td width="32%" height="251" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
          <p class="princprof3">&nbsp;</p>
      <p class="princprof3">&nbsp;</p></td>
      <td width="68%" align="left" valign="top">          <div align="left"></div>        <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td align="center" bgcolor="#FFFFFF" background="title.jpg"><span class="princprof3">:: COMPOSE MESSAGE :: </span></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <table width="200" border="0">
                <tr>
                  <td><span class="style1"><strong>To: </strong></span></td>
                  <td><span class="style1"><strong>Department</strong></span></td>
                  <td><span class="style1"><strong>:</strong></span></td>
                  <td><div align="left">
                      <select name="dept" class="box" id="select">
                        <option value="0">Select</option>
                        <?php
$con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die('COULD NOT CONNECT :'.mysql_error());
  }
  else
  {
  mysql_select_db("campusinfocom",$con);
  $result=mysql_query("SELECT * FROM department");
  
  while($row = mysql_fetch_array($result))
  {
  $a=$row['dept'];
  $b=$row['name'];
    echo "<option value=\"$a\">$b</option>";
  }
	mysql_close($con);
  }
?>
                      </select>
                  </div></td>
                  <td><span class="style1"></span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><span class="style1"><strong>Semester</strong></span></td>
                  <td><span class="style1"><strong>:</strong></span></td>
                  <td>
                    <div align="left">
                      <select name="sem" class="box" id="select2">
                        <option value="0">select</option>
                        <option value="1">S1 S2</option>
                        <option value="3">S3</option>
                        <option value="4">S4</option>
                        <option value="5">S5</option>
                        <option value="6">S6</option>
                        <option value="7">S7</option>
                        <option value="8">S8</option>
                      </select>
                  </div></td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <div align="center"></div>
              <div align="center"></div>
              <p align="center">
                <textarea name="news" cols="50" rows="4" class="box" id="textarea"></textarea>
              </p>
              <p align="center">
                <input name="Submit" type="submit" class="butstyle" value="Send Message">
              </p>
            </form></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</center>
</body>
</html>
