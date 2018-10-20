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
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
.style1 {color: #0066FF}
.adddept1 {	font-size: 18px;
	font-weight: normal;
	color: #00CC33;
}
.style5 {	color: #000000;
	font-weight: bold;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {
	color: #CCCCCC;
	font-size: 9px;
}
-->
</style>
<script type="text/javascript">
function validate_required(field,alerttxt)
{
	with (field)
	{
		if (value==null||value==""||value==0)
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
		
		if (validate_required(dept,"Select department..!")==false)
		{
			dept.focus();
			return false;
		}		
		if (validate_required(sem,"Select semester..!")==false)
		{
			dept.focus();
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
    <td width="30%" height="213" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
    </td>
    <td width="70%" align="left" valign="top">
      <div align="left"></div>
      <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td align="center" bgcolor="#FFFFFF"><form name="form1" method="post" action="stud_company_list.php" onSubmit="return validate_form(this)">
            <div align="center" class="adddept1"></div>
            <table width="400" height="108" border="0" align="center" bordercolor="#FFFFFF">
              <tr>
                <td height="27" colspan="3" background="title.jpg"><div align="center"><span class="style5">:: ADD PLACED STUDENTS:: </span></div></td>
              </tr>
              <tr>
                <td height="17" colspan="3"><div align="center" class="style1"><span class="adddept3 adddept1 style2"><span class="style9 style8 addstaf3 addstaf1 style4 style6"><strong>(* mandatory fields)</strong></span></span> </div></td>
              </tr>
              <tr>
                <td width="158" height="27"><div align="right" class="adddept3 style3 princprof3 style1">
                    <div align="left">Department</div>
                </div></td>
                <td width="5"><span class="adddept3 style3 princprof3 style1">:</span></td>
                <td width="223"><select name="dept" class="studprof2" id="dept">
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
              <tr>
                <td height="27"><span class="style1 princprof3">Semester</span></td>
                <td><span class="style1 princprof3">:</span></td>
                <td><span class="style1 princprof3">
                  <select name="sem" class="studprof2" id="sem">
                    <option value="0">select</option>
                    <option value="1">S1S2</option>
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
            <p align="center">
              <input name="add" type="submit" class="butstyle" id="add" value="Generate">
            </p>
          </form></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
