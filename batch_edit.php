<?php 
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
if(isset($_POST['Submit']))
{
	$dept=$_POST['dept'];
	$newsem=$_POST['newsem'];
	$oldsem=$_POST['oldsem'];
	mysql_query("UPDATE student SET sem='$newsem' WHERE dept='$dept' and sem='$oldsem'");
	$genObj->alertL("Updated successfully..!","batch_edit.php");
}
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<style type="text/css">
<!--
.editdept1 {
	color: #00CC33;
	font-weight: bold;
}
.editdept2 {color: #00CC33}
.editdept3 {color: #0066FF}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.staff4 {color: #0033FF}
.studet14 {color: #0066FF}
.style5 {color: #000000;
	font-size: 9px;
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
  $t_dump.="                                ";
  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
  $t_dump.="n";
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

		if(!empty($_POST['dept']))
		{
			$result = mysql_query("SELECT * FROM staff WHERE dept='$dept' ORDER BY name");
			while($row = mysql_fetch_array($result))
 			{
				 $c=$row['staffid'];
				 $d=$row['name'];
				 $liststaff[$c]=$d;
 			}
			$result3 = mysql_query("SELECT * FROM department WHERE dept='$dept'");
			while($row = mysql_fetch_array($result3))
				  $hod=$row['hod'];
		}
function generate_staff($all_list,$selected_item)
{
 $t_dump="n";
 foreach ($all_list as $abrv => $value)
 {
	  $t_dump.="                                ";
	  if ($selected_item==$abrv)
		   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
	  else
		   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 
	  $t_dump.="n";
  }
 return $t_dump; 
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
              <div align="center"></div>
              <table width="400" border="0" align="center">
                <tr>
                  <td height="28" colspan="3" background="title.jpg"><div align="center"><strong>:: UPGRADE BATCH TO NEW SEMESTER :: </strong></div></td>
                  </tr>
                <tr>
                  <td width="157" height="26"><div align="right" class="editdept3">
                      <div align="left"><strong>Department</strong></div>
                  </div></td>
                  <td width="10"><span class="editdept3"><strong>:</strong></span></td>
                  <td width="155"><div align="left">
                    <select name="dept" class="box" id="dept">
                          <option value="0">select</option>
                          <?php	print generate_list($listdept,$dept); ?>
                    </select>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="editdept3">
                      <div align="left"><strong>Current Semester </strong></div>
                  </div></td>
                  <td><span class="editdept3"><strong>:</strong></span></td>
                  <td><div align="left">
                    <select name="oldsem" class="box" id="select2">
                          <option value="0">select</option>
                          <option value="1">S1S2</option>
                          <option value="3">S3</option>
                          <option value="4">S4</option>
                          <option value="5">S5</option>
                          <option value="6">S6</option>
                          <option value="7">S7</option>
                          <option value="8">S8</option>
                    </select>
                  </div></td>
                </tr>
                <tr>
                  <td class="editdept3"><strong>New Semester </strong></td>
                  <td class="editdept3"><strong>:</strong></td>
                  <td><select name="newsem" class="box" id="select3">
                    <option value="0">select</option>
                    <option value="1">S1S2</option>
                    <option value="3">S3</option>
                    <option value="4">S4</option>
                    <option value="5">S5</option>
                    <option value="6">S6</option>
                    <option value="7">S7</option>
                    <option value="8">S8</option>
                  </select></td>
                </tr>
              </table>
              <p align="center">
                <input name="sendtype" type="hidden" id="sendtype2">
                <input name="Submit" type="submit" class="butstyle" value="Update">
              </p>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
</body>
</html>