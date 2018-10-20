<?php
$user=$_COOKIE['user'];
if(substr($user,0,3)=="jec")
	include('./staff_trial.htm');
else if($user=="pat")
	include('./pat_trial.htm');
$staffid=$_COOKIE['user'];
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
@import url("box.css");
.editstaff1 {color: #0033FF; font-size: 16px;}
.editstaf2 {color: #00CC33}
.editstaf3 {
	font-size: 12px;
	color: #00CC33;
}
.style1 {color: #0066FF}
.style3 {color: #0066FF; font-weight: normal; }
.style6 {color: #0033FF}
.style7 {font-weight: bold}
.style8 {color: #0066FF; font-weight: bold; }
.light {
	font-size: 16px;
	color: #0033FF;
}
.princprof3 {font-weight: bold}
.princprof4 {color: #0066FF; font-weight: bold; }
.style9 {color: #000000}
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
			$row = mysql_fetch_array($result);
  				$name=$row['name'];
  				$email=$row['email'];
  				$phone=$row['phone'];
 				 $mobile=$row['mobile'];
				$marital_status=$row['marital_status'];
				 $paddress=$row['paddress'];
				 $taddress=$row['taddress'];
				 $gender=$row['gender'];
					$dob=$row['dob'];
				 $dept=$row['dept'];
 			     $qualification=$row['qualification'];
				 $religion=$row['religion'];
				 $caste=$row['caste'];
$photo=$_COOKIE['user'].".jpg";
 $src="upload/".$photo;
  			}
			}
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="31%" height="365" valign="top"><p class="princprof3"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="style6"></p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
        <p class="princprof3">&nbsp;</p>
    </td>
    <td width="69%" valign="top">
      <table width="200" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><table width="359" border="0" align="center" cellspacing="3">
            <tr>
              <td height="21" colspan="3" class="style6 princprof3" background="title.jpg"><div align="center" class="style9">:: MY PROFILE :: </div></td>
              </tr>
            <tr>
              <td width="139" height="21" class="style6"><div align="right" class="editstaf2 style1 style3 style7 style1">
                  <div align="left"><span class="style4">Staff ID </span></div>
              </div></td>
              <td width="9" class="style6"><span class="style4 style1"><strong>:</strong></span></td>
              <td width="201" class="box">
                <div align="left" class="light"><?php echo $staffid; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right">
                  <div align="left" class="style1 editstaff1"><strong>Name</strong></div>
              </div></td>
              <td class="style6"><span class="style4 style1"><strong>:</strong></span></td>
              <td class="box">
                <div align="left" class="light"> <?php echo $name; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Email</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $email; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Phone</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $phone; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Mobile</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $mobile; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Marital Status</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $marital_status; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Permanent Address</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $paddress; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Temporary Address</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $taddress; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Date of Birth</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light">
                  <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date."-".$month."-".$year; ?>
              </div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Gender</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $gender; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left">Religion</div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $religion; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left">Caste</div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $caste; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6"><div align="right" class="style8 style1">
                  <div align="left"><span class="style4">Deptartment:</span></div>
              </div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $dept; ?></div></td>
            </tr>
            <tr>
              <td height="21" class="style6 style1"><div align="left" class="style8 style1">Qualification:</div></td>
              <td class="style3">:</td>
              <td class="box">
                <div align="left" class="light"> <?php echo $qualification; ?></div></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
