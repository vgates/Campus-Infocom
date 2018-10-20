<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
if(isset($_POST['Submit']))
{
	$q=$_POST['name'];
	$r=strtoupper($_POST['urollno']);
	$s=$_POST['dept'];
	$t=$_POST['sem'];
	$u=$_POST['rollno'];		
	$studid=$_COOKIE['studid'];
	mysql_query("UPDATE student SET name='$q' WHERE studid='$studid'");		
	mysql_query("UPDATE student SET urollno='$r' WHERE studid='$studid'");
	mysql_query("UPDATE student SET sem=$t WHERE studid='$studid'");
	mysql_query("UPDATE student SET dept='$s' WHERE studid='$studid'");
	mysql_query("UPDATE student SET rollno=$u WHERE studid='$studid'");	
	$genObj->alertL("Updated successfully..!","edit_stud_det.php");		
}
$studid=$_COOKIE['studid'];
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.studedit {color: #00CC33}
.studedit2 {font-size: 18px}
.studedit3 {color: #0066FF}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #0033FF;
}
.style9 {color: #0033FF}
.style5 {color: #000000;
	font-size: 9px;
}
.style8 {font-weight: bold; color: #0066FF; }
.style9 {	color: #000000;
	font-weight: bold;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
function generate_dept($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
 
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  
  }
 return $t_dump; 
}
$result = mysql_query("SELECT * FROM department");
while($row = mysql_fetch_array($result))
{
  $i=$row['dept'];
  $j=$row['name'];
  $listdept[$i]=$j;
}
$result = mysql_query("SELECT * FROM student WHERE studid='$studid'");
while($row = mysql_fetch_array($result))
{
	$name=$row['name'];
	$urollno=$row['urollno'];
	$dept=$row['dept'];
	 $sem=$row['sem'];
	 $rollno=$row['rollno'];
 }
  			
?>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td background="title.jpg"><p align="center" class="style5"><strong>A</strong></p>
        <p align="center" class="style5"><strong>D</strong></p>
        <p align="center" class="style5"><strong>M</strong></p>
        <p align="center" class="style5"><strong>I</strong></p>
        <p align="center" class="style5"><strong>N</strong></p>
        <p align="center" class="style5"><strong>I</strong></p>
        <p align="center" class="style5"><strong>S</strong></p>
        <p align="center" class="style5"><strong>T</strong></p>
        <p align="center" class="style5"><strong>R</strong></p>
        <p align="center" class="style5"><strong>A</strong></p>
        <p align="center" class="style5"><strong>T</strong></p>
        <p align="center" class="style5"><strong>O</strong></p>
        <p align="center" class="style5"><strong>R</strong></p></td>
    <td><div align="center">
        <table width="400" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <table width="410" border="0" align="center">
                <tr>
                  <th colspan="3" scope="row" background="title.jpg">:: EDIT STUDENT :: </th>
                  </tr>
                <tr>
                  <th width="182" scope="row"><div align="right" class="studedit3">
                      <div align="left">Student Id:</div>
                  </div></th>
                  <td width="11"><span class="studedit3"><strong>:</strong></span></td>
                  <td width="203"><label class="studedit3"><?php echo $studid; ?></label>
            &nbsp;</td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studedit3">
                      <div align="left">Name:</div>
                  </div></th>
                  <td><span class="studedit3"><strong>:</strong></span></td>
                  <td><input name="name" type="text" class="box" id="name2" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studedit3">
                      <div align="left">University Roll No: </div>
                  </div></th>
                  <td><span class="studedit3"><strong>:</strong></span></td>
                  <td><input name="urollno" type="text" class="box" id="urollno2" value="<?php echo $urollno; ?>"></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studedit3">
                      <div align="left">Department:</div>
                  </div></th>
                  <td><span class="studedit3"><strong>:</strong></span></td>
                  <td><select name="dept" class="box" id="select">
                      <option value="0">Select</option>
                      <?php print generate_dept($listdept,$dept); ?>
                  </select></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studedit3">
                      <div align="left">Semester:</div>
                  </div></th>
                  <td><span class="studedit3"><strong>:</strong></span></td>
                  <td><select name="sem" class="box" id="select2">
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
                <tr>
                  <th scope="row"><div align="right" class="studedit3">
                      <div align="left">Class Rollno:</div>
                  </div></th>
                  <td><span class="studedit3"><strong>:</strong></span></td>
                  <td><input name="rollno" type="text" class="box" id="rollno2" value="<?php echo $rollno; ?>" size="3"></td>
                </tr>
              </table>
              <p align="center">
                <input name="Submit" type="submit" class="butstyle" value="Update">
              </p>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<?php echo '<div align="center" class="studedit">'; echo $msg; echo '</div>'; ?>
</body>
</html>