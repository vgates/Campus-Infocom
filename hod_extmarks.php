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
<?php
if(empty($_POST['sem']) || !empty($_POST['sem'])){
include('./hod_trial.htm');
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
<div id="Layer1" style="position:absolute; left:15px; top:246px; width:143px; height:74px; z-index:3">
  <p><img src="<?php echo $src; ?>" alt="" width="137" height="169" border="2"></p>
  <table width="144" border="0" align="center">
    <tr>
      <td width="134"><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
          <param name="movie" value="button37.swf">
          <param name="quality" value="high">
          <embed src="button37.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
        </object>
</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
          <param name="movie" value="button38.swf">
          <param name="quality" value="high">
          <embed src="button38.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
        </object>
</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
          <param name="movie" value="button39.swf">
          <param name="quality" value="high">
          <embed src="button39.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
        </object>
</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">
      </div></td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="200" border="0" align="center">
    <tr>
      <td><div align="right" class="style1">Semester:</div></td>
      <td><select name="sem" class="box" id="select2" onChange="return submitForm('sem')">
          <option value="0">select</option>
          <option value="1">S1 &amp; S2</option>
          <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
          <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
          <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
          <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
          <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
          <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
      </select></td>
    </tr>
  </table>
  <p align="center">
    <?php
if(!empty($_POST['sem'])){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
echo '<center>';
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
 echo '</center>';
 echo '<center>';
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
  <input name="sendtype" type="hidden" id="sendtype">
</form>
<p>&nbsp;</p>
</body>
</html>
