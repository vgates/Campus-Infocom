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
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function validate_required(field,alerttxt)
{
	with (field)
	{
		if (value==null||value=="")
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
		
		if (validate_required(batch,"Fill batch..!")==false)
		{
			batch.focus();
			return false;
		}
		if (validate_required(aggregate,"Fill aggregate..!")==false)
		{
			aggregate.focus();
			return false;
		}
		if (validate_required(arrears,"Fill number of arrears..!")==false)
		{
			arrears.focus();
			return false;
		}
		if (validate_required(placed,"No of placements allowed..!")==false)
		{
			placed.focus();
			return false;
		}
		/*if (validate_required(cse,"Check CET Roll No!")==false)
		{
			cse.focus();
			return false;
		}

		if (validate_required(ece,"Check CET Roll No!")==false)
		{
			ece.focus();
			return false;
		}*/
	}
}
</script>
<style type="text/css">
<!--
.adddept1 {font-size: 18px;
	font-weight: normal;
	color: #00CC33;
}
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
.style6 {color: #0066FF}
.style5 {color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="27%" height="251" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="73%" align="left" valign="top">      <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="searchpat_list.php" onSubmit="return validate_form(this)">
              <table width="400" border="0" align="center" cellpadding="1" cellspacing="1">
                <tr>
                  <td colspan="3" background="title.jpg"><div align="center"><strong>:: GENERATE STUDENT :: </strong></div></td>
                </tr>
                <tr class="style1">
                  <td height="23">Batch</td>
                  <td>:</td>
                  <td class="style1" nowrap><input name="batch" type="text" id="batch2"></td>
                </tr>
                <tr>
                  <td width="215" height="23"><span class="style1">Departments</span></td>
                  <td width="5"><span class="style1">:</span></td>
                  <td width="370" class="style1">
                    <?php $con = mysql_connect("localhost","root","");
					if (!$con)
 					{
 						 die('Could not connect: ' . mysql_error());
					}
					mysql_select_db("campusinfocom", $con);
					$result = mysql_query("SELECT * FROM department");
					$count=1;
					while($row = mysql_fetch_array($result))
 					 {
 						 $i=$row['dept'];
 						 $j=$row['name'];
 						 echo "<input type=\"checkbox\" name=\"$i\" value=\"$i\"> ".$i."&nbsp;&nbsp;&nbsp;"; 
						 $count++;
						if($count==4)
							echo "<br>";
							
 					 }
					mysql_close($con);
					
				?>
                  </td>
                </tr>
                <tr class="style1">
                  <td>Aggregate in % </td>
                  <td>:</td>
                  <td><input name="aggregate" type="text" id="aggregate2"></td>
                </tr>
                <tr class="style1">
                  <td nowrap>Number of arrears allowed </td>
                  <td>:</td>
                  <td><input name="arrears" type="text" id="arrears2"></td>
                </tr>
                <tr class="style1">
                  <td>Placements allowed </td>
                  <td>:</td>
                  <td><input name="placed" type="text" id="placed2"></td>
                </tr>
              </table>
              <p align="center">
                <input name="Submit" type="submit" class="butstyle" id="Submit2" value="Generate">
              </p>
          </form></td>
        </tr>
                </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
