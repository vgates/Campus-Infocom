<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
if(isset($_POST['add']))
{
	if(!empty($_POST['name']))
		$name=$_POST['name'];
	else
		$name=false;
	if($name)
	{
		  $con=mysql_connect("localhost","root","");
		  if(!$con)
		  {
			  die('COULD NOT CONNECT :'.mysql_error());
		  }
		  else
		  {
			 mysql_select_db("campusinfocom",$con);
			 $query="INSERT INTO company(name) VALUES ('$name')";
			 if (!mysql_query($query,$con))
			 {
  				echo "<script type=\"text/javascript\">";
				echo "alert(\"not entered!\");";
				echo "</script>";
 			 }
			 else
			{
				mysql_close();				
				echo "<script type=\"text/javascript\">";
				echo "alert(\"Successfully entered!\");";
				echo "document.location.href=\"company.php\";";
				echo "</script>";
			}
		}
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
		
		if (validate_required(name,"Fill company name..!")==false)
		{
			name.focus();
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
    <td width="29%" height="251" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="71%" align="left" valign="top">
      <div align="left"></div>
      <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td align="center" bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onSubmit="return validate_form(this)">
            <div align="center" class="adddept1"></div>
            <table width="400" height="79" border="0" align="center" bordercolor="#FFFFFF">
              <tr>
                <td height="27" colspan="3" background="title.jpg"><div align="center"><span class="style5">:: ADD COMPANY :: </span></div></td>
              </tr>
              <tr>
                <td height="17" colspan="3"><div align="center" class="style1"><span class="adddept3 adddept1 style2"><span class="style9 style8 addstaf3 addstaf1 style4 style6"><strong>(* mandatory fields)</strong></span></span> </div></td>
              </tr>
              <tr>
                <td width="158" height="27"><div align="right" class="adddept3 style3 princprof3 style1">
                    <div align="left">Company Name*</div>
                </div></td>
                <td width="5"><span class="adddept3 style3 princprof3 style1">:</span></td>
                <td width="223"><input name="name" type="text" class="studprof2 style1 princprof3" id="name"></td>
              </tr>
            </table>
            <p align="center">
              <input name="add" type="submit" class="butstyle" id="add" value="Submit">
            </p>
          </form></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
