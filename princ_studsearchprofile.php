<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
	$user=$_COOKIE['user'];
	if($user=="principal")
		include('./princ_trial.htm');
	else
		include('./hod_trial.htm');
		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0033FF;
	font-weight: bold;
}
.style2 {color: #0033FF}
.light {
	font-variant: small-caps;
	color: #000000;
	font-weight: bold;
}
.butstyle {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	font-weight: bold;
	color: #0033FF;
	background-color: #67C4FF;
	width: 115px;
	cursor: hand;
}-->
</style>
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
.style3 {color: #0066FF}
.style4 {font-weight: bold}
body {
	margin-bottom: 0px;
}
.addstud {color: #0066FF}
.studet1 {font-size: 12px}
.studet12 {font-size: 14px}
.studet14 {color: #0066FF}
.studet15 {color: #0066FF; font-size: 14px; }
.style6 {color: #000000}
.style7 {color: #0066FF; font-weight: bold; }
.style10 {font-style: italic; color: #0066FF;}
.style11 {font-weight: bold; font-size: 14px; }
-->
</style>
</head>

<body>
<?php
	$studid=$_COOKIE['studid'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
			mysql_select_db("campusinfocom", $con);
			$result1 = mysql_query("SELECT * FROM student WHERE studid='$studid'");
     $result2 = mysql_query("SELECT * FROM studet WHERE studid='$studid'");
			while($row = mysql_fetch_array($result1))
  			{
  				$name=$row['name'];
  				$urollno=$row['urollno'];
  				$dept=$row['dept'];
 				$sem=$row['sem'];
 				$rollno=$row['rollno'];
				$photo=$row['photo'];
				$src="upload/".$photo;
				}
				while($row = mysql_fetch_array($result2))
				{
				$dob=$row['dob'];
  				$gender=$row['gender'];
				$paddress=$row['paddress'];
				$taddress=$row['taddress'];
  				$phone=$row['phone'];
 				$email=$row['email'];
				$religion=$row['religion'];				 
				$caste=$row['caste'];
				$extra_activities=$row['extra_activities'];
				$gname=$row['gname'];
				$relation=$row['relation'];
				$occupation=$row['occupation'];
				$contact_no=$row['contact_no'];
				
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
			
?>
<p>&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="18%" valign="top"><table width="144" border="0">
        <tr>
          <td><img alt="" name="photo" width="137" height="169" border="2" src="<?php echo $src; ?>"></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><div align="center"><span class="light"><?php echo $name; ?></span></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="134"><div align="center">
              <form name="form2" method="post" action="princ_att_generate.php">
                <input name="Submit" type="submit" class="butstyle" value="Attendance">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form3" method="post" action="princ_extmarks.php">
                <input name="Submit2" type="submit" class="butstyle" value="External Marks">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="form4" method="post" action="princ_intmarks.php">
                <input name="Submit3" type="submit" class="butstyle" value="Internal Marks">
              </form>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
              <form name="formttt" method="post" action="greencard.php">
                <input name="Submit3" type="submit" class="butstyle" value="White Report">
              </form>
          </div></td>
        </tr>
      </table>      </td>
    <td width="41%" valign="top"><table width="200" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
      <tr>
        <td bgcolor="#FFFFFF"><table width="374" border="0" align="center">
          <tr>
            <td colspan="3" background="title.jpg"><div align="center"><strong>:: PROFILE :: </strong></div></td>
          </tr>
          <tr>
            <td width="182"><div align="left" class="style1 style3">Student id</div></td>
            <td width="5" class="style2"><strong>:</strong></td>
            <td width="173" class="style7"><strong><?php echo $studid; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style1 style3">Name</div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $name; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style1 style3">University roll no </div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $urollno; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style1 style3">Department</div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $dept; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style1 style3">Semester</div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $sem; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style1 style3">Class Roll no </div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $rollno; ?></strong></td>
          </tr>
          <tr>
            <td height="24" class="style6"><div align="right" class="editstaf2 style3">
                <div align="left" class="style4"><strong>Date of Birth</strong></div>
            </div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7">
              <strong>
              <?php $date=substr($dob,8,2); $month=substr($dob,5,2); $year=substr($dob,0,4); echo $date."-".$month."-".$year; ?>
              </strong>              </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Gender</strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $gender; ?></strong></td>
          </tr>
          <tr valign="top">
            <td height="47"><div align="left" class="style3"><strong>Permanent Address </strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $paddress; ?></strong></td>
          </tr>
          <tr valign="top">
            <td height="50"><div align="left" class="style3"><strong>Temporory Address </strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $taddress; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Phone no </strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $phone; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Email</strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $email; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Religion</strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $religion; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Caste</strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $caste; ?></strong></td>
          </tr>
          <tr valign="top">
            <td height="37" class="style1 style3">Extra-curricular activities</td>
            <td class="style1">:</td>
            <td class="style7"><strong><?php echo $extra_activities; ?></strong></td>
          </tr>
          <tr bgcolor="#0099FF">
            <td colspan="3"><div align="center" class="style11">:: GUARDIAN DETAILS :: </div></td>
            </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Guardian name </strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $gname; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Relation</strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $relation; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Occupation</strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $occupation; ?></strong></td>
          </tr>
          <tr>
            <td><div align="left" class="style3"><strong>Contact no </strong></div></td>
            <td class="style2"><strong>:</strong></td>
            <td class="style7"><strong><?php echo $contact_no; ?></strong></td>
          </tr>
        </table></td>
      </tr>
    </table>      </td>
    <td width="41%" valign="top"><table width="410" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
      <tr>
        <td bgcolor="#FFFFFF">
          <table width="410" border="0" align="center">
            <tr>
              <th height="28" colspan="3" scope="row" background="title.jpg"><span class="studet2 studet14 studet12"><span class="studet2  studet14 studet1"><span class="studet2  studet14 style2"><span class="studet14 studet12 style4 style6"><strong>:: ACADEMIC DETAILS ::</strong></span></span></span></span></th>
            </tr>
            <tr bgcolor="#0099FF">
              <th height="28" colspan="3" scope="row"><div align="right" class="studet15">
                  <div align="center" class="style6">:: +2 DETAILS :: </div>
              </div></th>
            </tr>
            <tr>
              <th width="119" height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Institution</div>
              </div></th>
              <td width="10"><span class="studet14"><strong>:</strong></span></td>
              <td width="229"><div align="left" class="studet14 style4">
                  <div align="left">
                    <?php echo $xinst; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Board</div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="studet14 style4">
                  <div align="left">
                  <?php echo $xboard; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Year</div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="studet14 style4">
                  <div align="left">
                    <?php echo $xyear; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Obtained Marks </div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="studet14 style4">
                  <div align="left">
                    <?php echo $xmarks; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet14">
                  <div align="left"><span class="studet12">Maximum Marks </span></div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="style4"><span class="style7">
                  <?php echo $xmaxmarks; ?>
              </span></div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet14">
                  <div align="left"><span class="studet12">Maths</span></div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left"> <span class="studet14"><em>Obt. Marks</em>:</span><span class="style7">                    <?php echo $maths; ?>
&nbsp; </span><span class="studet14"><em class="style10">Max Marks</em>:</span><span class="style7">              <?php echo $maxmaths; ?>
              </span></div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet12 studet14">
                  <div align="left">Physics</div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left"><span class="studet14"><em>Obt. Marks</em>:</span><span class="style7">                    <?php echo $phy; ?> &nbsp; </span><span class="studet14"><em>Max Marks</em><span class="studet14">:</span></span><span class="style7">              <?php echo $maxphy; ?>
              </span></div></td>
            </tr>
            <tr>
              <th height="26" scope="row"><div align="left" class="addstud">Chem</div></th>
              <td><span class="addstud"><strong>:</strong></span></td>
              <td><span class="style10">Obt. Marks</span><span class="studet14">:</span><span class="style7">                  <?php echo $chem; ?> &nbsp; </span><span class="style10">Max Marks</span><span class="studet14"><span class="studet14">:</span></span><span class="studet14 style4"> <?php echo $maxchem; ?>
              </span></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet3 studet12 studet14">
                  <div align="left">CET Rank </div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="studet14 style4">
                  <div align="left"><span class="style7">
                    <?php echo $cetrank; ?>
                  </span></div>
              </div></td>
            </tr>
          </table>
          <table width="410" border="0" align="center">
            <tr bgcolor="#0099FF">
              <th height="28" colspan="3" class="studet12" scope="row"><span class="studet14 style4 style6"><strong>:: 10th DETAILS :: </strong></span></th>
            </tr>
            <tr>
              <th width="106" height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Institution</div>
              </div></th>
              <td width="5"><span class="studet14"><strong>:</strong></span></td>
              <td width="203"><div align="left" class="style7">
                  <div align="left">
                    <?php echo $xiiinst; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Board</div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="style7">
                  <div align="left">
                    <?php echo $xiiboard; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Year</div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="style7">
                  <div align="left">
                    <?php echo $xiiyear; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet15">
                  <div align="left">Obtained Marks </div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left" class="style7">
                  <div align="left">
                    <?php echo $xiimarks; ?>
                  </div>
              </div></td>
            </tr>
            <tr>
              <th height="24" scope="row"><div align="right" class="studet14">
                  <div align="left"><span class="studet12">Maximum Marks </span></div>
              </div></th>
              <td><span class="studet14"><strong>:</strong></span></td>
              <td><div align="left"><strong><span class="studet14">
                  <?php echo $xiimaxmarks; ?>
              </span></strong></div></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
