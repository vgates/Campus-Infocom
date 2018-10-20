<?php 
if(isset($_POST['Submit']))
{
setcookie("user",$_POST['user']);
if(!empty($_POST['user']))
{
$user=$_POST['user'];
}
else
{
$user=false;
$msg="Enter USER";
}
if(!empty($_POST['password']))
{
$password=$_POST['password'];
}
else
{
$password=false;
$msg="Enter Password";
}
if($user && $password)
{
$con=mysql_connect("localhost","root","");
if(!$con)
die('could not connect: '.mysql_error());
else
{
	mysql_select_db("campusinfocom", $con);
	//administrator	
	if($user=="administrator")
	{
		$query2=mysql_query("SELECT * FROM  staff WHERE staffid='$user' AND password='$password'");
		$row2= mysql_fetch_array($query2);
		if($row2)
		{
			header('Location: admin_home.php');
			exit();
		}
		else
			$msg="Incorrect Password";
	}
	//pat
	if($user=="pat")
	{
		$query2=mysql_query("SELECT * FROM  staff WHERE staffid='$user' AND password='$password'");
		$row2= mysql_fetch_array($query2);
		if($row2)
		{
			header('Location: pat_home.php');
			exit();
		}
		else
			$msg="Incorrect Password";
	}
	//principal
	else if($user=="principal")
	{
		$query2=mysql_query("SELECT * FROM  staff WHERE staffid='$user' AND password='$password'");
		$row2= mysql_fetch_array($query2);
		if($row2)
		{
			header('Location: princ_home.php');
			exit();
		}
		else
			$msg="Incorrect Password";
	}
	//hod and staff
	else if(substr($user,0,3)=="jec")
	{	
		$query=mysql_query("SELECT * FROM department WHERE hod='$user'");
		$row = mysql_fetch_array($query);
		if($row)
		{
			$query1=mysql_query("SELECT * FROM  staff WHERE staffid='$user' AND password='$password'");
			$row1 = mysql_fetch_array($query1);
			if($row1)
			{
				setcookie("logged","1");
				header("Location: hod_home.php");
				exit();
			}
			else
			$msg="Incorrect Password";
		}
		else
		{
			$query1=mysql_query("SELECT * FROM  staff WHERE staffid='$user' AND password='$password'");
			$row1 = mysql_fetch_array($query1);
			if($row1)
			{
				header("Location: staff_home.php");
				exit();
			}
			else
			$msg="Incorrect Password";
		}
	}
	//student
	else
	{		
		$query2=mysql_query("SELECT * FROM  student WHERE studid='$user' AND password='$password'");
		$row2= mysql_fetch_array($query2);
		if($row2)
		{
			header('Location: stud_home.php');
			exit();
		}
		else
			$msg="Incorrect Password";
	}
}	
}
} 
?>
<HTML><HEAD><TITLE>Campus Infocom</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META name="robots" Content="Index,Follow">
<base target="_self">
<link href="box.css" rel="stylesheet" type="text/css">
<link href="btstyle.css" rel="stylesheet" type="text/css">
<link href="text.css" rel="stylesheet" type="text/css">
<link href="news.css" rel="stylesheet" type="text/css">
<link href="title.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #000000; font-weight:bold}
-->
</style>
</HEAD>

<BODY text=#C0C0C0 vLink=#C0C0C0 aLink=#C0FFAB link=#C0C0C0 leftmargin="0" topmargin="0">

<table width="100%" height="560" border="0" align="center" cellspacing="1">
  <tr>
    <td valign="top" colspan="2" height="78">    <div align="center">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="980" height="120">
          <param name="movie" value="banner.swf">
          <param name="quality" value="high">
          <embed src="banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="980" height="120"></embed>
      </object>
    </div></td>
  </tr>
  <tr>
    <td width="790" valign="top" height="435">       
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer1" style="position:absolute; left:291px; top:267px; width:278px; height:167px; z-index:1; background-image:  url(chuma.jpg); layer-background-image:  url(chuma.jpg); border: 1px none #000000;"><br>
      <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <table width="200" border="0" align="center">
          <tr>
            <td colspan="3" class="text"><div align="center" class="style1"> &nbsp;</div></td>
            </tr>
          <tr>
            <td class="text"><div align="right" class="login5">
              <div align="left">User</div>
            </div></td>
            <td class="text"><div align="center"><span class="login5"><strong>:</strong></span></div></td>
            <td><div align="left">
              <input name="user" type="text" class="box" id="user4">
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
          <input name="Submit" type="submit" class="butstyle" value="Login">
        </p>
      </form>
    </div> <center><p><?php echo $msg; ?></p></center>   <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></p>    </td>
    <td width="19%" valign="top" height="435"><table width="167" height="31" border="0" align="center">
          <tr>
            <td width="135" height="27" background="title.jpg" class="style1"> <div align="center">:[ Campus News ]: </div></td>
          </tr>
      </table>
      <table width="167" align="center" border="0" height="410">
          <tr>
            <td width="137" height="406" vAlign="top" bgColor="#D2E4FF">
            <p align="left" class="news">
              <marquee width="120" height="450" scrolldelay="120" direction="up" class="news">

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
                </marquee></p>                 </td>
          </tr>
    </table>    </td>
  </tr>
</table>
</body></HTML>