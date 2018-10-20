<?php
if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
	if(isset($_POST['Submit'])){
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
		$con = mysql_connect("localhost","root","");
		
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
			echo "<script type=\"text/javascript\">";
			echo "alert(\"Updated successfully!\");";
			echo "document.location.href=\"stud_edit.php\";";
			echo "</script>";
		}
	}
	include('./trial.htm');
	$studid=$_COOKIE['studid'];
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
.addstud {color: #0066FF}
.studet1 {font-size: 12px}
.studet12 {font-size: 14px}
.style4 {color: #FFFFFF;
	font-size: 12px;
}
.style4 {color: #FFFFF;
	font-size: 9px;
}
.style4 {color: #000000;font-size: 14px;}
.style5 {
	font-size: 14px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
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
			mysql_close();	
			}
			
?>

<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td background="title.jpg"><p align="center" class="style4"><strong>A</strong></p>
          <p align="center" class="style4"><strong>D</strong></p>
          <p align="center" class="style4"><strong>M</strong></p>
          <p align="center" class="style4"><strong>I</strong></p>
          <p align="center" class="style4"><strong>N</strong></p>
          <p align="center" class="style4"><strong>I</strong></p>
          <p align="center" class="style4"><strong>S</strong></p>
          <p align="center" class="style4"><strong>T</strong></p>
          <p align="center" class="style4"><strong>R</strong></p>
          <p align="center" class="style4"><strong>A</strong></p>
          <p align="center" class="style4"><strong>T</strong></p>
          <p align="center" class="style4"><strong>O</strong></p>
          <p align="center" class="style4"><strong>R</strong></p></td>
      <td valign="top"><div align="center">
          <table width="410" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
            <tr>
              <td bgcolor="#FFFFFF">
                <table width="410" border="0" align="center" cellspacing="0">
                  <tr>
                    <th height="28" colspan="3" scope="row" background="title.jpg"><span class="style4"><strong>:: STUDENT DETAILS ::</strong></span></th>
                  </tr>
                  <tr>
                    <th width="119" height="26" scope="row"><div align="right" class="studet3 studet12 studet14">
                        <div align="left">Date of Birth</div>
                    </div></th>
                    <td width="10"><span class="studet14"><strong>:</strong></span></td>
                    <td width="229"><div align="left" class="studet14">
                        <div align="left"><span class="studet1">DD</span>
                            <input name="date" type="text" class="box" id="date4" value="<?php $date=substr($dob,8,2); echo $date; ?>" size="2">
                            <span class="studet1">MM
                            <input name="month" type="text" class="box" id="month4" value="<?php echo $month=substr($dob,5,2); $month; ?>" size="2">
                        YYYY
                        <input name="year" type="text" class="box" id="year4" value="<?php echo $year=substr($dob,0,4); $year; ?>" size="4">
                          </span></div>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="26" scope="row"><div align="right" class="studet15">
                        <div align="left">Gender</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left" class="studet14">
                        <div align="left">
                          <select name="gender" class="box" id="select7">
                            <option value="0">select</option>
                            <option value="Male" <?php if($gender=="Male") echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if($gender=="Female") echo "selected"; ?>>Female</option>
                          </select>
                        </div>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="72" valign="top" scope="row"><div align="right" class="studet15">
                        <div align="left">
                          <p>Permanent address</p>
                        </div>
                    </div></th>
                    <td valign="top"><span class="studet14"><strong>:</strong></span></td>
                    <td valign="top"><div align="left" class="studet14">
                        <div align="left">
                          <textarea name="paddress" rows="3" class="box" id="textarea7"><?php echo $paddress; ?></textarea>
                        </div>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="72" scope="row" valign="top"><div align="right" class="studet15">
                        <div align="left">
                          <p>Temporary Address</p>
                        </div>
                    </div></th>
                    <td valign="top"><span class="studet14"><strong>:</strong></span></td>
                    <td valign="top"><div align="left" class="studet14">
                        <textarea name="taddress" rows="3" class="box" id="textarea8"><?php echo $taddress; ?></textarea>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="24" scope="row"><div align="right" class="studet15">
                        <div align="left">Phone No</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left" class="studet14">
                        <div align="left">
                          <input name="phone" type="text" class="box" id="phone4" value="<?php echo $phone; ?>">
                        </div>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="24" scope="row"><div align="right" class="studet15">
                        <div align="left">Email</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left" class="studet14">
                        <div align="left">
                          <input name="email" type="text" class="box" id="email4" value="<?php echo $email; ?>">
                        </div>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="26" scope="row"><div align="right" class="studet14">
                        <div align="left"><span class="studet12">Religion</span></div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left"><span class="studet14">
                        <select name="religion" class="box" id="select8" onChange="return submitForm('religion')">
                          <?php print generate_list($listreligion,$religion); ?>
                        </select>
                    </span></div></td>
                  </tr>
                  <tr>
                    <th height="26" scope="row"><div align="right" class="studet14">
                        <div align="left"><span class="studet12">Caste</span></div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left"><span class="studet14">
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
{
//echo '<option value="">None</option>';
}
?>
                        </select>
                    </span></div></td>
                  </tr>
                  <tr valign="top">
                    <th height="26" scope="row"><div align="right" class="studet12 studet14">
                        <div align="left">Extra Curricular Activities</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left">
                        <textarea name="extra_activities" rows="3" class="box" id="textarea9"><?php echo $extra_activities; ?>
            </textarea>
                    </div></td>
                  </tr>
                </table>
                <table width="410" border="0" align="center" cellspacing="0">
                  <tr bgcolor="#0099FF">
                    <th height="19" colspan="3" class="studet12" scope="row"><span class="studet12"><strong>:: Guardian Details :: </strong></span></th>
                  </tr>
                  <tr>
                    <th width="106" class="studet12" scope="row"><div align="right" class="studet3 studet12 studet14">
                        <div align="left">Name</div>
                    </div></th>
                    <td width="5"><span class="studet14"><strong>:</strong></span></td>
                    <td width="203"><div align="left">
                        <input name="gname" type="text" class="box" id="gname4" value="<?php echo $gname; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <th class="studet12" scope="row"><div align="right" class="studet15">
                        <div align="left">Relation</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left">
                        <input name="relation" type="text" class="box" id="relation4" value="<?php echo $relation; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <th class="studet12" scope="row"><div align="right" class="studet15">
                        <div align="left">Occupation</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left">
                        <input name="occupation" type="text" class="box" id="occupation4"  value="<?php echo $occupation; ?>">
                    </div></td>
                  </tr>
                  <tr>
                    <th class="studet12" scope="row"><div align="right" class="studet15">
                        <div align="left">Contact No</div>
                    </div></th>
                    <td><span class="studet14"><strong>:</strong></span></td>
                    <td><div align="left">
                        <input name="contact_no" type="text" class="box" id="contact_no4" value="<?php echo $contact_no; ?>">
                    </div></td>
                  </tr>
              </table></td>
            </tr>
          </table>
      </div></td>
      <td valign="top"><table width="410" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF">
              <table width="410" border="0" align="center">
                <tr>
                  <th height="28" colspan="3" scope="row" background="title.jpg"><span class="studet2 studet14 studet12"><span class="studet2  studet14 studet1"><span class="studet2  studet14 style2"><span class="style5">:: ACADEMIC DETAILS ::</span></span></span></span></th>
                </tr>
                <tr bgcolor="#0099FF">
                  <th height="28" colspan="3" scope="row"><div align="right" class="studet15">
                      <div align="center" class="style4">:: +2 DETAILS :: </div>
                  </div></th>
                </tr>
                <tr>
                  <th width="119" height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Institution</div>
                  </div></th>
                  <td width="10"><span class="studet14"><strong>:</strong></span></td>
                  <td width="229"><div align="left" class="studet14">
                      <div align="left">
                        <input name="xinst" type="text" class="box" id="xinst" value="<?php echo $xinst; ?>" size="37">
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
                        <input name="xboard" type="text" class="box" id="xboard2" value="<?php echo $xboard; ?>">
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
                        <input name="xyear" type="text" class="box" id="xyear" value="<?php echo $xyear; ?>">
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
                        <input name="xmarks" type="text" class="box" id="xmarks" value="<?php echo $xmarks; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet12">Maximum Marks </span></div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14">
                      <input name="xmaxmarks" type="text" class="box" id="xmaxmarks2" value="<?php echo $xmaxmarks; ?>">
                  </span></div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet12">Maths</span></div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14"> Obt. Marks
                            <input name="maths" type="text" class="box" id="maths4" value="<?php echo $maths; ?>" size="3">
        &nbsp; Max Marks
                            <input name="maxmaths" type="text" class="box" id="maxmaths4" value="<?php echo $maxmaths; ?>" size="3">
                  </span></div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet12 studet14">
                      <div align="left">Physics</div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14">Obt. Marks
                            <input name="phy" type="text" class="box" id="phy2" value="<?php echo $phy; ?>" size="3">
        &nbsp; Max Marks
                            <input name="maxphy" type="text" class="box" id="maxphy2" value="<?php echo $maxphy; ?>" size="3">
                  </span></div></td>
                </tr>
                <tr>
                  <th height="26" scope="row"><div align="left" class="addstud">Chem</div></th>
                  <td><span class="addstud"><strong>:</strong></span></td>
                  <td><span class="studet14">Obt. Marks
                        <input name="chem" type="text" class="box" id="chem" value="<?php echo $chem; ?>" size="3">
      &nbsp; Max Marks
                        <input name="maxchem" type="text" class="box" id="maxchem" value="<?php echo $maxchem; ?>" size="3">
                  </span></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet3 studet12 studet14">
                      <div align="left">CET Rank </div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left" class="studet14">
                      <div align="left"><span class="studet1">
                        <input name="cetrank" type="text" class="box" id="cetrank" value="<?php echo $cetrank; ?>" size="10">
                      </span></div>
                  </div></td>
                </tr>
              </table>
              <table width="410" border="0" align="center">
                <tr bgcolor="#0099FF">
                  <th height="28" colspan="3" class="studet12" scope="row"><span class="studet12"><strong>:: 10th DETAILS :: </strong></span></th>
                </tr>
                <tr>
                  <th width="106" height="24" scope="row"><div align="right" class="studet15">
                      <div align="left">Institution</div>
                  </div></th>
                  <td width="5"><span class="studet14"><strong>:</strong></span></td>
                  <td width="203"><div align="left" class="studet14">
                      <div align="left">
                        <input name="xiiinst" type="text" class="box" id="xiiinst" value="<?php echo $xiiinst; ?>" size="37">
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
                        <input name="xiiboard" type="text" class="box" id="xiiboard" value="<?php echo $xiiboard; ?>">
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
                        <input name="xiiyear" type="text" class="box" id="xyear" value="<?php echo $xiiyear; ?>">
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
                        <input name="xiimarks" type="text" class="box" id="xmarks" value="<?php echo $xiimarks; ?>">
                      </div>
                  </div></td>
                </tr>
                <tr>
                  <th height="24" scope="row"><div align="right" class="studet14">
                      <div align="left"><span class="studet12">Maximum Marks </span></div>
                  </div></th>
                  <td><span class="studet14"><strong>:</strong></span></td>
                  <td><div align="left"><span class="studet14">
                      <input name="xiimaxmarks" type="text" class="box" id="xmaxmarks2" value="<?php echo $xiimaxmarks; ?>">
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
