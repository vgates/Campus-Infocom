<?php
 if(!isset($_COOKIE['user']))
{
	header('Location: login.php');
	exit();
}
?>
<HTML><HEAD>
<TITLE>Campus Infocom</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META name="robots" Content="Index,Follow">
<base target="_self">
<script src="princ_menuscript.js" language="javascript" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="princ_menustyle.css" media="screen, print" />

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
<link href="text.css" rel="stylesheet" type="text/css">
<link href="news.css" rel="stylesheet" type="text/css">
<link href="title.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {color: #000000}
.style3 {font-weight: bold; color: #000000; }
-->
</style>
</HEAD>

<BODY text=#C0C0C0 vLink=#C0C0C0 aLink=#C0FFAB link=#C0C0C0 leftmargin="0" topmargin="0">
<?php
 $staffid=$_COOKIE['user'];
 $con=mysql_connect("localhost","root","");
 if(!$con)
 {
 die("could not connect:".mysql_error());
 }
 else
 {
 mysql_select_db("campusinfocom",$con);
 $query=mysql_query("SELECT * FROM staff WHERE staffid='$staffid'");
 $row=mysql_fetch_array($query);
 $name=$row['name'];
 $photo=$row['photo'];
 $src="upload/".$photo;
 $address=$row['paddress'];
 $email=$row['email'];
 $phone=$row['phone'];
 $qualification=$row['qualification'];
 }
 mysql_close($con);
 ?>
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
    <td width="145" rowspan="2"><p class="style1"><img src="<?php echo $src; ?>" alt="" name="photo" width="137" height="169" border="2" class="style6"></p>
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td> <a onmouseover="setOverImg('1','');overSub=true;showSubMenu('submenu1','button1');" onmouseout="setOutImg('1','');overSub=false;setTimeout('hideSubMenu(\'submenu1\')',delay);" target=""><img src="princ_buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a><br>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td> <a onmouseover="setOverImg('2','');overSub=true;showSubMenu('submenu2','button2');" onmouseout="setOutImg('2','');overSub=false;setTimeout('hideSubMenu(\'submenu2\')',delay);" target=""><img src="princ_buttons/button2up.png" border="0" id="button2" vspace="1" hspace="1"></a><br>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td> <a href="princ_tt.php" onmouseover="setOverImg('3','');overSub=true;showSubMenu('submenu3','button3');" onmouseout="setOutImg('3','');overSub=false;setTimeout('hideSubMenu(\'submenu3\')',delay);" target=""><img src="princ_buttons/button3up.png" border="0" id="button3" vspace="1" hspace="1"></a><br>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td> <a href="princ_sendmsg.php" onmouseover="setOverImg('4','');overSub=true;showSubMenu('submenu4','button4');" onmouseout="setOutImg('4','');overSub=false;setTimeout('hideSubMenu(\'submenu4\')',delay);" target=""><img src="princ_buttons/button4up.png" border="0" id="button4" vspace="1" hspace="1"></a><br>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td> <a href="logout.php" onmouseover="setOverImg('5','');overSub=true;showSubMenu('submenu5','button5');" onmouseout="setOutImg('5','');overSub=false;setTimeout('hideSubMenu(\'submenu5\')',delay);" target=""><img src="princ_buttons/button5up.png" border="0" id="button5" vspace="1" hspace="1"></a><br>
          </td>
        </tr>
      </table>      
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td width="652" height="15" class="text"><span class="text">Welcome </span><?php echo $name; ?></td>
    <td width="175" height="15" background="title.jpg"><div align="center"><span class="style3">:: CAMPUS NEWS :: </span></div></td>
  </tr>
  <tr>
    <td><table width="348" border="1" align="center" bgcolor="#0000FF" cellpadding="2" cellspacing="1">
      <tr>
        <td bgcolor="#FFFFFF"><table width="348" border="0" align="center" class="text">
            <tr>
              <td height="29" colspan="3" background="title.jpg"><div align="center"><span class="style2">:: PROFILE :: </span></div></td>
            </tr>
            <tr>
              <td width="87" height="29"><div align="right" class="style5">
                  <div align="left"><strong>Name</strong></div>
              </div></td>
              <td width="10"><span class="style6">:</span></td>
              <td width="237"><span class="style5"><strong><?php echo $name; ?></strong></span></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="style5">
                  <div align="left"><strong>Address</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><span class="style5"><strong><?php echo $address; ?></strong></span></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="style5">
                  <div align="left"><strong>Email</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><span class="style5"><strong><?php echo $email; ?></strong></span></td>
            </tr>
            <tr>
              <td height="21"><div align="right" class="style5">
                  <div align="left"><strong>Contact No</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><span class="style5"><strong><?php echo $phone; ?></strong></span></td>
            </tr>
            <tr>
              <td height="27"><div align="right" class="style5">
                  <div align="left"><strong>Qualification</strong></div>
              </div></td>
              <td><span class="style6">:</span></td>
              <td><span class="style5"><strong><?php echo $qualification; ?></strong></span></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td height="460" bgcolor="#D2E4FF"><marquee width="120" height="450" scrolldelay="120" direction="up" class="news">

<?php 
$con=mysql_connect("localhost","root","");
 if(!$con)
 {
 die("could not connect:".mysql_error());
 }
 else
 {
 mysql_select_db("campusinfocom",$con);
 $staffid="administrator";
 $query=mysql_query("SELECT * FROM news WHERE staffid='$staffid'");
 while($row=mysql_fetch_array($query))
 {
 		echo "*".$row['text']; 
		echo "<br><br>";
 }
	
 mysql_close($con); } ?>
    </marquee></td>
  </tr>
</table>
</body>
</HTML>