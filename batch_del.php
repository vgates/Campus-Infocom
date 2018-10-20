<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<link href="box.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
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
        <table width="300" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF"><form name="form1" method="post" action="batchdel.php">
              <table width="300" border="0" align="center">
                <tr>
                  <td colspan="2" background="title.jpg"><div align="center"><strong>:: DELETE BATCH :: </strong></div></td>
                  </tr>
                <tr>
                  <td width="176"><div align="right"><span class="style1">Year of admission : </span></div></td>
                  <td width="164">
                      <div align="center">
                        <input name="year" type="text" class="box" id="year2" size="4">
                      </div></td>
                </tr>
              </table>
              <p align="center">
                <input name="Submit" type="submit" class="butstyle" value="Delete">
              </p>
            </form></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
</body>
</html>
