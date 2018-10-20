<?php 
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
if(isset($_POST['Submit']))
{
	$staffid=$_POST['staffid'];
	mysql_query("DELETE FROM staff WHERE staffid='$staffid'");
	header("Location: admin_home.php");
}
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.stafdel {font-size: 18px; color: #00CC33; }
.stafdel2 {color: #00CC33; font-size: 14; }
.style1 {color: #0033FF}
.style2 {color: #0066FF}
.style3 {font-size: 14}
.style4 {
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
.style5 {color: #000000;
	font-size: 9px;
}
.style8 {font-weight: bold; color: #0066FF; }
.style9 {	color: #000000;
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

  if ($selected_item==$abrv)
   $t_dump.="<option value=\"$abrv\" selected>$all_list[$abrv]</option>"; 
  else
   $t_dump.="<option value=\"$abrv\">$all_list[$abrv]</option>"; 

  }
 return $t_dump; 
}
$result = mysql_query("SELECT * FROM department order by name");
while($row = mysql_fetch_array($result))
{
	$i=$row['dept'];
	$j=$row['name'];
	$listdept[$i]=$j;
}
$dept=$_POST['dept'];
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
                    <th height="29" colspan="3" scope="row" background="title.jpg">:: DELETE STAFF :: </th>
                    </tr>
                  <tr>
                    <th width="149" height="26" scope="row"><div align="right" class="style2">
                        <div align="left"><span class="style3">Department</span></div>
                    </div></th>
                    <td width="5"><span class="style2"><strong>:</strong></span></td>
                    <td width="232"><div align="left">
                        <select name="dept" class="box" id="select" onChange="return submitForm('dept')">
                          <option value="0">select</option>
                          <?php print generate_list($listdept,$dept); ?>
                        </select>
                    </div></td>
                  </tr>
                  <tr>
                    <th nowrap scope="row"><div align="right" class="style2">
                        <div align="left"><span class="style3">Select Staff</span></div>
                    </div></th>
                    <td><span class="style2"><strong>:</strong></span></td>
                    <td><div align="left">
                        <select name="staffid" class="box" id="select2">
                          <option value="0">select</option>
                          <?php			
			if(!empty($_POST['dept']))
			{
				$result = mysql_query("SELECT * FROM staff WHERE dept='$dept'");
				while($row = mysql_fetch_array($result))
				{
					 $c=$row['staffid'];
					 $d=$row['name'];
					 echo "<option value=\"$c\">$d</option>";
					 echo "<br />";
				}
			}
?>
                        </select>
                    </div></td>
                  </tr>
                </table>
                <p class="style1">
                  <input name="sendtype" type="hidden" id="sendtype2">
                  <input name="Submit" type="submit" class="butstyle" value="Delete">
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
