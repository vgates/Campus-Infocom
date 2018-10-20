<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
	$user=$_COOKIE['user'];
	if($user=="principal")
		include('./princ_trial.htm');
	else
		include('./hod_trial.htm');
		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<style type="text/css">
<!--
.style1 {
	color: #0066FF;
	font-weight: bold;
}
.ff {
	color: #00CCFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0033FF;
	font-weight: normal;
}
.light {
	font-variant: small-caps;
	color: #00CCFF;
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
<style type="text/css">
<!--
.butstyle {
	cursor: hand;
	background-color: #0000CC;
	width: 115px;
	font-weight: bold;
	color: #00CCFF;
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
body {
	margin-bottom: 0px;
}
-->
</style>
</head>
<body>
<?php
if(empty($_POST['sem']) || !empty($_POST['sem'])){
$studid=$_COOKIE['studid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$query = mysql_query("SELECT * FROM student WHERE studid='$studid'");
$fetch=mysql_fetch_array($query);
$dept=$fetch['dept'];
$name=$fetch['name'];
$photo=$fetch['photo'];
$src="upload/".$photo;
mysql_close($con);
}
}
$sem=$_POST['sem'];
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="30%" valign="top"><table width="144" border="0">
        <tr>
          <td width="134"><img alt="" name="photo" width="137" height="169" border="2" src="<?php echo $src; ?>"></td>
        </tr>
        <tr>
          <td bgcolor="#000000"><div align="center"><span class="light"><?php echo $name; ?></span></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form2" method="post" action="princ_att_generate.php">
                <input name="Submit" type="submit" class="butstyle" value="Attendance">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form3" method="post" action="princ_intmarks.php">
                <input name="Submit2" type="submit" class="butstyle" value="Internal Marks">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="formtt" method="post" action="greencard.php">
                <input name="Submit3" type="submit" class="butstyle" value="White Card">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form4" method="post" action="princ_studsearchprofile.php">
                <input name="Submit3" type="submit" class="butstyle" value="Profile">
              </form>
          </div></td>
        </tr>
    </table></td>
    <td width="70%" valign="top"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <table width="200" border="0">
        <tr>
          <td nowrap><div align="right" class="style1">Select semester to generate External Marks:</div></td>
          <td><select name="sem" class="box" id="select" onChange="return submitForm('sem')">
              <option value="0">select</option>
              <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
              <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
              <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
              <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
              <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
              <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
              <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
          </select></td>
        </tr>
      </table>
      <p align="left">
        <?php
if(!empty($_POST['sem'])){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Code</th>
<th class=\"ff\">Subject</th>
<th class=\"ff\">Internal</th>
<th class=\"ff\">External</th>
<th class=\"ff\">Total</th>
</tr>";
$flag=0; $i=0;
$grandtotal=0;
while($row = mysql_fetch_array($result))
  {
		$i++;
		$ext="ext".$i;
		$int="int".$i;
		$sub="sub".$i;
		$x=$row['subid'];
		$intmark = mysql_query("SELECT * FROM extmark_app WHERE studid='$studid' AND subid='$x'");
		$intmark=mysql_fetch_array($intmark);
		if($intmark)
			$intmark=$intmark['internal'];
		else
			$intmark=NULL;
		$extmark = mysql_query("SELECT * FROM extmark_app WHERE studid='$studid' AND subid='$x'");
		$extmark=mysql_fetch_array($extmark);
		if($extmark)
			$extmark=$extmark['external'];
		else
			$extmark=NULL;
		$total=$intmark+$extmark;
		$grandtotal=$grandtotal+$total;
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<input type=\"hidden\" name=\"$sub\" value=\"$x\">";
		echo "<td class=\"cell\">".$row['subid']."</td>";
		echo "<td class=\"cell\">".$row['name']."</td>";		
		echo "<td class=\"cell\">".$intmark."</td>";
		echo "<td class=\"cell\">".$extmark."</td>";
		echo "<td class=\"cell\">".$total."</td>";
  		echo "</tr>";
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
	$j=$i;
  }
  echo "</table>";
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Grand Total = </th>
<th class=\"ff\">$grandtotal</th>
</tr>";
mysql_close($con);
}
?>
      </p>
      <p align="center"> </p>
      <input name="sendtype" type="hidden" id="sendtype2">
    </form></td>
  </tr>
</table>
</body>
</html>
