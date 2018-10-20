<?php
/*

* Class to control login issues

*/
class Login
{
	function cookieSetter($cookie)
	{
		setcookie("user",$cookie);
	}
	
	function chkEmpty($field)
	{
		if(!empty($field))
			return true;
		else
			return false;
	}
	
	function staffLoger($user,$password)
	{
		$query2=mysql_query("SELECT * FROM  staff WHERE staffid='$user' AND password='$password'");
		$row2= mysql_fetch_array($query2);
		if($row2)
		{
			if($user=="administrator") { header("Location: admin_home.php"); exit(); }
			else if($user=="pat") { header("Location: admin_home.php"); exit(); }
			else if($user=="principal") { header("Location: princ_home.php"); exit(); }	
			else if(substr($user,0,3)=="jec") { if($this->chkHOD($user)) { setcookie("logged","1"); header("Location: hod_home.php"); exit(); } else { header("Location: staff_home.php"); exit();} }
		}
		else
			return false;
	}
	function chkHOD($user)
	{
		$query=mysql_query("SELECT * FROM department WHERE hod='$user'");
		$row = mysql_fetch_array($query);
		if($row)
			return true;
		else
			return false;
	}
	
	function studentLoger($user,$password)
	{
		$query2=mysql_query("SELECT * FROM  student WHERE studid='$user' AND password='$password'");
		$row2= mysql_fetch_array($query2);
		if($row2){ header('Location: stud_home.php'); exit(); }
		else
			return false;
	}
}
?>