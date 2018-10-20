<?php 
include('./staff_trial.htm');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.attmain {color: #00CC33}
.attmain1 {color: #0066FF}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="int_mark.php">
  <p align="center" class="attmain style2">&nbsp;</p>
  <p align="center" class="attmain style2 attmain1"><strong><u>ATTENDANCE PAGE</u></strong></p>
  <table width="200" border="0" align="center">
    <tr>
      <th scope="row"><span class="style2 attmain attmain1">Department:</span></th>
      <td><span class="style2">
        <select name="dept" id="dept">
          <option value="0">Select</option>
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
        </select>
      </span></td>
    </tr>
    <tr>
      <th scope="row"><span class="attmain1">Semester:</span></th>
      <td><span class="style2">
        <select name="sem" id="select">
		<option value="0">select</option>
          <option value="1">S1&amp;S2</option>
          <option value="3">S3</option>
          <option value="4">S4</option>
          <option value="5">S5</option>
          <option value="6">S6</option>
          <option value="7">S7</option>
          <option value="8">S8</option>          
        </select>
      </span></td>
    </tr>
  </table>
  <p align="center" class="style2">
    <input type="submit" name="Submit" value="Generate">
  </p>
</form>
</body>
</html>
