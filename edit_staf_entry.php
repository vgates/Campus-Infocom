<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
if(isset($_POST['Submit']))
{
	if(empty($_POST['name']))
		$c=false;
	else
		$c=$_POST['name'];

	$d=$_POST['email'];

	$e=$_POST['phone'];

	$f=$_POST['mobile'];

	$g=$_POST['marital_status'];

	$h=$_POST['paddress'];

	$i=$_POST['taddress'];
	$religion=$_POST['religion'];
	$caste=$_POST['caste'];

	$k=$_POST['gender'];
	if(empty($_POST['dept']))
		$l=false;
	else
		$l=$_POST['dept'];
	$qualification=$_POST['qualification'];
	$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
	$staffid=$_COOKIE['staffid'];
	if($c && $l)
	{
		mysql_query("UPDATE staff SET name='$c' WHERE staffid='$staffid'");	
		mysql_query("UPDATE staff SET email='$d' WHERE staffid='$staffid'");		
		mysql_query("UPDATE staff SET phone='$e' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET mobile='$f' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET marital_status='$g' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET paddress='$h' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET taddress='$i' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET gender='$k' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET dept='$l' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET religion='$religion' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET caste='$caste' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET dob='$dob' WHERE staffid='$staffid'");
		mysql_query("UPDATE staff SET qualification='$qualification' WHERE staffid='$staffid'");
		$genObj->alertL("Updated successfully..!","staf_edit.php");
	}
	else
		 echo "<p>PLEASE TRY AGAIN.......!!!</p>";
}
$staffid=$_COOKIE['staffid'];
?>  
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.editstaff1 {color: #0033FF; font-size: 14px;}
.editstaf2 {color: #00CC33}
.editstaf3 {
	font-size: 12px;
	color: #00CC33;
}
.style1 {color: #0066FF}
.style2 {font-weight: bold}
.style3 {color: #0066FF; font-weight: bold; }
.style5 {font-size: 12px; color: #0066FF; }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {color: #0033FF; font-size: 14px; font-weight: bold; }
.style9 {color: #0033FF}
.style10 {color: #000000;
	font-size: 9px;
}
.style9 {	color: #000000;
	font-weight: bold;
}
.style11 {color: #000000}
-->
</style>
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
function generate_list($all_list,$selected_item){
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
$dept=$_POST['dept'];
$listreligion['XX'] = 'Select';
$listreligion['Hindu'] = 'Hindu';
$listreligion['Christian'] = 'Christian';
$listreligion['Muslim'] = 'Muslim';
$religion=$_POST['religion'];
$staffid=$_POST['staffid'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$paddress=$_POST['paddress'];
$taddress=$_POST['taddress'];
$mobile=$_POST['mobile'];
$maritalstatus=$_POST['marital_status'];
$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
$gender=$_POST['gender'];
$qualification=$_POST['qualification'];
$staffid=$_COOKIE['staffid'];

if($religion==NULL)
{
	$result = mysql_query("SELECT * FROM staff WHERE staffid='$staffid'");
	while($row = mysql_fetch_array($result))
	{
		$name=$row['name'];
		$email=$row['email'];
		$phone=$row['phone'];
		 $mobile=$row['mobile'];
		$maritalstatus=$row['marital_status'];
		 $paddress=$row['paddress'];
		 $taddress=$row['taddress'];
		 $gender=$row['gender'];
		$dob=$row['dob'];
		 $dept=$row['dept'];
		 $qualification=$row['qualification'];
		 $religion=$row['religion'];
		 $caste=$row['caste'];
		 
	 }
}
?>

<p>&nbsp;</p>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td background="title.jpg"><p align="center" class="style10"><strong>A</strong></p>
        <p align="center" class="style10"><strong>D</strong></p>
        <p align="center" class="style10"><strong>M</strong></p>
        <p align="center" class="style10"><strong>I</strong></p>
        <p align="center" class="style10"><strong>N</strong></p>
        <p align="center" class="style10"><strong>I</strong></p>
        <p align="center" class="style10"><strong>S</strong></p>
        <p align="center" class="style10"><strong>T</strong></p>
        <p align="center" class="style10"><strong>R</strong></p>
        <p align="center" class="style10"><strong>A</strong></p>
        <p align="center" class="style10"><strong>T</strong></p>
        <p align="center" class="style10"><strong>O</strong></p>
        <p align="center" class="style10"><strong>R</strong></p></td>
    <td><div align="center">
        <table width="400" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div align="center">
              <div align="center">
                <table width="394" border="0" align="center" cellspacing="1">
                  <tr>
                    <td height="21" colspan="3" class="style6" background="title.jpg"><div align="center" class="style11">:: STAFF DETAILS :: </div></td>
                    </tr>
                  <tr>
                    <td width="141" height="21" class="style6"><div align="right" class="editstaf2 style1 style2">
                        <div align="left"><span class="style4">Staffid</span></div>
                    </div></td>
                    <td width="13" class="style6">:</td>
                    <td width="230" >
                      <div align="left">
                        <label class="style1"> <?php echo $staffid; ?> </label>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="24" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Name</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <input name="name" type="text" class="box" id="name2" value="<?php echo $name; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <td height="28" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Department Id</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <select name="dept" class="box" id="select5">
                          <option value="0">Select</option>
                          <?php print generate_dept($listdept,$dept); ?>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="24" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Phone</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <input name="phone" type="text" class="box" id="phone2" value="<?php echo $phone; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <td height="24" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Mobile</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <input name="mobile" type="text" class="box" id="mobile2" value="<?php echo $mobile; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <td height="26" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Marital Status</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <select name="marital_status" class="box" id="select6">
                          <option value="0">Select</option>
                          <option value="Married" <?php if($maritalstatus=="Married") echo "selected"; ?>>Married</option>
                          <option value="Unmarried" <?php if($maritalstatus=="Unmarried") echo "selected"; ?>>Unmarried</option>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="72" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Permanent Address</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <textarea name="paddress" class="box" id="textarea"><?php echo $paddress; ?></textarea>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="72" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Temporary Address</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <textarea name="taddress" class="box" id="textarea2"><?php echo $taddress; ?></textarea>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="24" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Date of Birth</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left"><span class="editstaf3 style1">DD</span>
                          <input name="date" type="text" class="box" id="date2" value="<?php $date=substr($dob,8,2); echo $date; ?>" size="2">
                          <span class="style9"><span class="style5">MM</span>
                          <input name="month" type="text" class="box" id="month2" value="<?php $month=substr($dob,5,2); echo $month; ?>" size="2">
                          <span class="style5">YYYY</span>
                          <input name="year" type="text" class="box" id="year2" value="<?php $year=substr($dob,0,4); echo $year; ?>" size="4">
                      </span> </div></td>
                  </tr>
                  <tr>
                    <td height="24" class="style6"><div align="right" class="style3">
                        <div align="left"><span class="style4">Gender</span></div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <select name="gender" class="box" id="select7">
                          <option value="0">select</option>
                          <option value="Male" <?php if($gender=="Male") echo "selected"; ?>>Male</option>
                          <option value="Female" <?php if($gender=="Female") echo "selected"; ?>>Female</option>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="26" class="style6"><div align="right" class="style3">
                        <div align="left">Religion</div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <select name="religion" class="box" id="select8" onChange="return submitForm('religion')">
                          <?php print generate_list($listreligion,$religion); ?>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="26" class="style6"><div align="right" class="style3">
                        <div align="left">Caste</div>
                    </div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <select name="caste" class="box" id="select9">
                          <option value="0">select</option>
                          <?php
if($religion=="Hindu")
{
	if($caste=="Brahmins")
		echo '<option value="Brahmins" selected>Brahmins</option>';
	else
		echo '<option value="Brahmins">Brahmins</option>';
	if($caste=="Menon")
		echo '<option value="Menon" selected>Menon</option>';
	else
		echo '<option value="Menon">Menon</option>';
	if($caste=="Warrier")
		echo '<option value="Warrier" selected>Warrier</option>';
	else
		echo '<option value="Warrier">Warrier</option>';
	if($caste=="Ezhava")
		echo '<option value="Ezhava" selected>Ezhava</option>';
	else
		echo '<option value="Ezhava">Ezhava</option>';
	if($caste=="Nair")
		echo '<option value="Nair" selected>Nair</option>';
	else
		echo '<option value="Nair">Nair</option>';
	if($caste=="OBC")
		echo '<option value="OBC" selected>OBC</option>';
	else
		echo '<option value="OBC">OBC</option>';
	if($caste=="Others")
		echo '<option value="Others" selected>Others</option>';
	else
		echo '<option value="Others">Others</option>';
}
elseif($religion=="Christian")
{
	if($caste=="Roman Catholic")
		echo '<option value="Roman Catholic" selected>Roman Catholic</option>';
	else
		echo '<option value="Roman Catholic">Roman Catholic</option>';
	if($caste=="Syrian Catholic")
		echo '<option value="Syrian Catholic" selected>Syrian Catholic</option>';
	else
		echo '<option value="Syrian Catholic">Syrian Catholic</option>';
	if($caste=="Latin Catholic")
		echo '<option value="Latin Catholic" selected>Latin Catholic</option>';
	else
		echo '<option value="Latin catholic">Latin Catholic</option>';
	if($caste=="Jacobites")
		echo '<option value="Jacobites" selected>Jacobites</option>';
	else
		echo '<option value="Jacobites">Jacobites</option>';
	if($caste=="Penthocoste")
		echo '<option value="Penthocoste" selected>Penthocoste</option>';
	else
		echo '<option value="Penthocoste">Penthocoste</option>';
	if($caste=="Marthomites")
		echo '<option value="Marthomites" selected>Marthomites</option>';
	else
		echo '<option value="Marthomites">Marthomites</option>';
	if($caste=="Orthodox")
		echo '<option value="Orthodox" selected>Orthodox</option>';
	else
		echo '<option value="Orthodox">Orthodox</option>';
	if($caste=="Others")
		echo '<option value="Others" selected>Others</option>';
	else
		echo '<option value="Others">Others</option>';
}
elseif($religion=="Muslim")
	echo '<option value="">None</option>';
?>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td height="28" class="style6 style1"><div align="left" class="style1"><strong>Qualification</strong></div></td>
                    <td class="style6">:</td>
                    <td class="style6">
                      <div align="left">
                        <textarea name="qualification" class="box" id="textarea3"><?php echo $qualification; ?></textarea>
                    </div></td>
                  </tr>
                </table>
                <p align="center">
                  <input name="sendtype" type="hidden" id="sendtype2">
                  <input type="submit" name="Submit" value="Update">
                </p>
                <p>&nbsp; </p>
              </div>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
</body>
</html>
