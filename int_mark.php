<?php 
include('./staff_trial.htm');
$staffid=$_COOKIE['user'];

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
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style9 {font-size: 16px}
-->
</style>
</head>

<body>
<?php
$dept=$_COOKIE['dept'];
$sem=$_COOKIE['sem'];		
$staffid=$_COOKIE['user'];
$subid=$_COOKIE['subid'];
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><form name="form1" method="post" action="int_mark_entry.php">
      <table width="469" border="0" align="center" class="box">
        <tr>
          <td width="149"><div align="right"><span class="style9">Internal Marks of : </span></div></td>
          <td width="141"><span class="style9">
            <?php if($sem==1) echo "S1-S2 ".$dept; else echo "S".$sem." ".$dept; ?>
          </span></td>
          <td width="49"><div align="right"><span class="style9">Subject:</span></div></td>
          <td width="112"><span class="style9">
            <?php $con = mysql_connect("localhost","root","");
if(!$con)
  {
  die('COULD NOT CONNECT :'.mysql_error());
  }
  else
  {
  mysql_select_db("campusinfocom",$con);
  $query=mysql_query("SELECT * FROM subjects where subid='$subid'");
 $row = mysql_fetch_array($query);
 $subname=$row['name'];
 mysql_close($con);
 echo $subname;
 }?>
          </span></td>
        </tr>
      </table>
      <p align="center">
        <?php
//$x=number;
if($_COOKIE['subid']){
$subid=$_COOKIE['subid'];
//setcookie("subid",$_POST['subid']);
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
<th class=\"ff\">Sessional1</th>
<th class=\"ff\">Sessional2</th>
<th class=\"ff\">Assignment1</th>
<th class=\"ff\">Assignment2</th>
<th class=\"ff\">Regularity</th>
<th class=\"ff\">RAW</th>
<th class=\"ff\">Normalized</th>
</tr>";
$flag=0; $tm=0; $p=0;
while($row = mysql_fetch_array($student))
  {
  
  	if($sem==$row['sem'] && $dept==$row['dept'])
	{
	$p++;
		$i=$row['rollno'];
		$k=$row['studid'];
		$name="name".$i;
		$mark_query=mysql_query("SELECT * from intmark WHERE studid='$k' AND subid='$subid'");
		$mark=mysql_fetch_array($mark_query);
		if($flag==0)
			echo "<tr>";
		else
			echo "<tr bgcolor=\"#00CCFF\">";		
 		echo "<td class=\"cell\">".$row['rollno']."</td>";
		echo "<td class=\"cell\" align=\"left\">".$row['name']."</td>";	
		$markses1=$mark['ses1'];
		if($markses1==999)
			$markses1=NULL;
		else if($markses1==65)
  			$markses1="A";  
		$markses2=$mark['ses2'];
		if($markses2==999)
			$markses2=NULL;
		else if($markses2==65)
  			$markses2="A";
		$markass1=$mark['ass1'];
		if($markass1==999)
			$markass1=NULL;
		$markass2=$mark['ass2'];
		if($markass2==999)
			$markass2=NULL;
		$marknor=$mark['normalized'];
		if($marknor==999)
			$marknor=NULL;
		 $tm=$tm+$marknor;
		$query_att=mysql_query("SELECT * FROM attendance1 WHERE subid='$subid' AND staffid='$staffid'");
   $totalhours=mysql_num_rows($query_att);
    $absent=0;
   while($row=mysql_fetch_array($query_att))
   {
   		$id=$row['id']; 
		$query1=mysql_query("SELECT * FROM attendance2 WHERE id='$id' AND studid='$k'");
		$row1=mysql_fetch_array($query1);
		
		if($row1)
			$absent=$absent+1;
	}	
	if($totalhours!=0)
	{
	$present=$totalhours - $absent;
	$regularity=(($present/$totalhours)*100);
	if($regularity>=90)
	$regm=5;
	else if($regularity>=80 && $regularity<90)
	$regm=4;
	else if($regularity>=70 && $regularity<80)
	$regm=3;
	else if($regularity>=60 && $regularity<70)
	$regm=2;
	else if($regularity>=50 && $regularity<60)
	$regm=1;
	else $regm=0;
	}
		$sone="sone".$i;
		$stwo="stwo".$i;
		$aone="aone".$i;
		$atwo="atwo".$i;
		$reg="reg".$i;
		$norm="norm".$i;
		echo "<td class=\"cell\">"."<input type=\"text\" name=\"$sone\" value=\"$markses1\" size=\"2\" class=\"box\">"."</td>";
		echo "<td class=\"cell\">"."<input type=\"text\" name=\"$stwo\" value=\"$markses2\" size=\"2\" class=\"box\">"."</td>";
		echo "<td class=\"cell\">"."<input type=\"text\" name=\"$aone\" value=\"$markass1\" size=\"2\" class=\"box\">"."</td>";
		echo "<td class=\"cell\">"."<input type=\"text\" name=\"$atwo\" value=\"$markass2\" size=\"2\" class=\"box\">"."</td>";
		echo "<td class=\"cell\">"."<input type=\"text\" name=\"$reg\" value=\"$regm\" size=\"2\" class=\"box\">"."</td>";
		if($markses1!=NULL && $markses2!=NULL && $markass1!=NULL && $markass2!=NULL && $regm!=NULL)
		{
		$marksesn1=(($markses1*15)/50);
		$marksesn2=(($markses2*15)/50);
		$markassn1=(($markass1*7.5)/10);
		$markassn2=(($markass2*7.5)/10);
		$raw=$marksesn1+$marksesn2+$markassn1+$markassn2+$regm;		
		echo "<td class=\"cell\">".$raw."</td>";	
		if($marknor!=NULL)		
			echo "<td class=\"cell\">"."<input type=\"text\" name=\"$norm\" value=\"$marknor\" size=\"2\" class=\"box\">"."</td>";
		else
			echo "<td class=\"cell\">"."<input type=\"text\" name=\"$norm\" value=\"$raw\" size=\"2\" class=\"box\">"."</td>";
		}
		else
		{
		echo "<td class=\"cell\">-</td>";		
		echo "<td class=\"cell\">"."<input type=\"text\" name=\"$norm\" size=\"2\" class=\"box\">"."</td>";
		}
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
 $avg=$tm/$p;
mysql_close($con);
}

?>
      </p>
      <p>
        <input name="sendtype" type="hidden" id="sendtype">
      </p>
      <p align="center">
        <input type="submit" name="Submit" value="Save">
      </p>
    </form></td>
  </tr>
</table>
</body>
</html>
