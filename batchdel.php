<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
if(isset($_POST['YES']))
{
	$year=$_POST['year'];
	$query=mysql_query("SELECT * FROM student"); 
	while($row=mysql_fetch_array($query))
	{		
		$batch=substr($row['studid'],0,4);
		if($year==$batch)
		{	$total=0;
			$studid=$row['studid'];
			$name=$row['name'];
			$dept=$row['dept'];
			$urollno=$row['urollno'];
			$detquery=mysql_query("SELECT * FROM studet WHERE studid='$studid'");
			$detrow=mysql_fetch_array($detquery) ;
			$paddress=$detrow['paddress'];
			$email=$detrow['email'];
			$phone=$detrow['phone'];
			$extmark = mysql_query("SELECT * FROM extmark_app WHERE studid='$studid'");
			while($extmark_row=mysql_fetch_array($extmark))
			{
				$internal=$extmark_row['internal'];
				$external=$extmark_row['external'];
				$total=$total+$internal+$external;
			}
			$agg=($total/8250)*100;
			$ins="INSERT INTO alumni(studid,name,dept,urollno,paddress,email,phone,aggregate) VALUES ('$studid','$name','$dept','$urollno','$paddress','$email','$phone',$agg)";
			if (!mysql_query($ins,$con))
  				die('Error: ' . mysql_error());
			else
			{
				mysql_query("DELETE from student WHERE studid='$studid'");
				mysql_query("DELETE from studet WHERE studid='$studid'");
				mysql_query("DELETE from attendance2 WHERE studid='$studid'");
				mysql_query("DELETE from intmark WHERE studid='$studid'");
				mysql_query("DELETE from extmark WHERE studid='$studid'");
				mysql_query("DELETE from extmark_app WHERE studid='$studid'");
			}
		}
	}
	$genObj->alertL("BATCH-$year DELETED Succesfully..!","admin_home.php");
}			
if(isset($_POST['NO']))
{
  header('Location: batch_del.php');
  exit();
}
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.dfd {
	color: #0066FF;
	font-weight: bold;
}
.style5 {color: #000000;
	font-size: 9px;
}
body {
	margin-bottom: 0px;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td background="title.jpg"><p align="center" class="style5"><strong>A</strong></p>
        <p align="center" class="style5"><strong>D</strong></p>
        <p align="center" class="style5"><strong>M</strong></p>
        <p align="center" class="style5"><strong>I</strong></p>
        <p align="center" class="style5"><strong>N</strong></p>
        <p align="center" class="style5"><strong>I</strong></p>
        <p align="center" class="style5"><strong>S</strong></p>
        <p align="center" class="style5"><strong>T</strong></p>
        <p align="center" class="style5"><strong>R</strong></p>
        <p align="center" class="style5"><strong>A</strong></p>
        <p align="center" class="style5"><strong>T</strong></p>
        <p align="center" class="style5"><strong>O</strong></p>
        <p align="center" class="style5"><strong>R</strong></p></td>
    <td><div align="center">
        <table width="450" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF" background="title.jpg"><div align="center"><strong>:: BATCH DELETE CONFIRMATION :: </strong></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <?php
$year=$_POST['year'];
  echo "<p align=\"center\" class=\"dfd\"> You are going to delete the datas of students admitted in ".$year."</p>";
  echo "<p align=\"center\" class=\"dfd\"> Do you want to continue?</p>";
  ?>
              <p align="center">
                <input name="YES" type="submit" class="butstyle" value="Yes">
                <input name="NO" type="submit" class="butstyle" value="No">
              </p>
              <p align="center">
                <input type="hidden" name="year" value="<?php echo $year; ?>">
              </p>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
</body>
</html>

