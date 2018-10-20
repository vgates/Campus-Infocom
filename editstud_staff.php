<?php
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
	if(isset($_POST['Submit'])){
		$name=$_POST['name'];
		$urn=strtoupper($_POST['urollno']);
		$dept=$_POST['dept'];
		$sem=$_POST['sem'];
		$rn=$_POST['rollno'];
		$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
		$gender=$_POST['gender'];
		$p=$_POST['paddress'];
		$t=$_POST['taddress'];
		$phone=$_POST['phone'];
		$e=$_POST['email'];
		$g=$_POST['gname'];
		$r=$_POST['relation'];
		$o=$_POST['occupation'];
		$c=$_POST['contact_no'];
		$religion=$_POST['religion'];
		$caste=$_POST['caste'];
		$studid=$_COOKIE['studid'];
		$extra_activities=$_POST['extra_activities'];
		
	$cetrank=$_POST['cetrank'];
	$xinst=$_POST['xinst'];
	$xboard=$_POST['xboard'];
	$xyear=$_POST['xyear'];
	$xmarks=$_POST['xmarks'];
	$xmaxmarks=$_POST['xmaxmarks'];
	$xiiinst=$_POST['xiiinst'];
	$xiiboard=$_POST['xiiboard'];
	$xiiyear=$_POST['xiiyear'];
	$xiimarks=$_POST['xiimarks'];
	$xiimaxmarks=$_POST['xiimaxmarks'];
	$maths=$_POST['maths'];
	$maxmaths=$_POST['maxmaths'];
	$phy=$_POST['phy'];
	$maxphy=$_POST['maxphy'];
	$chem=$_POST['chem'];
	$maxchem=$_POST['maxchem'];
	
		$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{ 
			mysql_select_db("campusInfocom", $con);
			mysql_query("UPDATE studet SET dob='$dob' WHERE studid='$studid'");		
			mysql_query("UPDATE studet SET gender='$gender' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET paddress='$p' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET taddress='$t' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET phone='$phone' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET email='$e' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET religion='$religion' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET caste='$caste' WHERE studid='$studid'");	
			mysql_query("UPDATE studet SET extra_activities='$extra_activities' WHERE studid='$studid'");		
			mysql_query("UPDATE studet SET gname='$g' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET relation='$r' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET occupation='$o' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET contact_no='$c' WHERE studid='$studid'");
			mysql_query("UPDATE student SET name='$name' WHERE studid='$studid'");		
			mysql_query("UPDATE student SET urollno='$urn' WHERE studid='$studid'");
			mysql_query("UPDATE student SET sem=$sem WHERE studid='$studid'");
			mysql_query("UPDATE student SET dept='$dept' WHERE studid='$studid'");
			mysql_query("UPDATE student SET rollno=$rn WHERE studid='$studid'");		
			
			mysql_query("UPDATE studet SET xinst='$xinst' WHERE studid='$studid'");		
			mysql_query("UPDATE studet SET xboard='$xboard' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET xyear='$xyear' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET xmarks='$xmarks' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET xmaxmarks='$xmaxmarks' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET cetrank='$cetrank' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET maths='$maths' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET maxmaths='$maxmaths' WHERE studid='$studid'");	
			mysql_query("UPDATE studet SET phy='$phy' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET maxphy='$maxphy' WHERE studid='$studid'");	
			mysql_query("UPDATE studet SET chem='$chem' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET maxchem='$maxchem' WHERE studid='$studid'");	
			mysql_query("UPDATE studet SET xiiinst='$xiiinst' WHERE studid='$studid'");		
			mysql_query("UPDATE studet SET xiiboard='$xiiboard' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET xiiyear='$xiiyear' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET xiimarks='$xiimarks' WHERE studid='$studid'");
			mysql_query("UPDATE studet SET xiimaxmarks='$xiimaxmarks' WHERE studid='$studid'");
			mysql_close();				
			header('Location: edit_studprof_staff.php');
			exit();
		}
	}
	include('./staff_trial.htm');
	$studid=$_COOKIE['studid'];
