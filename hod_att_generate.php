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
.style6 {font-size: 16px; font-weight: bold; color: #0033FF; }
.ff {
	color: #00CCFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0066FF;
	font-weight: bold;
}
.style7 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
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
<style type="text/css">
<!--
.light {	font-variant: small-caps;
	color: #00CCFF;
}
-->
</style>
</head>

<body>
<?php
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
$student_query = mysql_query("SELECT * FROM student WHERE studid='$studid'");
$student=mysql_fetch_array($student_query);
$dept=$student['dept'];
$sem=$student['sem'];
$name=$student['name'];
$rollno=$student['rollno'];
$photo=$student['photo'];
$src="upload/".$photo;
mysql_close($con);
}
function generate_sub($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
 
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  
  }
 return $t_dump; 
}
$studid=$_COOKIE['studid'];
$sub=$_POST['subid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM subjects WHERE sem='$sem' AND dept='$dept'");
while($row = mysql_fetch_array($result))
  {
  $i=$row['subid'];
  $query = mysql_query("SELECT * FROM subjects WHERE subid='$i'");
  $subname=mysql_fetch_array($query);
  $j=$subname['name'];
  $listsub[$i]=$j;
  }
mysql_close($con);
}
?>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="200" border="0" align="center">
  <tr>
    <td><div align="right" class="style7">Subject:</div></td>
    <td><span class="style6">
      <select name="subid" class="box" id="select" onChange="return submitForm('subid')">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$sub); ?>
      </select>
    </span></td>
  </tr>
</table>
<p align="center">
  <?php
  if(!empty($_POST['subid'])){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Leave</th>
<th class=\"ff\">Regularity</th>
</tr>";
$flag=0;
		$i=$row['rollno'];
		$studid=$_COOKIE['studid'];
		$staffid_query=mysql_query("SELECT * FROM subhandle WHERE subid='$sub' AND dept='$dept' AND sem='$sem'");
		$staffid_array=mysql_fetch_array($staffid_query);
		$staffid=$staffid_array['staffid'];
		$query=mysql_query("SELECT * FROM attendance1 WHERE subid='$sub' AND staffid='$staffid'");
        $totalhours=mysql_num_rows($query);
		$absent=0;
		while($row1=mysql_fetch_array($query))
  		{
   		$id=$row1['id']; 
		$query3=mysql_query("SELECT * FROM attendance2 WHERE id='$id' AND studid='$studid'");
		$row3=mysql_fetch_array($query3);
		
		if($row3)
			$absent=$absent+1;
		}		
		if($totalhours!=0)
		{
			$present=$totalhours - $absent;
			$regularity=(($present/$totalhours)*100);
		}
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";
 		echo "<td class=\"cell\">".$rollno."</td>";
		echo "<td class=\"cell\" align=\"left\">".$name."</td>";
 		echo "<td class=\"cell\">".$absent."</td>";
		echo "<td class=\"cell\">".$regularity."%"."</td>";
  		echo "</tr>";		

  echo "</table>";
 echo '</center>';
mysql_close($con);
}
?>
</p>
  <input name="sendtype" type="hidden" id="sendtype">
</form>

<div id="Layer1" style="position:absolute; left:15px; top:246px; width:143px; height:74px; z-index:3">
  <p><img src="<?php echo $src; ?>" alt="" width="137" height="169" border="2"></p>
  <table width="144" border="0" align="center">
    <tr>
      <td width="134"><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
          <param name="movie" value="button28.swf">
          <param name="quality" value="high">
          <embed src="button28.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
        </object>
</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
          <param name="movie" value="button29.swf">
          <param name="quality" value="high">
          <embed src="button29.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
        </object>
</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="103" height="24">
          <param name="movie" value="button30.swf">
          <param name="quality" value="high">
          <embed src="button30.swf" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="103" height="24" ></embed>
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
</body>
</html>
