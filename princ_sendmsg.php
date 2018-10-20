<?php 
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
if(isset($_POST['Submit']))
{
if(!empty($_POST['dept'])){
 $text=$_POST['news'];
 $dept=$_POST['dept'];
$staffid="principal";
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
		mysql_select_db("campusinfocom",$con);
		mysql_query("INSERT INTO news VALUES('$staffid','$dept','0','$text')" );
		mysql_close($con);
		header('Location: princ_return.php');
		exit();
		}
	}
	else
		$msg="Select a recepient....!";
}
include('./princ_trial.htm');
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
.style1 {
	color: #0066FF;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0066FF;
	font-weight: bold;
}
.princprof3 {font-weight: bold}
.studet1 {font-size: 12px}

-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<center>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <table width="980" border="0" align="center">
    <tr>
      <td width="26%" height="175"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
      </td>
      <td width="74%" valign="top">
        <table width="331" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <table width="293" border="0" align="center" cellspacing="0">
                <tr>
                  <td colspan="2" nowrap background="title.jpg"><div align="center"><span class="princprof3">:: COMPOSE MESSAGE :: </span></div></td>
                  </tr>
                <tr>
                  <td width="52" nowrap><div align="center"><span class="style1">To :</span></div></td>
                  <td width="237"><div align="left">
                      <select name="dept" class="box" id="select2">
                        <option value="0">Select</option>
                        <option value="pat">PAT officer</option>
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
  $b="HOD of ".$row['name'];
    echo "<option value=\"$a\">$b</option>";
  }
	mysql_close($con);
  }
?>
                      </select>
                  </div></td>
                </tr>
                <tr>
                  <td colspan="2" nowrap><textarea name="news" cols="50" rows="4" class="box" id="textarea2"></textarea></td>
                  </tr>
                <tr>
                  <td colspan="2" nowrap><div align="center">
                    <input name="Submit" type="submit" class="butstyle" value="Send Message">
                  </div></td>
                  </tr>
              </table>
              </form></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p><p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?php echo "<p class=\"cell\">".$msg."</p>"; ?>
</center>
</body>
</html>
