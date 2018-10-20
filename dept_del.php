<?php 
if(isset($_POST['Submit']))
{
$dept=$_POST['dept'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
mysql_query("DELETE FROM department WHERE dept='$dept'");
mysql_close($con);
header("Location: admin_home.php");
}
include('./page.inc');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.deldept1 {
	color: #00CC33;
	font-weight: bold;
}
.deldept2 {color: #00CC33}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div align="center">
      <p class="deldept1"><u>DELETE DEPARTMENT
      </u></p>
    </div>
  <table width="332" border="0" align="center">
    <tr>
      <td width="172"><div align="right" class="deldept2">DEPARTMENT :      </div></td>
      <td width="144"><select name="dept" id="dept">
              <option value="0">select</option>
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
</select></td>
    </tr>
  </table>
  <p align="center">
    <input type="submit" name="Submit" value="Delete">
  </p>
</form>
</body>
</html>