<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./princ_trial.htm');
if(isset($_POST['Submit'])){
$staffid="principal";
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
		mysql_select_db("campusinfocom",$con);
		$query=mysql_query("SELECT * FROM news WHERE staffid='$staffid'");
		
		$i=0;
		while($row=mysql_fetch_array($query))
		{
			$i=$i+1;
			$j=$_POST["$i"];
			
			if($j!=NULL)
			{
				$text=$row['text'];
				mysql_query("DELETE FROM news WHERE text='$text'");
			}
		}
		mysql_close($con);
}
}	
$user=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
 	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom",$con);
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
.style1 {
	font-size: 36px;
	font-weight: bold;
}
.ff {
	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0066FF;
	font-weight: bold;
}
.butname {
	color: #00CCFF;
	background-color: #0000CC;
	font-size: 16px;
	font-weight: bold;
	width: 300px;
	font-family: "Times New Roman", Times, serif;
	cursor: hand;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.princprof3 {font-weight: bold}
.style2 {	color: #0066FF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="21%" height="175" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="79%" valign="top">  <table width="580" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td><form name="form2" method="post" action="princ_sendmsg.php">
            <div align="center">
              <input name="Submit2" type="submit" class="butstyle" value="Compose Message">
            </div>
          </form>
          <form name="form1" method="post" action="">
            <div align="center">
              <?php
 $staffid="principal";
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
		mysql_select_db("campusinfocom",$con);
		$query=mysql_query("SELECT * FROM news WHERE staffid='$staffid'");
		$i=0;
		echo "<table border='0'>
		<tr bgcolor=\"#0099FF\">
		<th class=\"ff\">Delete</th>
		<th class=\"ff\">To HOD of</th>
		<th class=\"ff\">Message</th>
		</tr>";
		$flag=0;
		while($row=mysql_fetch_array($query))
		{
			$i=$i+1;
			if($flag==0)
				echo "<tr>";
			else
				echo "<tr bgcolor=\"#BFDFFF\">";
			echo "<td>"."<input type=\"checkbox\" name=\"$i\" value=\"checkbox\">"."</td>";
			echo "<td class=\"cell\">".$row['dept']."</td>";
			echo "<td class=\"cell\">".$row['text']."</td>";			
			echo "</tr>";	
			if($flag==0)
				$flag=$flag+1;
			else
				$flag=$flag-1;
		}
		echo "</table>";
		mysql_close($con);

	}
?>
            </div>
            <div align="left">
              <p align="center">
                <input name="Submit" type="submit" class="butstyle" value="Delete">
              </p>
            </div>
            <p>&nbsp;</p>
          </form>          </td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
