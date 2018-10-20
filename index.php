<?php 
include('class/Gen.php');
include('class/Login.php');
$genObj = new gen;
$LoginObj = new Login;
$genObj->db();
if (isset($_POST['login'])) {
    $LoginObj->cookieSetter($_POST['user']);
    if (!($LoginObj->chkEmpty($_POST['user']))) $genObj->alert("Enter user..!");
    else $user = $_POST['user'];
    if (!($LoginObj->chkEmpty($_POST['password']))) $genObj->alert("Enter password..!");
    else $password = $_POST['password'];
    if ($user && $password) {
        if (!($LoginObj->staffLoger($user, $password))) $genObj->alert("incorrect password...!");	// Authenticating staff	
        if (!($LoginObj->studentLoger($user, $password))) $genObj->alert("incorrect password...!");	// Authenticating student
    }
}
?>
<HTML><HEAD><TITLE><?php $genObj->title(); ?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META name="robots" Content="Index,Follow">
<base target="_self">
<link href="/style/css/login.css" rel="stylesheet" type="text/css">
</HEAD>

<BODY text=#C0C0C0 vLink=#C0C0C0 aLink=#C0FFAB link=#C0C0C0 leftmargin="0" topmargin="0">
<table width="980" height="560" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td height="122" colspan="2"><div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="980" height="120">
          <param name="movie" value="banner.swf">
          <param name="quality" value="high">
          <embed src="banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="980" height="120"></embed>
      </object>
    </div></td>
  </tr>
  <tr>
    <td width="803" rowspan="2" align="center" valign="middle"><p align="center">&nbsp;</p>
    <table width="556" height="218" border="0" cellpadding="1" cellspacing="1" bordercolor="#0033FF" background="login_1.jpg">
      <tr>
        <td width="552" height="216"><table width="241" border="0" align="right" cellpadding="1" cellspacing="1">
          <tr>
            <td><form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
              <table width="200" border="0" align="center">
                <tr>
                  <td colspan="3" class="text"><div align="center" class="style1"> &nbsp;</div></td>
                </tr>
                <tr>
                  <td width="58" class="text"><div align="right" class="login5">
                      <div align="left">User</div>
                  </div></td>
                  <td width="3" class="text"><div align="center"><span class="login5"><strong>:</strong></span></div></td>
                  <td width="125"><div align="left">
                      <input name="user" type="text" class="box" id="user3">
                  </div></td>
                </tr>
                <tr>
                  <td class="text"><div align="right" class="login4">
                      <div align="left">Password</div>
                  </div></td>
                  <td class="text"><div align="center"><span class="login5"><strong>:</strong></span></div></td>
                  <td><div align="left">
                      <input name="password" type="password" class="box" id="password">
                  </div></td>
                </tr>
              </table>
              <p align="center">
                <input name="login" type="submit" class="butstyle" id="login" value="Login">
              </p>
            </form></td>
          </tr>
        </table></td>
      </tr>
    </table>    </td>
    <td width="174" height="24" background="title.jpg"><div align="center" class="style1">:: CAMPUS NEWS : </div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#D2E4FF">
     <marquee direction="up" class="news" height="450" scrolldelay="300"><?php 
                                                                        $staffid = "administrator";
                                                                        $query = mysql_query("SELECT * FROM news WHERE staffid='$staffid'");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "*" . $row['text'];
                                                                            echo "<br><br>";
                                                                        }
                                                                        ?>
     </marquee></td>
  </tr>
</table>
</body></HTML>