<?php
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./staff_trial.htm');
if(isset($_POST['Confirm']))
{
$date=$_COOKIE['date'];
$hour=$_COOKIE['hour'];
$subject=$_COOKIE['subid'];
$staffid=$_COOKIE['user'];
$sem=$_COOKIE['sem'];
$dept=$_COOKIE['dept'];

	if($subject && $hour && $staffid && $date)
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$query = mysql_query("SELECT * FROM attendance1 WHERE hour='$hour' AND date='$date'");
			$kodi=0;
			while($athilundo=mysql_fetch_array($query))
			{
				$subj=$athilundo['subid'];
				$query2 = mysql_query("SELECT * FROM subjects WHERE subid='$subj'");
				$row_subj=mysql_fetch_array($query2);
				if($dept==$row_subj['dept'] && $sem==$row_subj['sem'])
					$kodi=1;
			}
			if($kodi==1)
			{
				echo "<script type=\"text/javascript\">";
				echo "alert(\"Already entered!\");";
				echo "document.location.href=\"att_list.php\";";
				echo "</script>";
				
			}
			else
			{
				$query="INSERT INTO attendance1(date,hour,subid,staffid) VALUES ('$date','$hour','$subject','$staffid')";
				if (!mysql_query($query,$con))
				{
					die('Error: ' . mysql_error());
				}
				else
				{
					//echo ' Table Attendance1 Entered';
				}
				$result = mysql_query("SELECT * FROM attendance1 WHERE hour='$hour'");
				while($row = mysql_fetch_array($result))
			    {
					$q=$row['subid'];
					if($q==$subject)
					 	$id=$row['id'];
  				}

				for($x=0;$x<=100;$x++)
				{	
					$j=$_POST["$x"];
					if($j!=NULL)
					{
						$query1="INSERT INTO attendance2(id,studid) VALUES ('$id','$j')";
						if (!mysql_query($query1,$con))
						{
							die('Error: ' . mysql_error());
						}
						else
						{
							//echo ' Table Attendance2 Entered';
						}
					}
				}
				echo "<script type=\"text/javascript\">";
				echo "alert(\"Sucessfully Entered!\");";
				echo "document.location.href=\"att_main.php\";";
				echo "</script>";
				mysql_close($con);	
			}
		}	
	//header('Location: att_main.php');
	//exit();
	}
	else
	{	
		header('Location: att_list.php');
		exit();
	}
}	
if(isset($_POST['Back']))
{
header('Location: att_list.php');
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
.style8 {font-size: 16px; color: #0066FF; font-weight: bold; }
.table {
	font-size: 16px;
	color: #00CCFF;
}
.cell {
	font-size: 16px;
	color: #0000CC;
}
.title {color:#000000; font-weight:bold; }
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div align="center">
  <p>&nbsp;</p>
<p>&nbsp;</p>
  <table width="200" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
    <tr>
      <td bgcolor="#FFFFFF"><?php
if(!empty($_POST['date']))
$date=$_POST['date'];
if(!empty($_POST['month']))
$month=$_POST['month'];
if(!empty($_POST['year']))
$year=$_POST['year'];
$date=$year."-".$month."-".$date;
setcookie("date",$date);
if(!empty($_POST['hour']))
{
$hour=$_POST['hour'];
setcookie("hour",$hour);
}
if(!empty($_POST['subid']))
{
$subject=$_POST['subid'];
setcookie("subid",$subject);
}
$staffid=$_COOKIE['user'];
if($subject && $hour && $staffid && $date)
{
$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	else
	{
		mysql_select_db("campusinfocom", $con);
		$res = mysql_query("SELECT * FROM subjects WHERE subid='$subject'");
		$row_res=mysql_fetch_array($res);
		$subname=$row_res['name'];
		echo '<center>';
		echo "<p class=\"cell\"><b>Subject: </b>".$subname."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<b>Hour: </b>".$hour."</p>";
		echo "<table border='0' width='400'>
		<tr>
		<th class=\"title\" colspan='2' background='title.jpg'>:: ABSENTEES ::</th>
		</tr>
		<tr bgcolor=\"#0000FF\">
		<th class=\"table\">Roll No.</th>
		<th class=\"table\">Name  </th>
		</tr>";
		$flag=0; 		
		for($x=0;$x<=100;$x++)
		{	
			$j=$_POST["$x"];
		    echo "<input name=\"$x\" type=\"hidden\" id=\"$x\" value=\"$j\">";
			if($j!=NULL)
			{				
				$result = mysql_query("SELECT * FROM student WHERE studid='$j'");
				$row=mysql_fetch_array($result);
				if($flag==0)
					echo "<tr align='center'>";
				else
					echo "<tr bgcolor=\"#00CCFF\" align='center'>";
				echo "<td class=\"cell\">".$row['rollno']."</td>";
				echo "<td class=\"cell\" align=\"center\">".$row['name']."</td>";
				echo "</tr>";		
	
				if($flag==0)
					$flag=$flag+1;
				else
					$flag=$flag-1; 			
			}	
		}
		echo "</table>";
		echo '</center>';
		mysql_close($con);
	}
}		
?></td>
    </tr>
  </table>
  <p>
    <input name="Confirm" type="submit" class="butstyle" id="Confirm2" value="Confirm">
    <input name="Back" type="submit" class="butstyle" id="Back3" value="Back">
</p>
</div>
</form>
</body>
</html>