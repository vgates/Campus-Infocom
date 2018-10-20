<?php
if(isset($_GET['sub'])=="del")
{
	$number=$_GET['number'];
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
 		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("campusinfocom",$con);
	mysql_query("DELETE from transport_set where number='$number'");
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
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="900" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="6" background="../title.jpg"><div align="center"><strong>:: VEHICLE DETAILS :: </strong></div></td>
  </tr>
  <tr bgcolor="#0066FF">
    <td width="65"><div align="center" class="style1">Edit</div></td>
    <td width="65"><div align="center" class="style1">Del</div></td>
    <td width="106"><div align="center" class="style1">Number</div></td>
    <td width="212"><div align="center" class="style1">Type</div></td>
    <td width="186"><div align="center" class="style1">Registered as </div></td>
    <td width="247"><div align="center" class="style1">Driver</div></td>
  </tr>
  <?php
  	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
 		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("campusinfocom",$con);
	$query=mysql_query("SELECT * FROM transport_set");
	$num=mysql_num_rows($query);
	while($row=mysql_fetch_array($query))
	{
	  	$type=$row['type'];
		$number=$row['number'];
		$registerno=$row['registerno'];
		$driver=$row['driver'];
		echo "<tr>
    		<td><div align=\"center\"><a href=\"vehiclesetnew.php?edit=Y&amp;number=$number\"><img src=\"btn_edit.gif\" width=\"65\" height=\"20\" border=\"0\"></a></div></td>
		    <td><div align=\"center\"><a href=\"vehicleset.php?sub=del&amp;number=$number\"><img src=\"btn_delete.gif\" width=\"65\" height=\"20\" border=\"0\"></a></div></td>
		    <td><div align=\"center\">$number</div></td>
		    <td><div align=\"center\">$type</div></td>
		    <td><div align=\"center\">$registerno</div></td>
		    <td><div align=\"center\">$driver</div></td>
		  </tr>";
	}
	if($num==0)
	{
				echo '<tr>
		    <td colspan="6"><div align="center">No results found..!</div></td>
		  </tr>';
	}
  ?>
</table>
<form name="form1" method="post" action="vehiclesetnew.php">
  <div align="center">
    <input name="new" type="submit" class="butstyle" id="new" value="Add New Vehicle">
  </div>
</form>
<p>&nbsp;</p>
</body>
</html>