$user=$_COOKIE['user'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
 	die('Could not connect: ' . mysql_error());
}
mysql_select_db("campusinfocom",$con);
		$result = mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		$row = mysql_fetch_array($result);
		$photo=$row['photo'];
		$src="upload/".$photo;
mysql_close($con);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.studet2 {
	font-size: 18px;
	color: #00CC33;
	font-weight: normal;
}
.studet3 {color: #00CC33}
.studet4 {font-size: 12px; color: #00CC33; }
.studet14 {color: #0066FF}
.studet15 {color: #0066FF; font-size: 14px; }
.studet16 {font-size: 14px}
.studet17 {font-size: 12px}
.studet18 {font-size: 18px; color: #0066FF; font-weight: normal; }
.studedit3 {
	color: #0033FF;
	font-weight: normal;
}
.style1 {color: #0033FF}
.style2 {font-size: 9px}
.style3 {font-weight: bold}
.style4 {color: #0066FF; font-weight: bold; }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
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
.attmain1 {color: #0066FF}
.editstud5 {color: #0033FF}
.princprof3 {font-weight: bold}
.addstud {color: #0066FF}
.studet1 {font-size: 12px}
.studet12 {font-size: 14px}
.style6 {color: #000000}
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
function generate_list($all_list,$selected_item){
 $t_dump="n";
 foreach ($all_list as $abrv => $value) {
  //$t_dump.="                                ";
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  //$t_dump.="n";
  }
 return $t_dump; 
}
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("campusinfocom", $con);
$result = mysql_query("SELECT * FROM department");
while($row = mysql_fetch_array($result))
  {
  $i=$row['dept'];
  $j=$row['name'];
  $listdept[$i]=$j;
  }
mysql_close($con);
$listreligion['XX'] = 'Select';
$listreligion['Hindu'] = 'Hindu';
$listreligion['Christian'] = 'Christian';
$listreligion['Muslim'] = 'Muslim';
$religion=$_POST['religion'];
$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
$gender=$_POST['gender'];
$paddress=$_POST['paddress'];
$taddress=$_POST['taddress'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$extra_activities=$_POST['extra_activities'];
$gname=$_POST['gname'];
$relation=$_POST['relation'];
$occupation=$_POST['occupation'];
$contact_no=$_POST['contact_no'];
$name=$_POST['name'];
$urollno=strtoupper($_POST['urollno']);
$dept=$_POST['dept'];
$sem=$_POST['sem'];
$rollno=$_POST['rollno'];
?>
<?php
if($religion==NULL){
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$result = mysql_query("SELECT * FROM studet WHERE studid='$studid'");

			while($row = mysql_fetch_array($result))
  			{
  				$dob=$row['dob'];
  				$gender=$row['gender'];
				$paddress=$row['paddress'];
				$taddress=$row['taddress'];
  				$phone=$row['phone'];
 				$email=$row['email'];
				$religion=$row['religion'];				 
				$caste=$row['caste'];
				$gname=$row['gname'];
				$relation=$row['relation'];
				$occupation=$row['occupation'];
				$contact_no=$row['contact_no'];
				$extra_activities=$row['extra_activities'];
				
				$cetrank=$row['cetrank'];
				$xinst=$row['xinst'];
				$xboard=$row['xboard'];
				$xyear=$row['xyear'];
				$xmarks=$row['xmarks'];
				$xmaxmarks=$row['xmaxmarks'];
				$xiiinst=$row['xiiinst'];
				$xiiboard=$row['xiiboard'];
				$xiiyear=$row['xiiyear'];
				$xiimarks=$row['xiimarks'];
				$xiimaxmarks=$row['xiimaxmarks'];
				$maths=$row['maths'];
				$maxmaths=$row['maxmaths'];
				$phy=$row['phy'];
				$maxphy=$row['maxphy'];
				$chem=$row['chem'];
				$maxchem=$row['maxchem'];
 			 }
  			}
			$result2 = mysql_query("SELECT * FROM student WHERE studid='$studid'");

			while($row2 = mysql_fetch_array($result2))
  			{
  				$name=$row2['name'];
  				$urollno=$row2['urollno'];
  				$dept=$row2['dept'];
 				 $sem=$row2['sem'];
 				 $rollno=$row2['rollno'];
 			 }
			mysql_close();	
			}
			
?>

<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="980" border="0" align="center">
    <tr>
      <td width="16%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="editstud5"></p>
          <p class="princprof3">&nbsp;</p>
          <p class="princprof3">&nbsp;</p>
          <p class="princprof3">&nbsp;</p>
          <p class="princprof3">&nbsp;</p></td>
      <td width="42%" valign="top">
        <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td height="150" bgcolor="#FFFFFF">
              <table width="400" border="0" align="center">
                <tr>
                  <th colspan="3" scope="row" background="title.jpg">:: STUDENT DETAILS :: </th>
                </tr>
                <tr>
                  <th width="138" scope="row"><div align="right" class="studedit3 style3">
                      <div align="left" class="studet14">Student Id</div>
                  </div></th>
                  <th width="10" scope="row"><span class="editstud5">:</span></th>
                  <td width="202"><span class="style1 style1">
                    <label class="studedit3"><?php echo $studid; ?></label>
&nbsp;</span></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="style4">
                      <div align="left">Name</div>
                  </div></th>
                  <th scope="row"><span class="editstud5">:</span></th>
                  <td><input name="name" type="text" class="box" id="name3" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="style4">
                      <div align="left">University Rollno</div>
                  </div></th>
                  <th scope="row"><span class="editstud5">:</span></th>
                  <td><input name="urollno" type="text" class="box" id="urollno3" value="<?php echo $urollno; ?>"></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="style4">
                      <div align="left">Department</div>
                  </div></th>
                  <th scope="row"><span class="editstud5">:</span></th>
                  <td><span class="style1 style1">
                    <select name="dept" id="select7" class="box" >
                      <option value="0">Select</option>
                      <?php print generate_dept($listdept,$dept); ?>
                    </select>
                  </span></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="style4">
                      <div align="left">Semester</div>
                  </div></th>
                  <th scope="row"><span class="editstud5">:</span></th>
                  <td><span class="style1 style1">
                    <select name="sem" id="select8" class="box" >
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
                <tr>
                  <th scope="row"><div align="right" class="style4">
                      <div align="left">Class Rollno</div>
                  </div></th>
                  <th scope="row"><span class="editstud5">:</span></th>
                  <td><input name="rollno" type="text" class="box" id="rollno3" value="<?php echo $rollno; ?>"></td>
                </tr>
                <tr>
                  <th height="26" scope="row"><div align="right" class="studet3 style12 studet14">
                      <div align="left">Date of Birth</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left" class="studet14 style2"> DD
                          <input name="date" type="text" class="box" id="date3" value="<?php $date=substr($dob,8,2); echo $date; ?>" size="2">
                          <span class="studet1">MM
                          <input name="month" type="text" class="box" id="month3" value="<?php $month=substr($dob,5,2); echo $month; ?>" size="2">
                    YYYY
                    <input name="year" type="text" class="box" id="year3" value="<?php $year=substr($dob,0,4); echo $year; ?>" size="4">
                      </span></div></td>
                </tr>
                <tr>
                  <th height="26" scope="row"><div align="right" class="studet15">
                      <div align="left">Gender</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left" class="studet14">
                      <select name="gender" class="box" id="select9">
                        <option value="0">select</option>
                        <option value="Male" <?php if($gender=="Male") echo "selected"; ?>>Male</option>
                        <option value="Female" <?php if($gender=="Female") echo "selected"; ?>>Female</option>
                      </select>
                  </div></td>
                </tr>
                <tr valign="top">
                  <th height="72" scope="row"><div align="right" class="studet15">
                      <div align="left">Permanent address</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left" class="studet14">
                      <textarea name="paddress" rows="3" class="box" id="textarea4"><?php echo $paddress; ?></textarea>
                  </div></td>
                </tr>
                <tr valign="top">
                  <th height="72" scope="row"><div align="right" class="studet15">
                      <div align="left">Temporary Address</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left" class="studet14">
                      <textarea name="taddress" rows="3" class="box" id="textarea5"><?php echo $taddress; ?></textarea>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Phone No</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left" class="studet14">
                      <input name="phone" type="text" class="box" id="phone3" value="<?php echo $phone; ?>">
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Email</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left" class="studet14">
                      <input name="email" type="text" class="box" id="email3" value="<?php echo $email; ?>">
                  </div></td>
                </tr>
                <tr>
                  <th height="26" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet16">Religion</span></div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><span class="studet14">
                    <select name="religion" class="box" id="select10" onChange="return submitForm('religion')">
                      <?php print generate_list($listreligion,$religion); ?>
                    </select>
                  </span></td>
                </tr>
                <tr>
                  <th height="26" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet16">Caste</span></div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><span class="studet14">
                    <select name="caste" class="box" id="select11">
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
{
echo '<option value="">None</option>';
}
?>
                    </select>
                  </span></td>
                </tr>
                <tr valign="top">
                  <th height="26" scope="row"><div align="right" class="studet15">
                      <div align="left">Extra Curricular Activities</div>
                  </div></th>
                  <th scope="row"><div align="center"><span class="editstud5">:</span></div></th>
                  <td class="studedit3"><div align="left">
                      <textarea name="extra_activities" rows="3" class="box" id="textarea6"><?php echo $extra_activities; ?>
              </textarea>
                  </div></td>
                </tr>
              </table>
              <table width="400" border="0" align="center">
                <tr bgcolor="#67C4FF">
                  <th colspan="3" scope="row">:: Guardian Details :: </th>
                </tr>
                <tr>
                  <th width="126" scope="row"><div align="right" class="studet3 style12 studet14">
                      <div align="left">Name</div>
                  </div></th>
                  <th width="11" scope="row"><span class="studedit3">:</span></th>
                  <td width="208" class="studedit3"><div align="left">
                      <input name="gname" type="text" class="box" id="gname3" value="<?php echo $gname; ?>">
                  </div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studet15">
                      <div align="left">Relation</div>
                  </div></th>
                  <th scope="row"><span class="studedit3">:</span></th>
                  <td class="studedit3"><div align="left">
                      <input name="relation" type="text" class="box" id="relation3" value="<?php echo $relation; ?>">
                  </div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studet15">
                      <div align="left">Occupation</div>
                  </div></th>
                  <th scope="row"><span class="studedit3">:</span></th>
                  <td class="studedit3"><div align="left">
                      <input name="occupation" type="text" class="box" id="occupation3"  value="<?php echo $occupation; ?>">
                  </div></td>
                </tr>
                <tr>
                  <th scope="row"><div align="right" class="studet15">
                      <div align="left">Contact No</div>
                  </div></th>
                  <th scope="row"><span class="studedit3">:</span></th>
                  <td class="studedit3"><div align="left">
                      <input name="contact_no" type="text" class="box" id="contact_no3" value="<?php echo $contact_no; ?>">
                  </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
      <td width="42%" valign="top"><table width="410" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF">
              <table width="410" border="0" align="center">
                <tr>
                  <th height="28" colspan="3" scope="row" background="title.jpg"><span class="studet2 studet14 studet12"><span class="studet2  studet14 studet1"><span class="studet2  studet14 style2"><span class="studet14 studet12 style4 style6"><strong>:: ACADEMIC DETAILS ::</strong></span></span></span></span></th>
                </tr>
                <tr bgcolor="#67C4FF">
                  <th height="28" colspan="3" scope="row"><div align="right" class="studet15">
                      <div align="center" class="style6">:: +2 DETAILS :: </div>
                  </div></th>
                </tr>
                <tr>
                  <th width="119" height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Institution</div>
                  </div></th>
                  <td width="10"><span class="studet14"><strong>:</strong></span></td>
                  <td width="229"><div align="left" class="studet14">
                      <div align="left">
                        <input name="xinst" type="text" class="box" id="xinst2" value="<?php echo $xinst; ?>" size="37">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Board</div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left">
                        <input name="xboard" type="text" class="box" id="xboard" value="<?php echo $xboard; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Year</div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left">
                        <input name="xyear" type="text" class="box" id="xyear2" value="<?php echo $xyear; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Obtained Marks </div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left">
                        <input name="xmarks" type="text" class="box" id="xmarks2" value="<?php echo $xmarks; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet12">Maximum Marks </span></div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14">
                      <input name="xmaxmarks" type="text" class="box" id="xmaxmarks" value="<?php echo $xmaxmarks; ?>">
                  </span></div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet12">Maths</span></div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14"> Obt. Marks
                            <input name="maths" type="text" class="box" id="maths" value="<?php echo $maths; ?>" size="3">
&nbsp; Max Marks
                    <input name="maxmaths" type="text" class="box" id="maxmaths" value="<?php echo $maxmaths; ?>" size="3">
                  </span></div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet12 studet14">
                      <div align="left">Physics</div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14">Obt. Marks
                            <input name="phy" type="text" class="box" id="phy" value="<?php echo $phy; ?>" size="3">
&nbsp; Max Marks
                    <input name="maxphy" type="text" class="box" id="maxphy" value="<?php echo $maxphy; ?>" size="3">
                  </span></div></td>
                </tr>
                <tr>
                  <th height="26" scope="row"><div align="left" class="addstud">Chem</div></th>
                  <td><span class="addstud"><strong>:</strong></span></td>
                  <td><span class="studet14">Obt. Marks
                        <input name="chem" type="text" class="box" id="chem2" value="<?php echo $chem; ?>" size="3">
&nbsp; Max Marks
                  <input name="maxchem" type="text" class="box" id="maxchem2" value="<?php echo $maxchem; ?>" size="3">
                  </span></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet3 studet12 studet14">
                      <div align="left">CET Rank </div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left"><span class="studet1">
                        <input name="cetrank" type="text" class="box" id="cetrank2" value="<?php echo $cetrank; ?>" size="10">
                      </span></div>
                  </div></td>
                </tr>
              </table>
              <table width="410" border="0" align="center">
                <tr bgcolor="#67C4FF">
                  <th height="28" colspan="3" class="studet12" scope="row"><span class="studet14 style4 style6"><strong>:: 10th DETAILS :: </strong></span></th>
                </tr>
                <tr>
                  <th width="106" height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Institution</div>
                  </div></th>
                  <td width="5"><span class="studet14"><strong>:</strong></span></td>
                  <td width="203"><div align="left" class="studet14">
                      <div align="left">
                        <input name="xiiinst" type="text" class="box" id="xiiinst2" value="<?php echo $xiiinst; ?>" size="37">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Board</div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left">
                        <input name="xiiboard" type="text" class="box" id="xiiboard2" value="<?php echo $xiiboard; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Year</div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left">
                        <input name="xiiyear" type="text" class="box" id="xyear2" value="<?php echo $xiiyear; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Obtained Marks </div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left">
                        <input name="xiimarks" type="text" class="box" id="xmarks2" value="<?php echo $xiimarks; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet12">Maximum Marks </span></div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14">
                      <input name="xiimaxmarks" type="text" class="box" id="xmaxmarks" value="<?php echo $xiimaxmarks; ?>">
                  </span></div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p align="center">
    <input name="sendtype" type="hidden" id="sendtype">
    <input name="Submit" type="submit" class="butstyle" value="Update">
  </p>
</form>
</body>
</html>
