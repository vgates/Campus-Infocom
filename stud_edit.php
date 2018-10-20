<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();

if(isset($_POST['Submit']))
{
	setcookie("studid", $_POST['studid']);
	header("Location: edit_stud_entry.php");
	exit();
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.editstud1 {color: #00CC33}
.editstud2 {font-size: 18px; color: #00CC33; }
.editstud5 {color: #0033FF}
.style1 {
	color: #0066FF;
	font-weight: bold;
}
.style2 {color: #0066FF}
.style3 {
	font-size: 14px;
	font-weight: bold;
}
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
.studet14 {color: #0066FF}
.style4 {	color: #999999;
	font-size: 12px;
}
.style5 {color: #000000;
	font-size: 9px;
}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-bottom: 0px;
}
-->
</style></head>
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
              <div align="center">
                <table width="400" border="0">
                  <tr>
                    <th colspan="3" scope="row" background="title.jpg">:: EDIT STUDENT :: </th>
                    </tr>
                  <tr>
                    <th width="178" scope="row"><div align="right" class="editstud5 style2">
                        <div align="left">Semester</div>
                    </div></th>
                    <td width="10"><span class="style1">:</span></td>
                    <td width="194"><div align="left">
                        <select name="sem" class="box" id="select">
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
                    <th scope="row"><div align="right" class="studet14">
                        <div align="left">Department</div>
                    </div></th>
                    <td><span class="style1">:</span></td>
                    <td><div align="left">
                        <select name="dept" class="box" id="select2" onChange="return submitForm('dept')">
                          <option value="0">select</option>
                          <?php print generate_list($listdept,$dept); ?>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <th height="26" nowrap scope="row"><div align="right" class="studet14">
                        <p align="left">Select Student</p>
                    </div></th>
                    <td><span class="style1">:</span></td>
                    <td><div align="left">
                        <select name="studid" class="box" id="select3">
                          <option value="0">select</option>
                          <?php			
			if(!empty($_POST['dept']))
			{
				$result = mysql_query("SELECT * FROM student ORDER BY name");
				while($row = mysql_fetch_array($result))
				{
					 $department=$row['dept'];
					 $semester=$row['sem'];
					 if($dept==$department && $sem==$semester)
					 {
						 $c=$row['studid'];
						 $d=$row['name'];
						 echo "<option value=\"$c\">$d</option>";
						 echo "<br />";
					 }
				}
			}
?>
                        </select>
                    </div></td>
                  </tr>
                </table>
                <p class="editstud5">
                  <input name="sendtype" type="hidden" id="sendtype2">
                  <input name="Submit" type="submit" class="butstyle" value="Edit">
                </p>
              </div>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
</body>
</html>
