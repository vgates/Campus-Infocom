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
<link rel="stylesheet" type="text/css" media="all" href="/jsDatePick.css" />
<script type="text/javascript" src="jsDatePick.min.1.0.js"></script>
<script type="text/javascript" src="js/religion.js"></script>
<script type="text/javascript" src="js/ajaxPostStaff.js"></script>
<?php echo '<script type="text/javascript" src="js/ajaxGetStaff.js?token='.date('YmdHms').'"></script>'; ?>
<script type="text/javascript" src="js/validation.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"dob"
			//limitToToday:true <-- Add this should you want to limit the calendar until today.
		});
	};
</script>
</head>
<body>
<?php include('include/department.php'); ?>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
<table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><div align="center">
        <table width="800" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
          <tr>
            <td bgcolor="#FFFFFF">
              <div align="center">
              <div align="center">
                <table width="800" border="0" align="center" cellspacing="1">
                  <tr>
                    <td height="24" colspan="7" background="title.jpg"><div align="center" class="tableHead"><strong>:: STAFF DETAILS :: </strong></div></td>
                    </tr>
                  <tr>
                    <td height="14" colspan="7"><div align="center" class="notice">* mandatory fields</div></td>
                    </tr>
                  <tr>
                    <td colspan="3" rowspan="7" align="left" valign="top" class="text"><table width="89%" border="0">
                      <tr>
                        <td width="36%" height="20" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Staffid*</strong></div>
                        </div></td>
                        <td width="2%" valign="top" class="text">:</td>
                        <td width="62%" valign="top" class="text"><div align="right">
                            <input name="staffid" type="text" class="box" id="staffid" onKeyDown="if(event.keyCode==13) showDetails(this.value,<?php echo date('YmdHms'); ?>);">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="20" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Name*</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <input name="name" type="text" class="box" id="name">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="27" class="text"><div align="right">
                            <div align="left"><strong>Gender</strong></div>
                        </div></td>
                        <td class="text">:</td>
                        <td class="text"><div align="right">
                            <select name="gender" class="box" id="gender">
                              <option value="">select</option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                            </select>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="20" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Deptartment Id*</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <select name="dept" class="box" id="dept">
                              <option value="">Select</option>
                              <option>Non Teaching</option>
                              <?php print generate_list($listdept,$l); ?>
                            </select>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="20" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Email</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <input name="email" type="text" class="box" id="email">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Phone</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <input name="phone" type="text" class="box" id="phone">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="20" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Mobile</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <input name="mobile" type="text" class="box" id="mobile">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="20" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Marital Status</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <select name="maritalStatus" class="box" id="maritalStatus">
                              <option value="">Select</option>
                              <option value="M">Married</option>
                              <option value="U">Unmarried</option>
                            </select>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="26" valign="top" class="text">Designation</td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text">
                          <div align="right">
                            <select name="designation" class="box" id="designation">
                            </select>
                            </div></td>
                      </tr>
                      
                    </table></td>
                    <td width="73" height="33" class="text">&nbsp;</td>
                    <td width="337" colspan="3" rowspan="7" align="right" valign="top" class="text"><table width="100%" border="0">
                      <tr>
                        <td height="33" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Permanent Address</strong></div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <textarea name="paddress" rows="3" class="box" id="paddress"></textarea>
                        </div></td>
                      </tr>

                      <tr>
                        <td width="38%" height="33" valign="top" class="text"><div align="right">
                            <div align="left"><strong>Temporary Address</strong></div>
                        </div></td>
                        <td width="1%" valign="top" class="text">:</td>
                        <td width="61%" valign="top" class="text"><div align="right">
                            <textarea name="taddress" rows="3" class="box" id="taddress"></textarea>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="28" class="text"><div align="right">
                            <div align="left"><strong>Date of Birth</strong></div>
                        </div></td>
                        <td class="text">:</td>
                        <td class="text"><div align="right">
                            <input name="dob" type="text" class="box" id="dob" size="2">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="28" class="text"><div align="right">
                            <div align="left"><strong>Religion</strong></div>
                        </div></td>
                        <td class="text">:</td>
                        <td class="text"><div align="right">
                            <select name="religion" class="box" id="religion" onChange="printCaste(this.value)">
                              <option>select</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Christian">Christian</option>
                              <option value="Muslim">Muslim</option>
                            </select>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="26" class="text"><div align="right">
                            <div align="left"><strong>Caste</strong></div>
                        </div></td>
                        <td class="text">:</td>
                        <td class="text"><div align="right">
                            <select name="caste" class="box" id="caste">
                              <option value="">select</option>
                            </select>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="28" valign="top" class="text"><div align="right" class="addstaf3">
                            <div align="left">Qualification</div>
                        </div></td>
                        <td valign="top" class="text">:</td>
                        <td valign="top" class="text"><div align="right">
                            <textarea name="qualification" rows="3" class="box" id="qualification"></textarea>
                        </div></td>
                      </tr>
                    </table></td>
                    </tr>
                  <tr>
                    <td height="33" class="text">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="28" class="text">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="27" class="text">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="28" class="text">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="26" class="text">&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="28" class="text">&nbsp;</td>
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
          <input name="Submit4" type="button" class="butstyle" value="Delete" onClick="if(confirm('Are you sure you want to delete?')) addDetails('del')">
</p>
    </div></td>
  </tr>
</table>
  </form>
</body>
</html>
