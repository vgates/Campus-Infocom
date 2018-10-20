<?php 
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();

if(isset($_POST['Submit']))
{
	$text=$_POST['news'];
	$staffid="administrator";
	mysql_query("INSERT INTO news VALUES('$staffid','0','0','$text')" );
	header('Location: return.php');
	exit();
}
 ?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.editdept3 {color: #0066FF}
.style5 {color: #000000;
	font-size: 9px;
}
.style6 {font-weight: bold}
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
<center>
  <table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="24" background="title.jpg"><p align="center" class="style5"><strong>A</strong></p>
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
      <td width="949"><div align="center">
          <table width="333" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
            <tr>
              <td bgcolor="#FFFFFF"><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table width="200" border="0" align="center" cellpadding="1" cellspacing="1">
                  <tr>
                    <td background="title.jpg"><div align="center"><span class="style6">:: UPDATE NEWS :: </span></div></td>
                  </tr>
                  <tr>
                    <td><textarea name="news" cols="50" rows="4" class="box" id="textarea2"></textarea></td>
                  </tr>
                </table>
                <p align="center">
                  <input name="Submit" type="submit" class="butstyle" value="Update News">
                </p>
              </form></td>
            </tr>
          </table>
      </div></td>
    </tr>
  </table>
</center>
</body>
</html>
