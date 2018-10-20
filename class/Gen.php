<?php
error_reporting(0);
class gen
{
	function db()
	{
		$con=mysql_connect("localhost","root","");
		if(!$con)
			die('Could not connect'.mysql_error());
		mysql_select_db("campusinfocom",$con);
	}

	function alert($msg)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"$msg\");";
		echo "</script>";
	}
	function alertL($msg,$url)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"$msg\");";
		echo "document.location.href=\"$url\";";
		echo "</script>";
	}
	function headerL($url)
	{
		header('Location:'. $url);
		exit();
	}
	function title()
	{
		echo "Campus Infocom";
	}
	function chkCookieAdmin()
	{
		if(!isset($_COOKIE['user']))
		{
			header('Location: login.php');
			exit();
		}
		else
			include('./trial.htm');
	}
	function chkCookieStaff()
	{
		if(!isset($_COOKIE['user']))
		{
			header('Location: login.php');
			exit();
		}
		else
		{
			$chk=$_COOKIE['user'];
			if(substr($chk,0,3)=="jec")
				include('./staff_trial.htm');
			else if($chk=="pat")
				include('./pat_trial.htm');
		}
	}
	function chkCookie()
	{
		if(!isset($_COOKIE['user']))
		{
			header('Location: login.php');
			exit();
		}
	}
	function chkCookieRedirect()
	{
		if(!isset($_COOKIE['user']))
		{
			header('Location: login.php');
			exit();
		}
		else
		{
			$chk=$_COOKIE['user'];
			if($chk=="pat")
				include('./pat_trial.htm');
			else if($chk=="administrator")
				include('./trial.htm');
			else if($chk=="principal")
				include('./princ_trial.htm');
			if(substr($chk,0,3)=="jec")
			{
				if($this->chkHOD($chk))
					include('./hod_trial.htm');
				else
					include('./staff_trial.htm');
			}
		}
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
	function chkPass($user,$oldpass,$newpass,$confirm)
	{		
		$flag=0;
		$query=mysql_query("SELECT * FROM staff WHERE staffid='$user'");
		if(!$query)
		{
			$query=mysql_query("SELECT * FROM student WHERE studid='$user'");
			$flag=1;
		}
		$row= mysql_fetch_array($query);
		$pass=$row['password'];
		if($pass==$oldpass)
		{
			if($newpass==$confirm)
			{
				if($flag==1)
					mysql_query("UPDATE student SET password='$newpass' WHERE studid='$user'");
				else if($flag==0)
					mysql_query("UPDATE staff SET password='$newpass' WHERE staffid='$user'");
				$this->alert("Password Updated Successfully..!");
			}
			else
				$this->alert("Password confirmation failed..!");
		}
		else
			$this->alert("Old password authentication failed..!");
	}
}
?>