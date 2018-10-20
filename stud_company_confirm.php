<?php
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./pat_trial.htm');
$company=$_POST['company'];

if(isset($_POST['Confirm']))
{
		$company=$_POST['company'];

		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("campusinfocom", $con);
		for($x=0;$x<=100;$x++)
		{	
			$j=$_POST["$x"];
			if($j!=NULL)
			{
				$query1="INSERT INTO placedstud(id,studid) VALUES ('$company','$j')";
				if (!mysql_query($query1,$con))
				{
					die('Error: ' . mysql_error());
				}
				else
				{
					//echo ' Table placedstud Entered';
				}
			}
		}
		echo "<script type=\"text/javascript\">";
		echo "alert(\"Sucessfully Entered!\");";
		echo "document.location.href=\"stud_company.php\";";
		echo "</script>";
		mysql_close($con);	
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
<style type="text/css">
<!--
.adddept1 {font-size: 18px;
	font-weight: normal;
	color: #00CC33;
}
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
.style1 {color: #0066FF}
-->
</style>
</head>

<body>

<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="26%" height="251" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="74%" align="left" valign="top">
      <div align="left">      </div>
	  
      <table width="520" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div align="center">
              <p>
                <?php
$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	else
	{
		mysql_select_db("campusinfocom", $con);
		$res = mysql_query("SELECT * FROM company WHERE id='$company'");
		$row_res=mysql_fetch_array($res);
		$companyname=$row_res['name'];

		echo "<table border='0' width='500'>
		<tr>
		<th class=\"title\" colspan='2' background='title.jpg' nowrap>:: ". $companyname ." PLACED CADETS ::</th>
		</tr>
		<tr bgcolor=\"#0000FF\"  align='center'>
		<th class=\"table\">Department</th>
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
				echo "<td class=\"cell\">".$row['dept']."</td>";
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
?>
              </p>
              <p>
                <input name="Confirm" type="submit" class="butstyle" id="Confirm3" value="Confirm">
                <input type="hidden" name="company" value="<?php echo $company; ?>">
              </p>
            </div>
          </form></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>