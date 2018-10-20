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
/*if(isset($_POST['delete']))
{
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{	
 		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("campusinfocom",$con);
	$result = mysql_query("SELECT * FROM company");
	$no=mysql_num_rows($result);
	for($i=1; $i<=$no; $i++)
	{
		$id=$_POST["$i"];
		if($_POST["$i"])
			mysql_query("DELETE from company WHERE id='$id'")l
	}
}*/
if(isset($_POST['Submit2']))
{
	header('Location: edit_company.php');
	exit();
}	
if(isset($_POST['Submit']))
{
	header('Location: add_company.php');
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
.adddept1 {font-size: 18px;
	font-weight: normal;
	color: #00CC33;
}
.princprof3 {font-weight: bold}
.studprof2 {color: #0033FF}
.style1 {color: #0066FF}
.style5 {color: #000000;
	font-weight: bold;
}
.style7 {font-weight: bold; color: #FFFFFF; }
.cell {font-weight: bold; color: #0033FF; }
.style8 {color: #000099}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style9 {color: #FFFFFF}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="30%" height="251" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="studprof2"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p></td>
    <td width="70%" align="center" valign="top">
      <div align="left"></div>
      
      <div align="left"></div>      <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td align="center" bgcolor="#FFFFFF">
              <div align="center" class="adddept1"></div>
			            <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <table width="479" height="60" border="0" align="center" bordercolor="#FFFFFF">
			  
                <tr>
                  <td height="27" colspan="2" background="title.jpg"><div align="center"><span class="style5">:: RECRUITING COMPANIES :: </span></div></td>
                </tr>
                <tr bgcolor="#0066FF">
                  <td width="91" height="27"><div align="right" class="adddept3 style3 princprof3 style1">
                      <div align="left" class="style8">
                        <div align="center" class="style9">S/No</div>
                      </div>
                  </div></td>
                  <td width="378"><div align="center"><span class="style7">Name</span></div></td>
                </tr>
                <?php 
				$con = mysql_connect("localhost","root","");
					if (!$con)
 					{
 						 die('Could not connect: ' . mysql_error());
					}
					mysql_select_db("campusinfocom", $con);
					$result = mysql_query("SELECT * FROM company");
					$color=0;
					while($row = mysql_fetch_array($result))
 					 {
 						 if($color==0)
							echo "<tr class=\"cell\">";
						else
							echo "<tr class=\"cell\" bgcolor=\"#00CCFF\">";
						 $id=$row['id'];
 						 $name=$row['name'];
						 echo "
                  			<td align=\"center\">$id</td>
                  			<td align=\"left\">$name</td>                  			
                			</tr>"; 
						if($color==0)
							$color=$color+1;
						else
							$color=$color-1;
 					 }
					mysql_close($con);				
				?>
              </table>              
    
                <p align="center">
                  <input name="Submit2" type="submit" class="butstyle" value="Edit">
                  <input name="Submit" type="submit" class="butstyle" value="Add Company">
                </p>
            </form>
          </td>
        </tr>
        </table></td>
  </tr>
</table>
</body>
</html>
