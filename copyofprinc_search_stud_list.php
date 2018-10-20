<?php 
if($_POST['year'] && $_POST['month'] && $_POST['date'])
	$date=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
else
	$date="";
if($_POST['name'])
	$name_s=$_POST['name'];
else
	$name_s="";
if($_POST['urollno'])
	$urollno=$_POST['urollno'];
else
	$urollno="";
if($_POST['dept'])
	$dept=$_POST['dept'];
else
	$dept="";
if($_POST['sem'])
	$sem=$_POST['sem'];
else
	$sem="";
 
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
	if($user=="principal")
	{
		include('./princ_trial.htm');
		$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
	}
	else
	{
		include('./hod_trial.htm');
		$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
	}
for($x=0;$x<=100;$x++)
	{	
		$name="name".$x;
		if(isset($_POST["$name"]))
		{
			$studid=$_POST["$x"];
			setcookie("studid",$studid);
			header('Location: princ_studsearchprofile.php');
			exit();
			}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css" class="butt">
<!--
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
	color: #00CCFF;
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
.buttP {
	background-image: none;
	display: marker;
	width: 250px;
	cursor: hand;
	background-color: #FFFF99;
	text-transform: uppercase;
	color: #0000FF;
	text-align: center;
	border: none #FFFFFF;
	text-decoration: underline;
}
.buttY {
	background-image: none;
	display: marker;
	width: 250px;
	cursor: hand;
	background-color: #FFCCCC;
	text-transform: uppercase;
	color: #0000FF;
	text-align: center;
	border: none #FFFFFF;
	text-decoration: underline;
}
.princprof3 {font-weight: bold}

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
</head>

<body>

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p></p>
  <p>&nbsp;</p>
  <table width="870" border="0">
    <tr>
      <td width="154" height="170" valign="top"><span class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></span></td>
      <td width="706" rowspan="2" valign="top"><?php
  //doing batch listing
  if($dept!="" && $sem!="" && $name_s=="" && $urollno==""  && $date==""){
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM student WHERE dept='$dept' AND sem='$sem' ORDER BY name"); 
  $flag=0;
  //$rowmsg=mysql_fetch_array($query);
  echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Admission No.</th>
<th class=\"ff\">University Reg No.</th>
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
</tr>";
  while($row=mysql_fetch_array($query))
  {
  $flag=1;
  $stud_name=$row['name'];
  $i=$row['rollno'];
  $k=$row['studid'];
  $name="name".$i;
  echo"<tr>";
  echo "<td class=\"cell\">".$row['studid']."</td>";
  echo "<td class=\"cell\">".$row['urollno']."</td>";
  echo "<td class=\"cell\">".$row['rollno']."</td>";
  	echo "<td class=\"cell\">"."<input name=\"$name\" type=\"submit\" class=\"butt\" value=\"$stud_name\" border=\"0\">"."</td>";			
		echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
  		echo "</tr>";			
   }
   mysql_close($con);
   echo "</table>";
 echo '</center>';
 if($flag==0) echo "<p class=\"msg\" align=\"center\">NO entries found</p>";
   }
   
   }
   
   //doing name listing
   if($name_s!=""){
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  $flag=0;
  if($name_s!="")
	$query=mysql_query("SELECT * FROM student WHERE name LIKE '$name_s%' ORDER BY dept,sem");
  if($dept!="")
	$query=mysql_query("SELECT * FROM student WHERE name LIKE '$name_s%' and dept=\"$dept\" ORDER BY sem"); 
  if($sem!="")
	$query=mysql_query("SELECT * FROM student WHERE name LIKE '$name_s%' and sem=\"$sem\" ORDER BY dept"); 
  if($sem!="" && $dept!="")
	$query=mysql_query("SELECT * FROM student WHERE name LIKE '$name_s%' and sem=\"$sem\" and dept=\"$dept\" ORDER BY sem"); 
  //$rowmsg=mysql_fetch_array($query);
  echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Admission No.</th>
<th class=\"ff\">University Reg No.</th>
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Batch</th>
<th class=\"ff\">Name</th>
</tr>";
  while($row=mysql_fetch_array($query))
  {
  $flag=1;
  $stud_name=$row['name'];
  $i=$row['rollno'];
  $k=$row['studid'];
    $sem=$row['sem'];
  $name="name".$i;
  echo"<tr>";
  echo "<td class=\"cell\">".$row['studid']."</td>";
  echo "<td class=\"cell\">".$row['urollno']."</td>";
  echo "<td class=\"cell\">".$row['rollno']."</td>";
    echo "<td class=\"cell\">"; if($sem==1) echo "S1-S2 ".$row['dept']; else echo "S".$sem." ".$row['dept']; echo "</td>";
  	echo "<td class=\"cell\">"."<input name=\"$name\" type=\"submit\" class=\"butt\" value=\"$stud_name\" border=\"0\">"."</td>";			
		echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
  		echo "</tr>";			
   }
	echo "</table>";
 echo '</center>';
   mysql_close($con);
 if($flag==0) echo "<p class=\"msg\" align=\"center\">NO entries found</p>";

   }   
  }
  
  //doing urollno listing
  
  if($urollno!=""){
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM student WHERE urollno='$urollno' ORDER BY sem"); 
  $flag=0;
 // $rowmsg=mysql_fetch_array($query);
  echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Admission No.</th>
<th class=\"ff\">University Reg No.</th>
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Batch</th>
<th class=\"ff\">Name</th>
</tr>";
  while($row=mysql_fetch_array($query))
  {
  $flag=1;
  $stud_name=$row['name'];
  $i=$row['rollno'];
  $k=$row['studid'];
    $sem=$row['sem'];
  $name="name".$i;
  echo"<tr>";
  echo "<td class=\"cell\">".$row['studid']."</td>";
  echo "<td class=\"cell\">".$row['urollno']."</td>";
  echo "<td class=\"cell\">".$row['rollno']."</td>";
    echo "<td class=\"cell\">"; if($sem==1) echo "S1-S2 ".$row['dept']; else echo "S".$sem." ".$row['dept']; echo "</td>";
  	echo "<td class=\"cell\">"."<input name=\"$name\" type=\"submit\" class=\"butt\" value=\"$stud_name\" border=\"0\">"."</td>";			
		echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
  		echo "</tr>";			
   }
   echo "</table>";
 echo '</center>';
   mysql_close($con);
 if($flag==0) echo "<p class=\"msg\" align=\"center\">NO entries found</p>";
   }
  }
  
  //doing absentees listing
  
  if($date!=""){
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  
  $query_a=mysql_query("SELECT * FROM attendance1 WHERE date='$date'"); 
  $flag=0;
  //$rowmsg=mysql_fetch_array($query_a);
  while($row_a=mysql_fetch_array($query_a))
	{

	$id=$row_a['id'];
	$hour=$row_a['hour'];
  $query_id=mysql_query("SELECT * FROM attendance2 WHERE id='$id'");
   while($row_id=mysql_fetch_array($query_id))
   {
   $studid=$row_id['studid'];
  if($dept!="" && $sem!="")
		$query=mysql_query("SELECT * FROM student WHERE studid='$studid' and dept=\"$dept\" and sem=\"$sem\" ORDER BY sem"); 
  else if($sem!="")
		$query=mysql_query("SELECT * FROM student WHERE studid='$studid' and sem=\"$sem\" ORDER BY dept");
  else if($dept!="")
		$query=mysql_query("SELECT * FROM student WHERE studid='$studid' and dept=\"$dept\" ORDER BY sem");
	else $query=mysql_query("SELECT * FROM student WHERE studid='$studid' ORDER BY sem");
    while($row=mysql_fetch_array($query))
  {
  $flag=1;
  $stud_name=$row['name'];
  $i=$row['rollno'];
  $k=$row['studid'];
  $arr=$row['studid'];
    $sem=$row['sem'];
  $name="name".$i;
  $butname[$arr]=$name;
  $student_id[$arr]=$k;
  $student_urollno[$arr]=$row['urollno'];
  $student_rollno[$arr]=$row['rollno'];
  $student_dept[$arr]=$row['dept'];
  $student_sem[$arr]=$row['sem'];
  if($hour==1)
   $student_hour[$arr][1]=$hour;
  else if($hour==2)
   $student_hour[$arr][2]=$hour;
  else if($hour==3)
   $student_hour[$arr][3]=$hour;
  else if($hour==4)
   $student_hour[$arr][4]=$hour;
  else if($hour==5)
   $student_hour[$arr][5]=$hour;
  else if($hour==6)
   $student_hour[$arr][6]=$hour;
  else
   $student_hour[$arr][7]=$hour; 
    $student_name[$arr]=$row['name'];   
  	
   }
   }
   }
   
    echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Admission No.</th>
<th class=\"ff\">University Reg No.</th>
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Batch</th>
<th class=\"ff\">&nbsp;Hour&nbsp;</th>
<th class=\"ff\">Name</th>
</tr>";
  if($student_id){
  foreach($student_id as $chk)
  {
   if($student_hour[$chk][1]!=NULL && $student_hour[$chk][2]!=NULL && $student_hour[$chk][3]!=NULL && $student_hour[$chk][4]!=NULL && $student_hour[$chk][5]!=NULL && $student_hour[$chk][6]!=NULL && $student_hour[$chk][7]!=NULL )  
  		echo"<tr class=\"tcelf\">"; 
	else if(($student_hour[$chk][1]!=NULL && $student_hour[$chk][2]!=NULL && $student_hour[$chk][3]!=NULL && $student_hour[$chk][4]!=NULL) || ($student_hour[$chk][5]!=NULL && $student_hour[$chk][6]!=NULL && $student_hour[$chk][7]!=NULL))
		echo "<tr class=\"tcelh\">";
	else
		echo "<tr>";
  echo "<td class=\"cell\">".$student_id[$chk]."</td>";
  echo "<td class=\"cell\">".$student_urollno[$chk]."</td>";
  echo "<td class=\"cell\">".$student_rollno[$chk]."</td>";
  echo "<td class=\"cell\">"; if($student_sem[$chk]==1) echo "S1-S2 ".$student_dept[$chk]; else echo "S".$student_sem[$chk]." ".$student_dept[$chk]; echo "</td>";
  echo "<td class=\"cell\">&nbsp;";if($student_hour[$chk][1]!=NULL) echo $student_hour[$chk][1].",";if($student_hour[$chk][2]!=NULL) echo $student_hour[$chk][2].",";if($student_hour[$chk][3]!=NULL) echo $student_hour[$chk][3].",";if($student_hour[$chk][4]!=NULL) echo $student_hour[$chk][4].",";if($student_hour[$chk][5]!=NULL) echo $student_hour[$chk][5].",";if($student_hour[$chk][6]!=NULL) echo $student_hour[$chk][6].",";if($student_hour[$chk][7]!=NULL) echo $student_hour[$chk][7]; echo "&nbsp;</td>";
   if($student_hour[$chk][1]!=NULL && $student_hour[$chk][2]!=NULL && $student_hour[$chk][3]!=NULL && $student_hour[$chk][4]!=NULL && $student_hour[$chk][5]!=NULL && $student_hour[$chk][6]!=NULL && $student_hour[$chk][7]!=NULL )
   echo "<td class=\"cell\">"."<input name=\"$butname[$chk]\" type=\"submit\" class=\"buttY\" value=\"$student_name[$chk]\" border=\"0\">"."</td>";
   else if(($student_hour[$chk][1]!=NULL && $student_hour[$chk][2]!=NULL && $student_hour[$chk][3]!=NULL && $student_hour[$chk][4]!=NULL) || ($student_hour[$chk][5]!=NULL && $student_hour[$chk][6]!=NULL && $student_hour[$chk][7]!=NULL))
   echo "<td class=\"cell\">"."<input name=\"$butname[$chk]\" type=\"submit\" class=\"buttP\" value=\"$student_name[$chk]\" border=\"0\">"."</td>";
   else
  echo "<td class=\"cell\">"."<input name=\"$butname[$chk]\" type=\"submit\" class=\"butt\" value=\"$student_name[$chk]\" border=\"0\">"."</td>";			
  echo "<input type=\"hidden\" name=\"$student_rollno[$chk]\" value=\"$student_id[$chk]\">";
 echo "</tr>";	
   } }       	
   echo "</table>";
 echo '</center>';
   mysql_close($con);
 if($flag==0) echo "<p class=\"msg\" align=\"center\">NO entries found</p>";
   }
 }
   
   ?></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
  </form>

</body>
</html>
