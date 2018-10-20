<?php
$i=1;
while($i<=100)
{
  $sone="sone".$i;
  $stwo="stwo".$i;
  $aone="aone".$i;
  $atwo="atwo".$i;
  $norm="norm".$i;
  $studid=$_POST["$i"];
  $subid=$_COOKIE['subid'];  
  $ses1=$_POST["$sone"];
  if($ses1==NULL)
  	$ses1=999;
  else if($ses1=='A' || $ses1=='a')
  	$ses1=65;
  $ses2=$_POST["$stwo"];
  if($ses2==NULL)
  	$ses2=999;
  else if($ses2=='A' || $ses2=='a')
  	$ses2=65;
  $ass1=$_POST["$aone"];
  if($ass1==NULL)
  	$ass1=999;
  $ass2=$_POST["$atwo"];
  if($ass2==NULL)
  	$ass2=999;
  $normalized=$_POST["$norm"];
  if($normalized==NULL)
  	$normalized=999;
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }
  
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM intmark WHERE studid='$studid' AND subid='$subid'");
  $row=mysql_fetch_array($query);
  if($row)
  {
  	mysql_query("UPDATE intmark SET ses1=$ses1 WHERE studid='$studid' AND subid='$subid'");
  	mysql_query("UPDATE intmark SET ses2=$ses2 WHERE studid='$studid' AND subid='$subid'");
  	mysql_query("UPDATE intmark SET ass1=$ass1 WHERE studid='$studid' AND subid='$subid'");
  	mysql_query("UPDATE intmark SET ass2=$ass2 WHERE studid='$studid' AND subid='$subid'");
  	mysql_query("UPDATE intmark SET normalized=$normalized WHERE studid='$studid' AND subid='$subid'");
 }
 else
 {
 	$query=mysql_query("INSERT INTO intmark(studid,subid,ses1,ses2,ass1,ass2,normalized) VALUES ('$studid','$subid',$ses1,$ses2,$ass1,$ass2,$normalized)");
  }

 }
mysql_close($con);
$i++;
}
header('Location: int_mark_report.php');
exit();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style3 {color: #0033FF; font-weight: bold; }
.style4 {color: #0033FF}
.style5 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<link href="box.css" rel="stylesheet" type="text/css">
</head>

<body>
<p>

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>

<p>&nbsp;</p>