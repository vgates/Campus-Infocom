<?php 
include('./staff_trial.htm');
$staffid=$_COOKIE['user'];
if(!empty($_POST['subid'])){
for($x=0;$x<=100;$x++)
	{	
		$name="name".$x;
		if(isset($_POST["$name"]))
		{
			$j=$_POST["$x"];
			setcookie("studid",$_POST["$x"]);
			setcookie("subid",$_POST['subid']);			
			header("Location: staff_extmark.php");
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.attlist2 {color: #0066FF}
.attlist3 {color: #0066FF; font-weight: bold; }
.style1 {
	font-size: 10px;
	color: #0066FF;
}
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
<?php
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
$dept=$_COOKIE['dept'];
$cookie_sem=$_COOKIE['sem'];		
$staffid=$_COOKIE['user'];
$sem=$_POST['sem'];
?>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

  <table width="194" border="0" align="center">
    <tr>
      <td width="76" height="33" class="attlist3"> <div align="right">Semester:</div></td>
      <td width="108"><span class="style6">
        <select name="sem" id="sem" onChange="return submitForm('sem')">
          <option value="0">select</option>
          <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
          <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
          <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
          <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
          <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
          <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
          <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
        </select>
      </span></td>
    </tr>
  </table>
  <p align="center">
  <?php
//$x=number;
if($_POST['sem']){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$student = mysql_query("SELECT * FROM student ORDER BY rollno");
echo '<center>';
echo "<table border='0'>
<tr bgcolor=\"#0000FF\">
<th class=\"ff\">Roll No</th>
<th class=\"ff\">Name</th>
<th class=\"ff\">Internal</th>
<th class=\"ff\">External</th>
<th class=\"ff\">Total</th>
<th class=\"ff\">To Edit</th>
</tr>";
$flag=0;
while($row = mysql_fetch_array($student))
  {
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{
		$i=$row['rollno'];
		$k=$row['studid'];
		$name="name".$i;
		$mark_query=mysql_query("SELECT * from extmark WHERE studid='$k' AND subid='$sub'");
		$mark=mysql_fetch_array($mark_query);
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";		
 		echo "<td class=\"cell\">".$row['urollno']."</td>";
		echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";	
		if($mark['internal']!=NULL)	
			echo "<td class=\"cell\">".$mark['internal']."</td>";
		else
			echo "<td class=\"cell\">-</td>";
		if($mark['external']!=NULL)	
			echo "<td class=\"cell\">".$mark['external']."</td>";
		else
			echo "<td class=\"cell\">-</td>";
		if($mark['internal']!=NULL || $mark['external']!=NULL)
		{
			$total=$mark['internal']+$mark['external'];
			echo "<td class=\"cell\">".$total."</td>";
		}
		else
			echo "<td class=\"cell\">-</td>";			
		echo "<td>"."<input type=\"submit\" name=\"$name\" value=\"Click Here\">"."</td>";			
		echo "<input type=\"hidden\" name=\"$i\" value=\"$k\">";
  		echo "</tr>";		
	
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
		}
  }
  echo "</table>";
 echo '</center>';
mysql_close($con);
}
?>
</p>
<input name="sendtype" type="hidden" id="sendtype">
</form>
</body>
</html>
