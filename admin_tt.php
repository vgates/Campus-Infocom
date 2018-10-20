<?php
include('./trial.htm');
if(isset($_POST['Submit'])){
				$m1=$_POST['m1'];
  				$m2=$_POST['m2'];
				$m3=$_POST['m3'];
				$m4=$_POST['m4'];
				$m5=$_POST['m5'];
				$m6=$_POST['m6'];
				$m7=$_POST['m7'];
				$tu1=$_POST['tu1'];
				$tu2=$_POST['tu2'];
				$tu3=$_POST['tu3'];
				$tu4=$_POST['tu4'];
				$tu5=$_POST['tu5'];
				$tu6=$_POST['tu6'];
				$tu7=$_POST['tu7'];
				$w1=$_POST['w1'];
				$w2=$_POST['w2'];
				$w3=$_POST['w3'];
				$w4=$_POST['w4'];
				$w5=$_POST['w5'];
				$w6=$_POST['w6'];
				$w7=$_POST['w7'];
				$th1=$_POST['th1'];
				$th2=$_POST['th2'];
				$th3=$_POST['th3'];
				$th4=$_POST['th4'];
				$th5=$_POST['th5'];
				$th6=$_POST['th6'];
				$th7=$_POST['th7'];
				$f1=$_POST['f1'];
				$f2=$_POST['f2'];
				$f3=$_POST['f3'];
				$f4=$_POST['f4'];
				$f5=$_POST['f5'];
				$f6=$_POST['f6'];
				$f7=$_POST['f7'];
				$s1=$_POST['s1'];
				$s2=$_POST['s2'];
				$s3=$_POST['s3'];
				$s4=$_POST['s4'];
				$s5=$_POST['s5'];
				$s6=$_POST['s6'];
				$s7=$_POST['s7'];
				$dept=$_POST['dept'];
				$sem=$_POST['sem'];
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{		
			mysql_select_db("campusinfocom", $con);
			$result = mysql_query("SELECT * FROM timetable WHERE sem='$sem' AND dept='$dept'");
			$row = mysql_fetch_array($result);  			
			if($row)
			{
			mysql_query("UPDATE timetable SET m1='$m1' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET m2='$m2' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET m3='$m3' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET m4='$m4' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET m5='$m5' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET m6='$m6' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET m7='$m7' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET tu1='$tu1' WHERE dept='$dept' AND sem='$sem'");	
			mysql_query("UPDATE timetable SET tu2='$tu2' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET tu3='$tu3' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET tu4='$tu4' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET tu5='$tu5' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET tu6='$tu6' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET tu7='$tu7' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w1='$w1' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w2='$w2' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w3='$w3' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w4='$w4' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w5='$w5' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w6='$w6' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET w7='$w7' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th1='$th1' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th2='$th2' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th3='$th3' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th4='$th4' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th5='$th5' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th6='$th6' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET th7='$th7' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f1='$f1' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f2='$f2' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f3='$f3' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f4='$f4' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f5='$f5' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f6='$f6' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET f7='$f7' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s1='$s1' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s2='$s2' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s3='$s3' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s4='$s4' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s5='$s5' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s6='$s6' WHERE dept='$dept' AND sem='$sem'");
			mysql_query("UPDATE timetable SET s7='$s7' WHERE dept='$dept' AND sem='$sem'");
			}
			else
			{
			mysql_query("INSERT INTO timetable VALUES ('$m1','$m2','$m3','$m4','$m5','$m6','$m7','$tu1','$tu2','$tu3','$tu4','$tu5','$tu6','$tu7','$w1','$w2','$w3','$w4','$w5','$w6','$w7','$th1','$th2','$th3','$th4','$th5','$th6','$th7','$f1','$f2','$f3','$f4','$f5','$f6','$f7','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$dept','$sem')");
			}
			mysql_close($con);
			header('Location: admin_home.php');
			exit();
		}
	
}
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
</head>

