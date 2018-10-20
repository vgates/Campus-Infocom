<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
	if(isset($_POST['Submit'])){
	if(empty($_POST['name']))
		{
		
		$c=false;
	}
	else
		$c=$_POST['name'];
	
		$d=$_POST['email'];
	
		$e=$_POST['phone'];
	
		$f=$_POST['mobile'];
	
		$g=$_POST['marital_status'];
	
		$h=$_POST['paddress'];
	
		$i=$_POST['taddress'];
	
		$k=$_POST['gender'];
		$religion=$_POST['religion'];
		$caste=$_POST['caste'];
	
		
	$qualification=$_POST['qualification'];
			$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
		$staffid=$_COOKIE['staffid'];
	if($c)
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$staffid=$_COOKIE['user'];
			mysql_query("UPDATE staff SET name='$c' WHERE staffid='$staffid'");	
			mysql_query("UPDATE staff SET email='$d' WHERE staffid='$staffid'");		
			mysql_query("UPDATE staff SET phone='$e' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET mobile='$f' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET marital_status='$g' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET paddress='$h' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET taddress='$i' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET gender='$k' WHERE staffid='$staffid'");			
			mysql_query("UPDATE staff SET dob='$dob' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET religion='$religion' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET caste='$caste' WHERE staffid='$staffid'");
			mysql_query("UPDATE staff SET qualification='$qualification' WHERE staffid='$staffid'");
			mysql_close();				
			echo "<script type=\"text/javascript\">";
			echo "alert(\"Updated successfully!\");";
			echo "document.location.href=\"princ_home.php\";";
			echo "</script>";
		}
	}
	else
	{
		 echo "<p>PLEASE TRY AGAIN.......!!!</p>";
	}
}
include('./princ_trial.htm');
$staffid=$_COOKIE['user'];
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.editstaff1 {color: #0066FF; text-decoration: underline; font-size: 18px;}
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
.princprof2 {color: #0066FF}
.princprof3 {font-weight: bold}
.princprof4 {color: #0066FF; font-weight: bold; }
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

  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 

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
$deptid=$_POST['deptid'];
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
?>
<?php
$staffid=$_COOKIE['user'];
if($religion==NULL){
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
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
				 $deptid=$row['deptid'];
 			     $qualification=$row['qualification'];
				 $religion=$row['religion'];
				 $caste=$row['caste'];
$photo=$row['photo'];
 $src="upload/".$photo;
				 
	   		 }
  			}}
?>

<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="29%" height="625" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="style6"></p>
      <p class="princprof3">&nbsp;</p>
    </td>
    <td width="71%" valign="top">
      <table width="416" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div align="center">
      <table width="412" border="0" align="center" cellspacing="0">
        <tr>
          <td height="28" colspan="3" class="style6 style2" background="title.jpg"><div align="center">:: EDIT MY PROFILE :: </div></td>
          </tr>
        <tr>
          <td width="138" height="23" class="style6"><div align="right" class="editstaf2 style1 style2">
              <div align="left"><span class="style4">Staffid</span></div>
          </div></td>
          <td width="8" class="style6">:</td>
          <td width="253" class="box">
            <div align="left">
                <?php echo $staffid; ?>
            </div></td>
        </tr>
        <tr>
          <td height="24" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Name</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
              <input name="name" type="text" class="box" id="name" value="<?php echo $name; ?>">
            </div></td>
        </tr>
        <tr>
          <td height="24" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Email</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
              <input name="email" type="text" class="box" id="email" value="<?php echo $email; ?>">
            </div></td>
        </tr>
        <tr>
          <td height="24" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Phone</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
              <input name="phone" type="text" class="box" id="phone" value="<?php echo $phone; ?>">
            </div></td>
        </tr>
        <tr>
          <td height="24" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Mobile</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
              <input name="mobile" type="text" class="box" id="mobile" value="<?php echo $mobile; ?>">
            </div></td>
        </tr>
        <tr>
          <td height="26" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Marital Status</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
                <select name="marital_status" class="box" id="marital_status">
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
                <textarea name="paddress" cols="25" rows="3" class="box" id="paddress"><?php echo $paddress; ?></textarea>
            </div></td>
        </tr>
        <tr>
          <td height="72" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Temporary Address</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
                <textarea name="taddress" cols="25" rows="3" class="box" id="taddress"><?php echo $taddress; ?></textarea>
            </div></td>
        </tr>
        <tr>
          <td height="24" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Date of Birth</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left"><span class="style9 editstaf3 style1">DD</span>
              <input name="date" type="text" class="box" id="date" value="<?php $date=substr($dob,8,2); echo $date; ?>" size="2">
              <span class="style9"><span class="style5">MM</span>
              <input name="month" type="text" class="box" id="month" value="<?php $month=substr($dob,5,2); echo $month; ?>" size="2">
              <span class="style5">YYYY</span>
              <input name="year" type="text" class="box" id="year" value="<?php $year=substr($dob,0,4); echo $year; ?>" size="4">
              </span> </div></td>
        </tr>
        <tr>
          <td height="26" class="style6"><div align="right" class="style3">
              <div align="left"><span class="style4">Gender:</span></div>
          </div></td>
          <td class="style6">:</td>
          <td class="style6">
            <div align="left">
                <select name="gender" class="box" id="gender">
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
                <select name="religion" class="box" id="select2" onChange="return submitForm('religion')">
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
                <select name="caste" class="box" id="select3">
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
            </div></td>
        </tr>
        <tr>
          <td height="28" class="style6 style1"><div align="left"><strong>Qualification</strong></div></td>
          <td class="style6 style1">:</td>
          <td class="style6">
            <div align="left">
                <textarea name="qualification" rows="3" class="box" id="qualification"><?php echo $qualification; ?></textarea>
            </div></td>
        </tr>
      </table>
      <p align="center">
        <input name="sendtype" type="hidden" id="sendtype">
        <input name="Submit" type="submit" class="butstyle" value="Update">
      </p>
      </div>
  </form></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
