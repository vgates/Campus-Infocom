<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->db();
$user=$_COOKIE['user'];
$genObj->chkCookieRedirect();
if(isset($_POST['Submit']))
{
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
	$confirm=$_POST['confirm'];
	$genObj->chkPass($user,$oldpass,$newpass,$confirm);
}
?>
<html>
<head>
<title><?php $genObj->title();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<link href="/style/css/general.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/validation.js"></script>
</head>
<body><p>&nbsp;</p>
<p>&nbsp;</p>
<table width="800" border="0" align="center">
  <tr>
    <td width="31%"><img src="<?php echo "upload/$user.jpg"; ?>" alt="" name="photo" width="137" height="169">
    </td>
    <td width="69%" valign="top">
      <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="400" border="0" align="center">
              <tr>
                <td height="28" colspan="3" background="title.jpg"><div align="center" class="tableHead"><strong>:: CHANGE PASSWORD :: </strong></div></td>
                </tr>
              <tr>
                <td width="157" height="16" class="text"><div align="right">
                    <div align="left"><strong>Id</strong></div>
                </div></td>
                <td width="10" class="text">:</td>
                <td width="219"><div align="center"><span class="text"><?php echo $_COOKIE['user']; ?></span></div></td>
              </tr>
              <tr>
                <td height="22" class="text"><strong>Old Password </strong></td>
                <td class="text"><strong>:</strong></td>
                <td><div align="right">
                  <input name="oldpass" type="password" class="box" id="oldpass">
                </div></td>
              </tr>
              <tr>
                <td height="22" class="text"><div align="right">
                    <div align="left"><strong>New Password</strong></div>
                </div></td>
                <td class="text">:</td>
                <td><div align="right">
                  <input name="newpass" type="password" class="box" id="newpass">
                </div></td>
              </tr>
              <tr>
                <td height="22" class="text"><strong>Confirm Password </strong></td>
                <td class="text"><strong>:</strong></td>
                <td><div align="right">
                  <input name="confirm" type="password" class="box" id="confirm">
                </div></td>
              </tr>
              <tr>
                <td height="26" colspan="3"><div align="center">
                  <input name="Submit" type="submit" class="butstyle" value="Update">
                </div></td>
                </tr>
            </table>
            </form></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
