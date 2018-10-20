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
else
{
	mysql_select_db("campusinfocom",$con);
	//administrator	
	if($user=="administrator")
		include('./trial.htm');
	//principal
	else if($user=="principal")
		include('./princ_trial.htm');
	//hod and staff
	else if(substr($user,0,3)=="jec")
	{	
		$query=mysql_query("SELECT * FROM department WHERE hod='$user'");
		$row = mysql_fetch_array($query);
		if($row)
			include('./hod_trial.htm');
		else
			include('./staff_trial.htm');
	}
	$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
mysql_close($con);
}
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
.butt {
	background-image: none;
	display: marker;
	width: 250px;
	cursor: hand;
	background-color: #FFFFFF;
	text-transform: uppercase;
	color: #0000FF;
	text-align: center;
	border: none #FFFFFF;
	text-decoration: underline;
}
.ff {
	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0000FF;
	font-weight: normal;
}
.tcelh {
	background-color: #FFFF99;
}
.tcelf {
	background-color: #FFCCCC;
}
.msg {
	font-family: "BankGothic Md BT";
	color: #0066FF;
}

-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.princprof3 {font-weight: bold}
body {
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="15%" height="175" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p></td>
    <td width="85%" valign="top">
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p align="center">
          <?php
  $dept=$_POST['dept'];  
  $year=$_POST['year'];
  $batch=$year-4;
   //doing batch listing
  if($dept!=NULL && $year!=NULL){
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM alumni WHERE dept='$dept' ORDER BY name"); 
  echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0099FF\">
<th class=\"ff\">Admission No.</th>
<th class=\"ff\">University Reg No.</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Permanent Address</th>
<th class=\"ff\">Email</th>
<th class=\"ff\">Phone</th>
<th class=\"ff\">Aggregate</th>
</tr>";
$flag=0;
$rowmsg=0;
  while($row=mysql_fetch_array($query))
  {
  $x=$row['studid'];
  if($batch==substr($x,0,4)){
  $rowmsg=1;
  $stud_name=$row['name'];
  $k=$row['studid'];
  $name="name".$i;
  if($flag==0)
  echo"<tr>";
  else
  echo"<tr bgcolor=\"#BFDFFF\" valign=\"top\">";
  echo "<td class=\"cell\" valign=\"top\">".$row['studid']."</td>";
  echo "<td class=\"cell\" valign=\"top\">".$row['urollno']."</td>";
  
  	echo "<td class=\"cell\" valign=\"top\">".$row['name']."</td>";			
		
		echo "<td class=\"cell\" valign=\"top\">".$row['paddress']."</td>";
  echo "<td class=\"cell\" valign=\"top\">".$row['email']."</td>";
  echo "<td class=\"cell\" valign=\"top\">".$row['phone']."</td>";
   echo "<td class=\"cell\" valign=\"top\">".$row['aggregate']."%</td>";
  		echo "</tr>";	
		if($flag==0)
		$flag=1;
		else
		$flag=0;		
   }}
   mysql_close($con);
    echo "</table>";
 echo '</center>';
   }
   
   }
 
  ?>
        </p>
      </form>
    <p>
      <?php if($rowmsg==0) echo "<p class=\"msg\" align=\"center\">NO entries found</p>"; ?>
    </p></td>
  </tr>
</table>
</body>
</html>
