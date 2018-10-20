<?php
error_reporting(0);
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
else
{
	mysql_select_db("campusinfocom",$con);
//administrator	
	if($user=="administrator")
		include('./trial.htm');
	//principal
	else if($user=="principal")
		include('./princ_trial.htm');
	//hod and staff
	else if(substr($user,0,3)=="jec")
	{	
		$query=mysql_query("SELECT * FROM department WHERE hod='$user'");
		$row = mysql_fetch_array($query);
		if($row)
			include('./hod_trial.htm');
		else
			include('./staff_trial.htm');
	}
$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
mysql_close($con);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
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
.princprof3 {font-weight: bold}
.staff4 {color: #0033FF}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
function generate_list($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
 // $t_dump.="                                ";
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  //$t_dump.="n";
  }
 return $t_dump; 
}
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM department");
while($row = mysql_fetch_array($result))
  {
  $i=$row['dept'];
  $j=$row['name'];
  $listdept[$i]=$j;
  }
mysql_close($con);
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="28%" height="175"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="72%" valign="middle">
      <table width="485" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="alumni_list.php">
            <table width="497" border="0" align="center">
              <tr>
                <td colspan="3" nowrap background="title.jpg"><div align="center" class="princprof3">:: SEARCH ALUMNI :: </div></td>
                </tr>
              <tr>
                <td width="188" nowrap><div align="center"><span class="style1">Pass-out Year</span></div></td>
                <td width="7"><span class="style1">:</span></td>
                <td width="288"><input name="year" type="text" class="box" id="year" size="4"></td>
              </tr>
              <tr>
                <td><div align="center"><span class="style1">Department </span></div></td>
                <td><span class="style1">:</span></td>
                <td><select name="dept" class="box" id="dept">
                    <option>select</option>
                    <?php print generate_list($listdept,$dept); ?>
                </select></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center">
                  <input name="Submit" type="submit" class="butstyle" value="Generate">
                </div></td>
                </tr>
            </table>
            </form></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
