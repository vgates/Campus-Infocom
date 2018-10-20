<?php 
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
include('./hod_trial.htm');
$hod=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else{
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM staff WHERE staffid='$hod'");
$row = mysql_fetch_array($result);
$dept=$row['dept'];
mysql_close($con);
}
$day=date("D")."day";
$day=$_POST['day'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style8 {font-size: 16px; color: #0066FF; font-weight: bold; }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
</head>

<body>
<form name="form1" method="post" action="">
  <div align="center">  
    <table width="200" border="0" align="center">
      <tr>
        <td><span class="style8">Day</span></td>
        <td><span class="style8">
          <span class="bg">
          <select name="day" class="box" id="day" onChange="return submitForm('day')">
            <option value="0">select</option>
			<option value="Sunday" <?php if($day=="Sunday") echo "selected"; ?>>Sunday</option>
            <option value="Monday" <?php if($day=="Monday") echo "selected"; ?>>Monday</option>
            <option value="Tuesday" <?php if($day=="Tuesday") echo "selected"; ?>>Tuesday</option>
            <option value="Wednesday" <?php if($day=="Wednesday") echo "selected"; ?>>Wednesday</option>
            <option value="Thursday" <?php if($day=="Thursday") echo "selected"; ?>>Thursday</option>
            <option value="Friday" <?php if($day=="Friday") echo "selected"; ?>>Friday</option>
            <option value="Saturday" <?php if($day=="Saturday") echo "selected"; ?>>Saturday</option>
          </select>
          </span></span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
	<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM staff WHERE dept='$dept'");
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"table\">Staff Id</th>
<th class=\"table\">Name  </th>
<th class=\"table\">Free Hours  </th>
</tr>";
$flag=0;
while($row = mysql_fetch_array($result))
  {
		$staffid=$row['staffid'];
		$name=$row['name'];
		$h1=1;$h2=2;$h3=3;$h4=4;$h5=5;$h6=6;$h7=7;
		
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 			
 		echo "<td class=\"cell\">".$row['staffid']."</td>";
		echo "<td class=\"cell\">".$row['name']."</td>";		
		$result2 = mysql_query("SELECT * FROM subhandle WHERE staffid='$staffid' AND day='$day'");
		while($hour=mysql_fetch_array($result2))
		{
			$h=$hour['hour'];
			if($h==1)
				$h1=NULL;
			else if($h==2)
				$h2=NULL;
			else if($h==3)
				$h3=NULL;
			else if($h==4)
				$h4=NULL;
			else if($h==5)
				$h5=NULL;
			else if($h==6)
				$h6=NULL;
			else if($h==7)
				$h7=NULL;
		}
		$k=-1;		
		if($h1!=NULL)
			$harray[$k++]=$h1;
		else if($h2!=NULL)
			$harray[$k++]=$h2;
		else if($h3!=NULL)
			$harray[$k++]=$h3;
		else if($h4!=NULL)
			$harray[$k++]=$h4;
		else if($h5!=NULL)
			$harray[$k++]=$h5;
		else if($h6!=NULL)
			$harray[$k++]=$h6;
		else if($h7!=NULL)
			$harray[$k++]=$h7;
		echo "<td class=\"cell\">".$harray."</td>";
  		echo "</tr>";		
	
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
  }
  echo "</table>";
 echo '</center>';
mysql_close($con);
?>
?>

  </div>
          <input name="sendtype" type="hidden" id="sendtype">
</form>
</body>
</html>