<body>
<?php
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
$sem=$_POST['sem'];
//generating array of subjects
			if(!empty($_POST['dept'])){
			$con = mysql_connect("localhost","root","");
			if (!$con)
 			{
 			 die('Could not connect: ' . mysql_error());
  			}
			else
			{
			mysql_select_db("campusinfocom", $con);

			$result1 = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");

			while($row = mysql_fetch_array($result1))
 			{
			 $c=$row['subid'];
			 $d=$row['name'];
 			 $listsub[$c]=$d;
 			 }
			 //retrieving details from timetable
			$result2 = mysql_query("SELECT * FROM timetable WHERE sem='$sem' AND dept='$dept'");
			while($row = mysql_fetch_array($result2))
  			{
  				$m1=$row['m1'];
  				$m2=$row['m2'];
				$m3=$row['m3'];
				$m4=$row['m4'];
				$m5=$row['m5'];
				$m6=$row['m6'];
				$m7=$row['m7'];
				$tu1=$row['tu1'];
				$tu2=$row['tu2'];
				$tu3=$row['tu3'];
				$tu4=$row['tu4'];
				$tu5=$row['tu5'];
				$tu6=$row['tu6'];
				$tu7=$row['tu7'];
				$w1=$row['w1'];
				$w2=$row['w2'];
				$w3=$row['w3'];
				$w4=$row['w4'];
				$w5=$row['w5'];
				$w6=$row['w6'];
				$w7=$row['w7'];
				$th1=$row['th1'];
				$th2=$row['th2'];
				$th3=$row['th3'];
				$th4=$row['th4'];
				$th5=$row['th5'];
				$th6=$row['th6'];
				$th7=$row['th7'];
				$f1=$row['f1'];
				$f2=$row['f2'];
				$f3=$row['f3'];
				$f4=$row['f4'];
				$f5=$row['f5'];
				$f6=$row['f6'];
				$f7=$row['f7'];
				$s1=$row['s1'];
				$s2=$row['s2'];
				$s3=$row['s3'];
				$s4=$row['s4'];
				$s5=$row['s5'];
				$s6=$row['s6'];
				$s7=$row['s7'];				
 			 }
			mysql_close($con);
			}}
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
?>	  
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div align="center">
    <p>&nbsp;</p>
    <p><img src="tt.jpg" width="215" height="60">    
    </p>
    <table width="363" border="0" align="center">
      <tr>
        <th width="77" scope="row"><div align="right">Semester:</div></th>
        <td width="73"><select name="sem" id="select53"   onChange="return submitForm('sem')">
          <option value="0">select</option>
          <option value="1" <?php if($sem=="1") echo "selected"; ?>>S1 &amp; S2</option>
          <option value="3" <?php if($sem=="3") echo "selected"; ?>>S3</option>
          <option value="4" <?php if($sem=="4") echo "selected"; ?>>S4</option>
          <option value="5" <?php if($sem=="5") echo "selected"; ?>>S5</option>
          <option value="6" <?php if($sem=="6") echo "selected"; ?>>S6</option>
          <option value="7" <?php if($sem=="7") echo "selected"; ?>>S7</option>
          <option value="8" <?php if($sem=="8") echo "selected"; ?>>S8</option>
        </select></td>
        <td width="40">&nbsp;</td>
        <td width="85"><strong>Department:</strong></td>
        <td width="66"><div align="left">
          <select name="dept" id="select54"  onChange="return submitForm('dept')">
            <option value="0">select</option>
            <?php print generate_list($listdept,$dept); ?>
          </select>
        </div></td>
      </tr>
    </table>
  </div>
  <div align="center"></div>
  <table width="200" border="1" align="center" bordercolor="#00CCFF" frame="box">
    <tr>
      <th height="43" scope="row"><div align="center">DAY/Period</div></th>
      <td><div align="center"><strong>1st</strong></div></td>
      <td><div align="center"><strong>2nd</strong></div></td>
      <td><div align="center"><strong>3rd</strong></div></td>
      <td><div align="center"><strong>4th</strong></div></td>
      <td><div align="center"><strong>5th</strong></div></td>
      <td><div align="center"><strong>6th</strong></div></td>
      <td><div align="center"><strong>7th</strong></div></td>
    </tr>
    <tr bgcolor="#00CCFF">
      <th height="41" scope="row">Monday</th>
      <td><select name="m1" id="m1">
        <option value="0">select</option>
		 <?php print generate_sub($listsub,$m1); ?>
      </select></td>
      <td><select name="m2" id="m2">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$m2); ?>
      </select></td>
      <td><select name="m3" id="select3">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$m3); ?>
      </select></td>
      <td><select name="m4" id="select4">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$m4); ?>
      </select></td>
      <td><select name="m5" id="select5">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$m5); ?>
      </select></td>
      <td><select name="m6" id="select6">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$m6); ?>
      </select></td>
      <td><select name="m7" id="select7">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$m7); ?>
      </select></td>
    </tr>
    <tr>
      <th height="38" scope="row">Tuesday</th>
      <td><select name="tu1" id="select12">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu1); ?>
      </select></td>
      <td><select name="tu2" id="select13">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu2); ?>
      </select></td>
      <td><select name="tu3" id="select14">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu3); ?>
      </select></td>
      <td><select name="tu4" id="select15">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu4); ?>
      </select></td>
      <td><select name="tu5" id="select16">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu5); ?>
      </select></td>
      <td><select name="tu6" id="select17">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu6); ?>
      </select></td>
      <td><select name="tu7" id="select18">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$tu7); ?>
      </select></td>
    </tr>
    <tr bgcolor="#00CCFF">
      <th height="41" scope="row">Wednesday</th>
      <td><select name="w1" id="select19">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w1); ?>
      </select></td>
      <td><select name="w2" id="select20">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w2); ?>
      </select></td>
      <td><select name="w3" id="select21">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w3); ?>
      </select></td>
      <td><select name="w4" id="select22">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w4); ?>
      </select></td>
      <td><select name="w5" id="select23">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w5); ?>
      </select></td>
      <td><select name="w6" id="select24">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w6); ?>
      </select></td>
      <td><select name="w7" id="select25">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$w7); ?>
      </select></td>
    </tr>
    <tr>
      <th height="41" scope="row">Thursday</th>
      <td><select name="th1" id="select26">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th1); ?>
      </select></td>
      <td><select name="th2" id="select33">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th2); ?>
      </select></td>
      <td><select name="th3" id="select28">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th3); ?>
      </select></td>
      <td><select name="th4" id="select29">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th4); ?>
      </select>      </td>
      <td><select name="th5" id="select35">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th5); ?>
      </select></td>
      <td><select name="th6" id="select31">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th6); ?>
      </select></td>
      <td><select name="th7" id="select32">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$th7); ?>
      </select></td>
    </tr>
    <tr bgcolor="#00CCFF">
      <th height="39" scope="row">Friday</th>
      <td><select name="f1" id="select36">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f1); ?>
      </select></td>
      <td><select name="f2" id="select37">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f2); ?>
      </select></td>
      <td><select name="f3" id="select38">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f3); ?>
      </select></td>
      <td><select name="f4" id="select39">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f4); ?>
      </select></td>
      <td><select name="f5" id="select40">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f5); ?>
      </select></td>
      <td><select name="f6" id="select41">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f6); ?>
      </select></td>
      <td><select name="f7" id="select42">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$f7); ?>
      </select></td>
    </tr>
    <tr>
      <th height="38" scope="row">Saturday</th>
      <td><select name="s1" id="select43">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s1); ?>
      </select></td>
      <td><select name="s2" id="select44">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s2); ?>
      </select></td>
      <td><select name="s3" id="select45">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s3); ?>
      </select></td>
      <td><select name="s4" id="select51">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s4); ?>
      </select></td>
      <td><select name="s5" id="select47">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s5); ?>
      </select></td>
      <td><select name="s6" id="select48">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s6); ?>
      </select></td>
      <td><select name="s7" id="select49">
        <option value="0">select</option>
        <?php print generate_sub($listsub,$s7); ?>
      </select></td>
    </tr>
  </table>
  <p align="center">	
    <input type="submit" name="Submit" value="Update">
    <input name="sendtype" type="hidden" id="sendtype">
</p>
</form>
</body>
</html>
