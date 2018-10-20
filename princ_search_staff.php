<?php
error_reporting(0);
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
if(isset($_POST['Submit']))
{
	setcookie("staffid", $_POST['staffid']);
	header("Location: princ_staff_profile.php");
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
.staff1 {
	color: #00CC33;
	font-weight: normal;
	font-size: 18px;
}
.staff2 {
	font-weight: normal;
	color: #00CC33;
	font-size: 16px;
}
.staff3 {color: #00CC33}
.staff4 {color: #0033FF}
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style2 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
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
.studet1 {font-size: 12px}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
function generate_list($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
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
$dept=$_POST['dept'];
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="28%" height="175"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
    </td>
    <td width="72%" valign="middle">
      <table width="485" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="481" border="0" align="center">
              <tr>
                <td colspan="3" background="title.jpg"><div align="center" class="princprof3">:: SEARCH STAFF :: </div></td>
                </tr>
              <tr>
                <td width="144"><div align="center"><span class="style2">Department</span></div></td>
                <td width="5"><span class="staff4"><strong>:</strong></span></td>
                <td width="318">
                    <div align="left">
                      <select name="dept" class="box" id="dept" onChange="return submitForm('dept')">
                        <option value="0">select</option>
                        <?php print generate_list($listdept,$dept); ?>
                      </select>
                    </div></td>
              </tr>
              <tr>
                <td><div align="center"><span class="style2">Select Staff </span></div></td>
                <td><span class="staff4"><strong>:</strong></span></td>
                <td>
                    <div align="left">
                      <select name="staffid" class="box" id="staffid">
                        <option value="0">select</option>
                        <?php			
			if(!empty($_POST['dept'])){
			$con = mysql_connect("localhost","root","");
			if (!$con)
 			{
 			 die('Could not connect: ' . mysql_error());
  			}
			else
			{
			mysql_select_db("campusinfocom", $con);

			$result = mysql_query("SELECT * FROM staff WHERE dept='$dept' ORDER BY name");

			while($row = mysql_fetch_array($result))
 			{
			 $c=$row['staffid'];
			 $d=$row['name'];
 			 echo "<option value=\"$c\">$d</option>";
			 echo "<br />";
 			 }
			mysql_close($con);
			}}
?>
                      </select>
                    </div></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center">
                    <input name="sendtype" type="hidden" id="sendtype">
                    <input name="Submit" type="submit" class="butstyle" value="Submit">
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
