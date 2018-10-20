<?php
include('class/Gen.php'); include('class/PhotoClass.php');
$genObj=new gen; $photoObj=new  PhotoClass;
$genObj->db();
$user=$_COOKIE['user'];
$genObj->chkCookieRedirect();

if($_POST['Submit'])
{
	$photoObj->photo(150,180,$user);
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/style/css/general.css" rel="stylesheet" type="text/css">
</head>

<body>


<p class="photo">&nbsp;</p>
<table width="980" border="0" align="center">
  <tr>
    <td width="31%" height="175"><img src="<?php echo "upload/".$user.".jpg"; ?>" alt="" name="photo" width="137" height="169">
    </td>
    <td width="69%" valign="middle">
      <table width="400" border="0" align="left" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <table width="400" border="0" align="center">
              <tr>
                <td colspan="2" background="title.jpg"><div align="center" class="tableHead"><strong>:: CHANGE PHOTO ::</strong></div></td>
                </tr>
              <tr>
                <td width="116">
                  <div align="right" class="text">
                    <span class="photo">Filename:</span>
                  </div>
                  <div align="right"></div>
                  <div align="right"></div></td>
                <td width="264">
                    <div align="right">
                      <input name="file" type="file" class="box" id="file" />
                    </div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <input name="Submit" type="submit" class="butstyle" value="Submit" />
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
