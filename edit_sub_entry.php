<?php 
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();

if(isset($_POST['Submit']))
{	
	if(empty($_POST['dept']))
		$p=false;
	else
		$p=$_POST['dept'];
	if(empty($_POST['sem']))
		$q=false;
	else
		$q=$_POST['sem'];
	if(empty($_POST['name']))
		$r=false;
	else
		$r=$_POST['name'];
		if(empty($_POST['internal']))
		$internal=false;
	else
		$internal=$_POST['internal'];
		if(empty($_POST['external']))
		$external=false;
	else
		$internal=$_POST['internal'];

	$subid=$_COOKIE['subid'];
	if($p && $q && $r)
	{
		mysql_query("UPDATE subjects SET dept='$p' WHERE subid='$subid'");		
		mysql_query("UPDATE subjects SET sem='$q' WHERE subid='$subid'");
		mysql_query("UPDATE subjects SET name='$r' WHERE subid='$subid'");
		mysql_query("UPDATE subjects SET internal='$internal' WHERE subid='$subid'");
		mysql_query("UPDATE subjects SET external='$external' WHERE subid='$subid'");
		$genObj->alertL("Updated successfully..!","sub_edit.php");
	}
	else
		 $msg="Enter all fields..";
}	
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.addsub1 {
	font-size: 18px;
	color: #00CC33;
}
.addsub2 {color: #00CC33}
.addsub3 {color: #0033FF}
.style1 {
	font-size: 14px;
	font-weight: bold;
}
.msg {
	font-family: "BankGothic Md BT";
	color: #0099FF;
	text-decoration: blink;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.editstud5 {color: #0066FF}
.style5 {color: #000000;
	font-size: 9px;
}
.style8 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
$subid=$_COOKIE['subid'];
$result = mysql_query("SELECT * FROM subjects WHERE subid='$subid'");
$row = mysql_fetch_array($result);
$subid=$row['subid'];
$dept=$row['dept'];
$sem=$row['sem'];
$name=$row['name'];
$internal=$row['internal'];
$external=$row['external'];
function generate_dept($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value)
 {
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
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
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
              <div align="center">
                <table width="400" border="0">
                  <tr>
                    <th colspan="3" scope="row" background="title.jpg"><span class="style8">:: <span class="style8">SUBJECT ENTRY</span> :: </span></th>
                    </tr>
                  <tr>
                    <th width="166" scope="row"><div align="right" class="editstud5">
                        <div align="left">Subject ID</div>
                    </div></th>
                    <td width="5"><span class="editstud5"><strong>:</strong></span></td>
                    <td width="215" class="editstud5"><div align="left"> <?php echo $subid; ?> </div></td>
                  </tr>
                  <tr>
                    <th scope="row"><div align="right" class="editstud5">
                        <div align="left">Department</div>
                    </div></th>
                    <td><span class="editstud5"><strong>:</strong></span></td>
                    <td><div align="left">
                        <select name="dept" class="box" id="select">
                          <option>select</option>
                          <?php print generate_dept($listdept,$dept); ?>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <th scope="row"><div align="right" class="editstud5">
                        <div align="left">Semester</div>
                    </div></th>
                    <td><span class="editstud5"><strong>:</strong></span></td>
                    <td><div align="left">
                        <select name="sem" class="box" id="select2">
                          <option value="0">select</option>
                          <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
                          <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
                          <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
                          <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
                          <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
                          <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
                          <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <th nowrap scope="row"><div align="right" class="editstud5">
                        <div align="left">Subject Name</div>
                    </div></th>
                    <td><span class="editstud5"><strong>:</strong></span></td>
                    <td><div align="left">
                        <input name="name" type="text" class="box" id="name2" value="<?php echo $name; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <th nowrap scope="row"><div align="left" class="editstud5">Interna Marks </div></th>
                    <td><div align="left" class="editstud5"><strong>:</strong></div></td>
                    <td><input name="internal" type="text" class="box" id="internal" value="<?php echo $internal; ?>"></td>
                  </tr>
                  <tr>
                    <th nowrap scope="row"><div align="left" class="editstud5">External Marks </div></th>
                    <td><div align="left" class="editstud5"><strong>:</strong></div></td>
                    <td><input name="external" type="text" class="box" id="external" value="<?php echo $external; ?>"></td>
                  </tr>
                </table>
                <p>
                  <input name="Submit" type="submit" class="butstyle" value="Update">
 </p>
                </div>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<?php echo "<p align=\"center\" class=\"msg\">".$msg."</p>"; ?>
</body>
</html>
