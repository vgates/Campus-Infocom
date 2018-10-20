<?php 
if(isset($_POST['Submit']))
{
 $text=$_POST['news'];
// $dept=$_POST['dept'];
$staffid=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
		mysql_select_db("campusinfocom",$con);
		$query=mysql_query("SELECT * FROM staff WHERE staffid='$staffid'");
		$row=mysql_fetch_array($query);
		$dept=$row['dept'];
		mysql_query("INSERT INTO news VALUES('$staffid','$dept','0','$text')" );
		mysql_close($con);
		header('Location: hod_return.php');
		exit();
		}
}
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
.princprof3 {font-weight: bold}
-->
</style>
</head>

<body>
<center>
  <p>&nbsp;</p>
  <table width="980" border="0" align="center">
    <tr>
      <td width="26%" height="175"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
      <td width="74%" valign="top">
        <table width="329" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <table width="200" border="0" align="center">
                <tr>
                  <td background="title.jpg"><div align="center" class="princprof3">:: COMPOSE MESSAGE to STAFF :: </div></td>
                </tr>
                <tr>
                  <td><textarea name="news" cols="50" rows="4" class="box" id="textarea2"></textarea></td>
                </tr>
              </table>
              <p align="center">
                <input type="submit" name="Submit" value="Send Message">
              </p>
            </form></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</center>
</body>
</html>
