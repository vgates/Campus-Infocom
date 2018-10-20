<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();
?>
<html>
<head>
<title><?php $genObj->title();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<link href="/style/css/general.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/religion.js"></script>
<script type="text/javascript" src="js/ajaxPostDept.js"></script>
<?php echo '<script type="text/javascript" src="js/ajaxGetDept.js?token='.date('YmdHms').'"></script>'; ?>
<script type="text/javascript" src="js/validation.js"></script>
</head>
<body>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
<table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><div align="center">
      <br>
      <table width="400" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF">
            <div align="center"></div>
            <table width="400" height="108" border="0" align="center" bordercolor="#FFFFFF">
              <tr>
                <td height="27" colspan="3" background="title.jpg"><div align="center"><span class="tableHead"><strong>:: ADD DEPARTMENT :: </strong></span></div></td>
                </tr>
              <tr>
                <td height="17" colspan="3"><div align="center" class="notice">* mandatory fields</div></td>
                </tr>
              <tr class="text">
                <td width="167" height="27"><div align="right">
                    <div align="left"><strong>Department ID*</strong></div>
                </div></td>
                <td width="10"><strong>:</strong></td>
                <td>
                    <div align="right">
                      <input name="dept" type="text" class="box" id="dept"  onKeyDown="if(event.keyCode==13) showDetails(this.value,<?php echo date('YmdHms'); ?>);">
                    </div></td>
              </tr>
              <tr class="text">
                <td height="27"><div align="right">
                    <div align="left"><strong>Department Name*</strong></div>
                </div></td>
                <td><strong>:</strong></td>
                <td><div align="right">
                  <input name="name" type="text" class="box" id="name">
                </div></td>
              </tr>
            </table>
           </td>
        </tr>
      </table>
      <br>
        <input name="Submit" type="button" class="butstyle" value="Add" onClick="addDetails('add')">
        <input name="Submit2" type="reset" class="butstyle" value="Reset">
        <input name="Submit3" type="button" class="butstyle" value="Update" onClick="addDetails('edit')">
        <input name="Submit4" type="button" class="butstyle" value="Delete" onClick="if(confirm('Are u sure')) addDetails('del')">
</div></td>
  </tr>
</table>
</form>
</body>
</html>
