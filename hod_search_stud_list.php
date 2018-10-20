<?php 
include('./hod_trial.htm'); 
for($x=0;$x<=100;$x++)
	{	
		$name="name".$x;
		if(isset($_POST["$name"]))
		{
			$studid=$_POST["$x"];			
			setcookie("studid",$studid);
			header('Location: hod_studsearchprofile.php');
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
	text-align: left;
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

-->
</style>
</head>

<body>

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p>
    
  </p>
  <p>
  <?php 
  $dept=$_POST['dept'];
  $sem=$_POST['sem'];
  if($dept!=NULL && $sem!=NULL){
  setcookie("dept",$dept);
  setcookie("sem",$sem);}
  else
  {
  	$dept=$_COOKIE['dept'];
	$sem=$_COOKIE['sem'];
}
  $con=mysql_connect("localhost","root","");
  if(!$con)
  {
  die("could not connect".mysql_error());
  }  
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM student WHERE dept='$dept' AND sem='$sem' ORDER BY name"); 
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
   }
   ?>
  </p>
  <p>&nbsp;  </p>
</form>

</body>
</html>
