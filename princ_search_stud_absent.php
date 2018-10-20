<?php 
error_reporting(0);
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
$user=$_COOKIE['user'];
	if($user=="principal")
		include('./princ_trial.htm');
	else
		include('./hod_trial.htm');
		if(isset($_POST['Submit'])){
$date=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
setcookie("date",$date);
setcookie("dept","");
setcookie("sem","");
setcookie("urollno","");
setcookie("name","");
header('Location: princ_search_stud_list.php');
exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.delsub1 {
	color: #00CC33;
	font-weight: bold;
}
.delsub2 {color: #00CC33}
.delsub5 {font-size: 18px}
.style1 {
	font-size: 21px;
	font-weight: bold;
}
.style2 {
	color: #0066FF;
	font-weight: bold;
}
.style5 {color: #0033FF; font-weight: bold; }
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
.studet1 {font-size: 12px}
.style6 {color: #0033FF}
.style7 {font-size: 12px; color: #0033FF; }
-->
</style>
</head>

<body>
<div id="Layer1" style="position:absolute; left:263px; top:242px; width:484px; height:239px; z-index:1; background-image: url(selectstud.jpg); layer-background-image: url(selectstud.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="325" border="0" align="center">
      <caption align="top">
      <span class="style1"> </span>
      </caption>
      <tr>
        <td width="80"><div align="left"><span class="style2">Enter date </span></div></td>
        <td width="5"><span class="style5">:</span></td>
        <td width="226"><span class="style7">DD</span>
          <span class="style6"><input name="date" type="text" class="box" id="date" value="<?php echo date(d); ?>" size="2">
          <span class="studet1">MM
          <input name="month" type="text" class="box" id="month" value="<?php echo date(m); ?>" size="2">
YYYY
<input name="year" type="text" class="box" id="year" value="<?php echo date(Y); ?>" size="4">
        </span></span></td>
      
    </table>
    <p align="center">
      <input type="submit" name="Submit" value="Search">
    </p>
  </form>
</div>
</body>
</html>
