<?php 
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
		if(isset($_POST['search'])){
$name=$_POST['name'];
setcookie("name",$name);
setcookie("sem","");
setcookie("date","");
setcookie("urollno","");
setcookie("dept","");
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
</head>

<body>
<div id="Layer1" style="position:absolute; left:282px; top:264px; width:485px; height:251px; z-index:1; background-image: url(searchstud.jpg); layer-background-image: url(searchstud.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="259" border="0" align="center">
      <tr>
        <td width="105"><span class="style1">Enter Name: </span></td>
        <td width="144"><input name="name" type="text" class="box" id="name2"></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p align="center">
      <input type="submit" name="search" value="Search">
    </p>
  </form>
</div>
</body>
</html>
