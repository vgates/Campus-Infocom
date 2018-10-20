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
$photo=$row['photo'];
$src="upload/".$photo;
mysql_close($con);
}
if(date(D)=="Tue")
	$day="Tuesday";
else if(date(D)=="Wed")
	$day="Wednesday";
	else if(date(D)=="Thu")
	$day="Thursday";
	else if(date(D)=="Sat")
	$day="Saturday";
	else
	$day=date(D)."day";
if($_POST['day']!=NULL)
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
.table {
	font-size: 16px;
	color: #00CCFF;
}
.cell {
	font-size: 16px;
	color: #0000CC;
}
.princprof3 {font-weight: bold}
.studet1 {font-size: 12px}
.style1 {color: #0066FF}
.style3 {color: #0066FF; font-weight: bold; }
.style6 {color: #0033FF}
.style7 {font-size: 12px; color: #0033FF; }
.style9 {color: #000000; font-weight:bold;}
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
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="26%" height="175" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
        <p class="princprof3">&nbsp;</p>
    <p class="princprof3">&nbsp;</p></td>
    <td width="74%" valign="top">
      <table width="204" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="">
            <div align="center">
              <table width="200" border="0" align="center">
                <tr>
                  <td><span class="style8">Day</span></td>
                  <td><span class="style8"> <span class="bg">
                    <select name="day" class="box" id="select" onChange="return submitForm('day')">
                      <option value="0">select</option>
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
              <?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM staff WHERE dept='$dept'");
echo '<center>';
echo "<table border='0' width='500'>
<tr bgcolor=\"#0000FF\">
<th colspan='3' class=\"style9\" background='title.jpg'>:: FREE STAFF ::</th>
</tr>
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
 			
 		echo "<td class=\"cell\" nowrap>".$row['staffid']."</td>";
		echo "<td class=\"cell\" align=\"left\" nowrap>".$row['name']."</td>";		
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
		
		echo "<td class=\"cell\" nowrap>";
		if($h1!=NULL)
			echo $h1."st, ";
		if($h2!=NULL)
			echo $h2."nd, ";
		if($h3!=NULL)
			echo $h3."rd, ";
		if($h4!=NULL)
			echo $h4."th, ";
		if($h5!=NULL)
			echo $h5."th, ";
		if($h6!=NULL)
			echo $h6."th, ";
		if($h7!=NULL)
			echo $h7."th, ";
		echo "</td>";
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
              <input name="sendtype" type="hidden" id="sendtype2">
          </div>
            </form></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
