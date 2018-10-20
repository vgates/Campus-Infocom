<?php

if(isset($_POST['add']))
{
 	$type=addslashes($_POST['type']);
	$number=addslashes($_POST['number']);
	$registerno=addslashes($_POST['registerno']);
	$driver=addslashes($_POST['driver']);
  	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
 		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("campusinfocom",$con);
	$query=mysql_query("SELECT * from transport_set where number='$number'");
	$row=mysql_fetch_array($query);
	if($row)
		mysql_query("UPDATE transport_set set type='$type',registerno='$registerno',driver='$driver' where number='$number'");
	else
		mysql_query("INSERT INTO transport_set VALUES('$number','$type','$registerno','$driver')");
		
	echo "<script type=\"text/javascript\">";
	echo "alert(\"Successfully entered!\");";
	echo "document.location.href=\"vehicleset.php\";";
	echo "</script>";
	mysql_close($con);
}
if($_GET['edit']=="Y")
{
	$edit=$_GET['edit'];
	$number=$_GET['number'];
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
 		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("campusinfocom",$con);
	$querydet=mysql_query("SELECT * from transport_set where number='$number'");
	$rowdet=mysql_fetch_array($querydet);
	$type=stripslashes($rowdet['type']);
	$number=stripslashes($rowdet['number']);
	$registerno=stripslashes($rowdet['registerno']);
	$driver=stripslashes($rowdet['driver']);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="btstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style5 {color: #0066FF; font-weight: bold; }
-->
</style>
</head>

<body>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="350" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#0033FF">

  <tr>
    <td bgcolor="#FFFFFF">
      <table width="385" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td colspan="3" background="title.jpg"><div align="center"><strong><?php if($_GET['edit']=="Y") echo ":: EDIT VEHICLE ::"; else echo":: NEW VEHICLE ::"; ?> </strong></div></td>
        </tr>
        <tr>
          <td width="122"><span class="style5">Number</span></td>
          <td width="14"><span class="style5">:</span></td>
          <td width="239" class="style5"><?php if($_GET['edit']=="Y") echo $number; else echo "<input name=\"number\" type=\"text\" class=\"style5\" id=\"number\" value=\"$number\">"; ?></td>
        </tr>
        <tr>
          <td><span class="style5">Type</span></td>
          <td><span class="style5">:</span></td>
          <td><select name="type" class="style5" id="type">
            <option value="0">select</option>
            <option value="BUS" <?php if($type=="BUS") echo "selected"; ?>>Bus</option>
          </select></td>
        </tr>
        <tr>
          <td><span class="style5">Registeredas</span></td>
          <td><span class="style5">:</span></td>
          <td><input name="registerno" type="text" class="style5" id="registerno" value="<?php echo $registerno; ?>"></td>
        </tr>
        <tr>
          <td><span class="style5">Driver</span></td>
          <td><span class="style5">:</span></td>
          <td><input name="driver" type="text" class="style5" id="driver" value="<?php echo $driver; ?>"></td>
        </tr>
      </table>      </td>
  </tr>
</table><br>
 <div align="center">
   <input name="add" type="submit" class="butstyle" id="add" value="Submit">
   <?php if($edit=="Y") { echo "<input type=\"hidden\" name=\"number\" value=\"$number\">"; } ?>
 </div>
</form>
<p>&nbsp;</p>
</body>
</html>
