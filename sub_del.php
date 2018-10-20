<?php 
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
if(isset($_POST['Submit']))
{
	$subid=$_POST['subid'];
	mysql_query("DELETE FROM subjects WHERE subid='$subid'");
	mysql_close($con);
	header("Location: admin_home.php");
}
?>
<html>
<script language="JavaScript" type="text/JavaScript">
function submitForm(textvalue){
   form1.sendtype.value = textvalue;
      document.form1.submit()
	     return true;}
</script>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.delsub1 {
	color: #00CC33;
	font-weight: bold;
}
.delsub2 {color: #00CC33}
.delsub3 {font-size: 18px}
.delsub4 {color: #0066FF}
.delsub5 {font-size: 18px; color: #0066FF; }
.style1 {font-size: 14px}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style5 {color: #000000;
	font-size: 9px;
}
body {
	margin-bottom: 0px;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
function generate_list($all_list,$selected_item){
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
$dept=$_POST['dept'];
$sem=$_POST['sem'];
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
                  <td colspan="3" background="title.jpg"><div align="center"><strong>:: DELETE SUBJECT :: </strong></div></td>
                  </tr>
                <tr>
                  <td><div align="left" class="delsub4"><strong>Semester</strong></div></td>
                  <td><span class="delsub4"><strong>:</strong></span></td>
                  <td><span class="delsub4">
                    <select name="sem" class="box" id="select" onChange="return submitForm('sem')">
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
                  <td><div align="left" class="delsub4"><strong>Department</strong></div></td>
                  <td><span class="delsub4"><strong>:</strong></span></td>
                  <td><span class="delsub4">
                    <select name="dept" class="box" id="select2"  onChange="return submitForm('dept')">
                      <option value="0">select</option>
                      <?php print generate_list($listdept,$dept); ?>
                    </select>
                  </span> </td>
                </tr>
                <tr>
                  <td nowrap><div align="left" class="delsub4"><strong>Select Subject</strong></div></td>
                  <td><span class="delsub4"><strong>:</strong></span></td>
                  <td><span class="delsub4">
                    <select name="subid" class="box" id="select3">
                      <option value="0">select</option>
                      <?php			
			if(!empty($_POST['dept']))
			{
				$result = mysql_query("SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
				while($row = mysql_fetch_array($result))
				{
					 $c=$row['subid'];
					 $d=$row['name'];
					 echo "<option value=\"$c\">$d</option>";
					 echo "<br />";
				}
			}
?>
                    </select>
                  </span></td>
                </tr>
              </table>
              <p align="center">
                <input name="sendtype" type="hidden" id="sendtype2">
                <input name="Submit" type="submit" class="butstyle" id="Submit2" value="Delete">
              </p>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
</body>
</html>
