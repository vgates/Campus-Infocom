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
$dept=$_POST['dept'];
$sem=$_POST['sem'];
setcookie("dept",$dept);
setcookie("sem",$sem);
setcookie("date","");
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
<div id="Layer1" style="position:absolute; left:263px; top:242px; width:484px; height:239px; z-index:1; background-image: url(select.jpg); layer-background-image: url(select.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="200" border="0" align="center">
      <caption align="top">
      <span class="style1"> </span>
      </caption>
      <tr>
        <td><div align="left"><span class="style2">Semester</span></div></td>
        <td><span class="style5">:</span></td>
        <td><select name="sem" class="box" id="sem">
            <option value="0">select</option>
            <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
            <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
            <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
            <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
            <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
            <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
            <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
        </select></td>
      </tr>
      <tr>
        <td><div align="left"><span class="style2">Department</span></div></td>
        <td><span class="style5">:</span></td>
        <td><select name="dept" class="box" id="dept">
            <option value="0">select</option>
            <?php print generate_list($listdept,$dept); ?>
        </select></td>
      </tr>
    </table>
    <p align="center">
      <input type="submit" name="Submit" value="Submit">
    </p>
  </form>
</div>
</body>
</html>
