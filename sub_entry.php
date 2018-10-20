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
<script type="text/javascript" src="js/ajaxPostSub.js"></script>
<?php echo '<script type="text/javascript" src="js/ajaxGetSub.js?token='.date('YmdHms').'"></script>'; ?>
<script type="text/javascript" src="js/validation.js"></script>
</head>
<body>
<?php include('include/department.php'); ?>
<form name="form1" method="post" action="">
<table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><div align="center">
        <br>
        <table width="400" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF">
              <div align="center">
                <table width="400" border="0">
                  <tr>
                    <th colspan="3" background="title.jpg" class="tableHead" scope="row">:: SUBJECT ENTRY :: </th>
                    </tr>
                  <tr>
                    <td colspan="3" scope="row"><div align="center"><span class="notice">* mandatory fields</span></div></td>
                    </tr>
                  <tr>
                    <th width="162" class="text" scope="row"><div align="left">Subject ID*</div></th>
                    <td width="8" class="text"><strong>:</strong></td>
                    <td>
                        <div align="right">
                          <input name="subid" type="text" class="box" id="subid" onKeyDown="if(event.keyCode==13) showDetails(this.value,<?php echo date('YmdHms'); ?>);">
                        </div></td>
                  </tr>
                  <tr>
                    <th class="text" scope="row"><div align="left">Department*</div></th>
                    <td class="text"><strong>:</strong></td>
                    <td>
                        <div align="right">
                          <select name="dept" class="box" id="dept">
                            <option value="">select</option>
                            <?php print generate_list($listdept,$p); ?>
                          </select>
                        </div></td>
                  </tr>
                  <tr>
                    <th class="text" scope="row"><div align="left">Semester*</div></th>
                    <td class="text"><strong>:</strong></td>
                    <td>
                        <div align="right">
                          <select name="sem" class="box" id="sem">
                            <option value="">select</option>
                            <option value="1">S1 &amp; S2</option>
                            <option value="3">S3</option>
                            <option value="4">S4</option>
                            <option value="5">S5</option>
                            <option value="6">S6</option>
                            <option value="7">S7</option>
                            <option value="8">S8</option>
                          </select>
                        </div></td>
                  </tr>
                  <tr>
                    <th nowrap class="text" scope="row"><div align="left">Subject Name*</div></th>
                    <td class="text"><strong>:</strong></td>
                    <td>
                        <div align="right">
                          <input name="name" type="text" class="box" id="name">
                        </div></td>
                  </tr>
                  <tr>
                    <th nowrap class="text" scope="row"><div align="left">Internal Marks* </div></th>
                    <td class="text"><div align="left"><strong>:</strong></div></td>
                    <td><div align="left">
                      <div align="right">
                        <input name="internal" type="text" class="box" id="internal">
                      </div>
                    </div></td>
                  </tr>
                  <tr>
                    <th nowrap class="text" scope="row"><div align="left">External Marks* </div></th>
                    <td class="text"><div align="left"><strong>:</strong></div></td>
                    <td><div align="left">
                      <div align="right">
                        <input name="external" type="text" class="box" id="external">
                      </div>
                    </div></td>
                  </tr>
                </table>
                </div>
            </td>
          </tr>
        </table>
        <p>
          <input name="Submit" type="button" class="butstyle" value="Add" onClick="addDetails('add')">
          <input name="Submit2" type="reset" class="butstyle" value="Reset">
          <input name="Submit3" type="button" class="butstyle" value="Update" onClick="addDetails('edit')">
          <input name="Submit4" type="button" class="butstyle" value="Delete" onClick="if(confirm('Are u sure')) addDetails('del')">
</p>
    </div></td>
  </tr>
</table>
</form>
</body>
</html>
