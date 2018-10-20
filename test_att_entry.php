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
			$athilundo=mysql_fetch_array($query);
			if($athilundo)
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
-->
</style>
</head>

<body>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div align="center">
  <p>&nbsp;</p>
  <?php
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
		echo "<table border='0'>
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
					echo "<tr>";
				else
					echo "<tr bgcolor=\"#00CCFF\">";
				echo "<td class=\"cell\">".$row['rollno']."</td>";
				echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";
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
?>
  <p>&nbsp;</p>
    <input name="Confirm" type="submit" id="Confirm" value="Confirm">
    <input name="Back" type="submit" id="Back" value="Back">
  </div>
</form>
</body>
</html>