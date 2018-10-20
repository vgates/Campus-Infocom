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
<script type="text/javascript" src="js/ajaxPostStudent.js"></script>
<?php echo '<script type="text/javascript" src="js/ajaxGetStudent.js?token='.date('YmdHms').'"></script>'; ?>
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
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td>
      <table width="742" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
        <tr>
          <td bgcolor="#FFFFFF">
            <table width="742" border="0" align="center">
              <tr>
                <th colspan="7" background="title.jpg" class="tableHead" scope="row">:: ADD STUDENT :: </th>
              </tr>
              <tr>
                <td colspan="7" scope="row"><div align="center"><span class="notice">*mandatory fields </span></div></td>
                </tr>
              <tr>
                <td width="108" scope="row"><div align="right">
                    <div align="left" class="text">Student Id*</div>
                </div></td>
                <td width="4" class="text"><strong>:</strong></td>
                <td width="242"><div align="left">
                    <input name="studid" type="text" class="box" id="studid" onKeyDown="if(event.keyCode==13) showDetails(this.value,<?php echo date('YmdHms'); ?>);">
                </div></td>
                <td width="46">&nbsp;</td>
                <td width="105" class="text" scope="row"><div align="right">
                    <div align="left">Department*</div>
                </div></td>
                <td width="4" class="text"><strong>:</strong></td>
                <td width="203">
                    <div align="right">
                      <select name="dept" class="box" id="dept">
                        <option value="">select</option>
                        <?php print generate_list($listdept,$s); ?>
                      </select>
                  </div></td>
              </tr>
              <tr>
                <td class="text" scope="row"><div align="right">
                    <div align="left">Name*</div>
                </div></td>
                <td class="text"><strong>:</strong></td>
                <td><div align="left">
                    <input name="name" type="text" class="box" id="name">
                </div></td>
                <td>&nbsp;</td>
                <td class="text" scope="row"><div align="right">
                    <div align="left">Semester*</div>
                </div></td>
                <td class="text"><strong>:</strong></td>
                <td>
                    <div align="right">
                      <select name="sem" class="box" id="sem">
                        <?php include('include/sem.php'); ?>
                      </select>
                    </div></td>
              </tr>
              <tr>
                <td class="text" scope="row"><div align="right">
                    <div align="left">University Roll No</div>
                </div></td>
                <td class="text"><strong>:</strong></td>
                <td><div align="left">
                    <input name="urollno" type="text" class="box" id="urollno">
                </div></td>
                <td>&nbsp;</td>
                <td class="text" scope="row"><div align="right">
                    <div align="left">Class Rollno*</div>
                </div></td>
                <td class="text"><strong>:</strong></td>
                <td>
                    <div align="right">
                      <input name="rollno" type="text" class="box" id="rollno" size="3" onKeyUp="vInt(this.id)">
                    </div></td>
              </tr>
            </table>
            </td>
        </tr>
      </table>
      <table width="786" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td align="center" valign="top">
              <table width="349" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
                <tr>
                  <td width="369" align="center" bgcolor="#FFFFFF"><table width="345" border="0">
                      <tr>
                        <th height="19" colspan="3" scope="row" background="title.jpg"><span class="tableHead"><strong>:: STUDENT DETAILS ::</strong></span></th>
                      </tr>
                      <tr>
                        <td width="125" height="26" class="text" scope="row"><div align="right">
                            <div align="left">Date of Birth</div>
                        </div></td>
                        <td width="3" class="text"><strong>:</strong></td>
                        <td width="203" class="text"><div align="left">
                            <div align="right">
                              <label>
                              <input name="dob" type="text" class="box" id="dob">
                              </label>
                            </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="26" class="text" scope="row"><div align="right">
                            <div align="left">Gender</div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td class="text"><div align="left">
                            
                          <div align="right">
                                <select name="gender" class="box" id="gender">
                                  <option value="">select</option>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                                </select>
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="49" valign="top" class="text" scope="row"><div align="right">
                            <div align="left">
                              <p>Permanent address</p>
                            </div>
                        </div></td>
                        <td valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text"><div align="left">
                            
                          <div align="right">
                                <textarea name="paddress" rows="3" class="box" id="paddress"></textarea>
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="47" valign="top" class="text" scope="row"><div align="right">
                            <div align="left">
                              <p>Temporary Address</p>
                            </div>
                        </div></td>
                        <td valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text"><div align="left">
                            <div align="right">
                              <textarea name="taddress" rows="3" class="box" id="taddress"></textarea>
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" class="text" scope="row"><div align="right">
                            <div align="left">Phone No</div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td class="text"><div align="left">
                            
                          <div align="right">
                            <input name="phone" type="text" class="box" id="phone">
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" class="text" scope="row"><div align="right">
                            <div align="left">Email</div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td class="text"><div align="left">
                            
                          <div align="right">
                            <input name="email" type="text" class="box" id="email">
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="26" class="text" scope="row"><div align="right">
                            <div align="left">Religion</div>
                        </div></td>
                        <td class="text"><span><strong>:</strong></span></td>
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
                        <td height="26" class="text" scope="row"><div align="right">
                            <div align="left">Caste</div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td class="text"><div id="dispCaste" align="right"><select name="caste" class="box" id="caste">
                          <option>select</option>
                        </select>
                      </div></td>
                      </tr>
                      <tr valign="top">
                        <td height="26" class="text" scope="row"><div align="right">
                            <div align="left">Extra Activities </div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td class="text">
                          <div align="right">
                            <textarea name="xtra" rows="3" class="box" id="xtra"></textarea>
                          </div></td></tr>
                    </table>
                      <table width="341" border="0" align="center">
                        <tr bgcolor="#0099FF">
                          <th height="17" colspan="3" scope="row"><span class="tableSubHead"><strong>:: GUARDIAN DETAILS :: </strong></span></th>
                        </tr>
                        <tr>
                          <td width="106" class="text" scope="row"><div align="right">
                              <div align="left">Name</div>
                          </div></td>
                          <td class="text"><strong>:</strong></td>
                          <td>
                            
                            <div align="right">
                              <input name="gname" type="text" class="box" id="gname">
                            </div></td>
                        </tr>
                        <tr>
                          <td class="text" scope="row"><div align="right">
                              <div align="left">Relation</div>
                          </div></td>
                          <td class="text"><strong>:</strong></td>
                          <td>
                            <div align="right">
                              <input name="relation" type="text" class="box" id="relation">
                            </div></td></tr>
                        <tr>
                          <td class="text" scope="row"><div align="right">
                              <div align="left">Occupation</div>
                          </div></td>
                          <td class="text"><strong>:</strong></td>
                          <td>
                            <div align="right">
                              <input name="occupation" type="text" class="box" id="occupation">
                            </div></td></tr>
                        <tr>
                          <td class="text" scope="row"><div align="right">
                              <div align="left">Contact No</div>
                          </div></td>
                          <td class="text"><strong>:</strong></td>
                          <td>
                            <div align="right">
                              <input name="contactno" type="text" class="box" id="contactno">
                            </div></td></tr>
                    </table></td>
                </tr>
            </table>
