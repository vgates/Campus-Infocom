<?php 
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
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
include('./pat_trial.htm');
$sem=$_POST['sem'];
$dept=$_POST['dept'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.attlist2 {color: #0066FF}
.attlist3 {color: #0066FF; font-weight: bold; }
.style6 {font-size: 16px; font-weight: bold; color: #0033FF; }
.ff {
	color: #00CCFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.princprof2 {color: #0066FF}
.princprof3 {font-weight: bold}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function validate_required(field,alerttxt)
{
	with (field)
	{
		if (value=="0")
		{
			alert(alerttxt);return false;
		}
		else
		{
			return true;
		}
	}
}

function validate_form(thisform)
{
	with(thisform)
	{
		
		if (validate_required(company,"Select company..!")==false)
		{
			company.focus();
			return false;
		}
	}
}
</script>

</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="15%" height="175" rowspan="2" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="85%" valign="top" background="title.jpg">    <p align="center" class="princprof3">:: ADD PLACED STUDENTS :: </p></td>
  </tr>
  <tr>
    <td valign="top"><form name="form1" method="post" action="stud_company_confirm.php" onSubmit="return validate_form(this)">
      <table width="222" border="0" align="center">
        <tr>
          <td width="49"><span class="style6">Company:</span></td>
          <td width="163"><span class="style6">
            <select name="company" class="box" id="select3">
              <option value="0">select</option>
              <?php 
				$con = mysql_connect("localhost","root","");
					if (!$con)
 					{
 						 die('Could not connect: ' . mysql_error());
					}
					mysql_select_db("campusinfocom", $con);
					$result = mysql_query("SELECT * FROM company");
					while($row = mysql_fetch_array($result))
 					 {
 						 $id=$row['id'];
 						 $name=$row['name'];
   						 echo "<option value=\"$id\">$name</option>";
 					 }
					mysql_close($con);
				
				?>
            </select>
          </span></td>
        </tr>
      </table>
      <p align="center">
        <?php
$x=number;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$student = mysql_query("SELECT * FROM student ORDER BY name");
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Click Placed Cadets</th>
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
</tr>";
$flag=0;
while($row = mysql_fetch_array($student))
  {
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{
		$i=$row['rollno'];
		$k=$row['studid'];
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<td>"."<input type=\"checkbox\" name=\"$i\" value=\"$k\">"."</td>";		
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
?>
      </p>
      <p align="center">
        <input name="Submit" type="submit" class="butstyle" value="Submit">
</p>
    </form></td>
  </tr>
</table>
</body>
</html>
