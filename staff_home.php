<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookie();
$genObj->db();
?>
<html>
<head>
<title><?php $genObj->title();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<script src="staffv_menuscript.js" language="javascript" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="staffv_menustyle.css" media="screen, print" />
<link href="/style/css/general.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/religion.js"></script>
<script type="text/javascript" src="js/ajaxPostStaff.js"></script>
<?php echo '<script type="text/javascript" src="js/ajaxGetStaff.js?token='.date('YmdHms').'"></script>'; ?>
<script type="text/javascript" src="js/validation.js"></script>
</head>
<body onLoad="showDetails('<?php echo $_COOKIE['user']; ?>',<?php echo date('YmdHms'); ?>);">
<table width="200" border="0" align="center">
  <tr>
    <td colspan="3"><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="980" height="120">
          <param name="movie" value="banner.swf">
          <param name="quality" value="high">
          <embed src="banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="980" height="120"></embed>
        </object>
    </div></td>
  </tr>
  <tr>
    <td width="145" rowspan="2"><p><img src="<?php echo "upload/".$_COOKIE['user'].".jpg"; ?>" alt="" name="photo" width="137" height="169" border="2"></p>
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td> <a onmouseover="setOverImg('1','');overSub=true;showSubMenu('submenu1','button1');" onmouseout="setOutImg('1','');overSub=false;setTimeout('hideSubMenu(\'submenu1\')',delay);" target=""><img src="staffv_buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a><br></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> <a onmouseover="setOverImg('2','');overSub=true;showSubMenu('submenu2','button2');" onmouseout="setOutImg('2','');overSub=false;setTimeout('hideSubMenu(\'submenu2\')',delay);" target=""><img src="staffv_buttons/button2up.png" border="0" id="button2" vspace="1" hspace="1"></a><br>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> <a onmouseover="setOverImg('3','');overSub=true;showSubMenu('submenu3','button3');" onmouseout="setOutImg('3','');overSub=false;setTimeout('hideSubMenu(\'submenu3\')',delay);" target=""><img src="staffv_buttons/button3up.png" border="0" id="button3" vspace="1" hspace="1"></a><br>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> <a href="staff_sendmsg.php" onmouseover="setOverImg('4','');overSub=true;showSubMenu('submenu4','button4');" onmouseout="setOutImg('4','');overSub=false;setTimeout('hideSubMenu(\'submenu4\')',delay);" target=""><img src="staffv_buttons/button4up.png" border="0" id="button4" vspace="1" hspace="1"></a><br>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> <a href="logout.php" onmouseover="setOverImg('5','');overSub=true;showSubMenu('submenu5','button5');" onmouseout="setOutImg('5','');overSub=false;setTimeout('hideSubMenu(\'submenu5\')',delay);" target=""><img src="staffv_buttons/button5up.png" border="0" id="button5" vspace="1" hspace="1"></a><br>
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
    <td width="652" height="15" class="text">Welcome <span class="style5"><strong>
    </strong></span></td>
    <td width="175" height="15" background="title.jpg"><div align="center"><span class="style3">:: Msg from HOD:: </span></div></td>
  </tr>
  <tr>
    <td><table width="400" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#0066FF">
        <tr>
          <td bgcolor="#FFFFFF"><table width="400" align="center" class="text">
            <tr>
              <td height="25" colspan="3" background="title.jpg"><div align="center">:: PROFILE :: </div></td>
              </tr>
            <tr>
              <td width="122" height="22"><div align="right" class="style5">
                  <div align="left"><strong>Name</strong></div>
              </div></td>
              <td width="13"><span class="style6">:</span></td>
              <td><div align="left"><strong>
              <input name="name" type="text" class="boxHide" id="name" readonly="readonly">
</strong></div></td>
            </tr>
            <tr>
              <td height="22"><div align="right" class="style5">
                  <div align="left"><strong>Address</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><div align="left"><span class="style5"><strong><strong>
                    <input name="taddress" type="text" id="taddress" class="boxHide" readonly="readonly">
              </strong></strong></span></div></td>
            </tr>
            <tr>
              <td height="22"><div align="right" class="style5">
                  <div align="left"><strong>Email</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><div align="left"><span class="style5"><strong><strong>
                    <input name="email" type="text" id="email" class="boxHide" readonly="readonly">
              </strong></strong></span></div></td>
            </tr>
            <tr>
              <td height="22"><div align="right" class="style5">
                  <div align="left"><strong>Contact No</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><div align="left"><span class="style5"><strong><strong>
                    <input name="phone" type="text" id="phone" class="boxHide" readonly="readonly">
              </strong></strong></span></div></td>
            </tr>
            <tr>
              <td height="22"><div align="right" class="style5">
                  <div align="left"><strong>Department</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><div align="left"><span class="style5"><strong><strong>
                    <input name="dept" type="text" id="dept" class="boxHide" readonly="readonly">
              </strong></strong></span></div></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
    <td height="460" bgcolor="#D2E4FF"><marquee width="120" height="450" scrolldelay="120" direction="up" class="news">
    <?php 
 $query1=mysql_query("SELECT * FROM department WHERE dept='$dept'");
 $hodrow=mysql_fetch_array($query1);
 $hod=$hodrow['hod'];
 $query=mysql_query("SELECT * FROM news WHERE staffid='$hod' AND dept='$dept'");
 while($row=mysql_fetch_array($query))
 {
 		echo "*".$row['text']; 
		echo "<br><br>";
 }
?></marquee></td>
  </tr>
</table>
<input name="mobile" type="hidden" id="mobile"><input name="paddress" id="paddress" type="hidden" value=""><input name="maritalStatus" id="maritalStatus" type="hidden" value=""><input name="dob" id="dob" type="hidden" value=""><input name="gender" id="gender" type="hidden" value=""><input name="religion" id="religion" type="hidden" value=""><input name="caste" id="caste" type="hidden" value=""><input name="dept" id="dept" type="hidden" value=""><input name="designation" id="designation" type="hidden" value=""><input name="qualification" id="qualification" type="hidden" value="">
</body>
</HTML>