</td>
          <td align="center" valign="top"><table width="356" border="0" cellpadding="1" cellspacing="1" bgcolor="#0099FF">
              <tr>
                <td align="center" bgcolor="#FFFFFF"><table width="352" border="0">
                    <tr>
                      <th height="19" colspan="3" scope="row" background="title.jpg"><span class="tableHead"><strong>:: ACADEMIC DETAILS ::</strong></span></th>
                    </tr>
                    <tr bgcolor="#0099FF">
                      <th height="17" colspan="3" scope="row"><div align="right">
                          <div align="center" class="tableSubHead">:: +2 DETAILS :: </div>
                      </div></th>
                    </tr>
                    <tr>
                      <td width="119" height="24" class="text" scope="row"><div align="right">
                          <div align="left">Institution</div>
                      </div></td>
                      <td width="10" class="text"><strong>:</strong></td>
                      <td width="229" class="text"><div align="left">
                          
                          <div align="right">
                            <input name="xiiinst" type="text" class="box" id="xiiinst">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">Board</div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td class="text"><div align="left">
                          
                          <div align="right">
                            <input name="xiiboard" type="text" class="box" id="xiiboard">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">Year</div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td class="text"><div align="left">
                          
                          <div align="right">
                            <input name="xiiyear" type="text" class="box" id="xiiyear">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">Obtained Marks </div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td class="text"><div align="left">
                          
                          <div align="right">
                            <input name="xiimarks" type="text" class="box" id="xiimarks">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">Maximum Marks</div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td class="text"><div align="right">
                        <input name="xiimaxmarks" type="text" class="box" id="xiimaxmarks">
                      </div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">Maths</div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td class="text"><div align="right">Obt. Marks
                        <input name="maths" type="text" class="boxDMY" id="maths" size="3">
  &nbsp;
                        Max Marks
                        <input name="maxmaths" type="text" class="boxDMY" id="maxmaths" size="3">
                      </div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">Physics</div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td class="text"><div align="right">Obt. Marks
                        <input name="phy" type="text" class="boxDMY" id="phy" size="3">
  &nbsp;
                        Max Marks
                        <input name="maxphy" type="text" class="boxDMY" id="maxphy" size="3">
                     </div></td>
                    </tr>
                    <tr>
                      <td height="26" class="text" scope="row"><div align="left">Chemistry</div></td>
                      <td class="text"><span class="addstud"><strong>:</strong></span></td>
                      <td class="text"><div align="right"><span>Obt. Marks
                        <input name="chem" type="text" class="boxDMY" id="chem" size="3">
  &nbsp;
                        Max Marks
                        <input name="maxchem" type="text" class="boxDMY" id="maxchem" size="3">
                      </span></div></td>
                    </tr>
                    <tr>
                      <td height="24" class="text" scope="row"><div align="right">
                          <div align="left">CET Rank </div>
                      </div></td>
                      <td class="text"><strong>:</strong></td>
                      <td><div align="left">
                          <div align="right">
                            <input name="cetrank" type="text" class="box" id="cetrank">
                         </div>
                      </div></td>
                    </tr>
                  </table>
                    <table width="348" border="0" align="center">
                      <tr bgcolor="#0099FF">
                        <th height="17" colspan="3" scope="row"><span class="tableSubHead"><strong>:: 10th DETAILS :: </strong></span></th>
                      </tr>
                      <tr>
                        <td width="106" height="24" class="text" scope="row"><div align="right">
                            <div align="left">Institution</div>
                        </div></td>
                        <td width="5" class="text"><strong>:</strong></td>
                        <td><div align="right">
                            <input name="xinst" type="text" class="box" id="xinst">
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" class="text" scope="row"><div align="right">
                            <div align="left">Board</div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td><div align="left">
                            
                          <div align="right">
                            <input name="xboard" type="text" class="box" id="xboard">
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" class="text" scope="row"><div align="right">
                            <div align="left">Year</div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td><div align="left">
                            
                          <div align="right">
                            <input name="year" type="text" class="box" id="xyear">
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" class="text" scope="row"><div align="right">
                            <div align="left">Obtained Marks </div>
                        </div></td>
                        <td class="text"><strong>:</strong></td>
                        <td><div align="left">
                            
                          <div align="right">
                            <input name="xmarks" type="text" class="box" id="xmarks">
                          </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td height="24" class="text" scope="row"><div align="right">
                            <div align="left"><span class="studet12">Maximum Marks </span></div>
                        </div></td>
                        <td class="text"><span><strong>:</strong></span></td>
                        <td><div align="right"><span>
                          <input name="xmaxmarks" type="text" class="box" id="xmaxmarks">
                        </span></div></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <p align="center">
        <input name="Submit" type="button" class="butstyle" value="Add" onClick="addDetails('add')">
         <input name="Submit2" type="reset" class="butstyle" value="Reset">
         <input name="Submit3" type="button" class="butstyle" value="Update" onClick="addDetails('edit')">
         <input name="Submit4" type="button" class="butstyle" value="Delete" onClick="if(confirm('Are u sure')) addDetails('del')">
      </p>
</td>
  </tr>
</table>
</form>
</body>
</html>
