<?php
if(isset($_POST['Submit']))
{
	setcookie("staffid", $_POST['staffid']);
	header("Location: hod_staff_profile.php");
	exit();
}
include('./hod_trial.htm');
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
<div id="Layer1" style="position:absolute; left:263px; top:242px; width:483px; height:239px; z-index:1; background-image: url(selectstaff.jpg); layer-background-image: url(selectstaff.jpg); border: 1px none #000000;">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="200" border="0" align="center">
      <caption align="top">
      <span class="style1"> </span>
      </caption>
      <tr>
        <td><span class="style2">Department</span></td>
        <td><span class="staff4"><strong>:</strong></span></td>
        <td><select name="dept" class="box" id="dept" onChange="return submitForm('dept')">
            <option value="0">select</option>
            <?php print generate_list($listdept,$dept); ?>
        </select></td>
      </tr>
      <tr>
        <td><span class="style2">Select Staff </span></td>
        <td><span class="staff4"><strong>:</strong></span></td>
        <td><select name="staffid" class="box" id="staffid">
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
        </select></td>
      </tr>
    </table>
    <p align="center">
      <input name="sendtype" type="hidden" id="sendtype">
      <input type="submit" name="Submit" value="Submit">
    </p>
  </form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
