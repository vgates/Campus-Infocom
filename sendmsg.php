<?php
if(isset($_POST['Submit']))
{
 $text=$_POST['text'];
$staffid="jec101";
$con = mysql_connect("localhost","root","");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		else
		{
		mysql_select_db("campusinfocom",$con);
		mysql_query("INSERT INTO news VALUES('$staffid','$text')" );
		mysql_close($con);
		header('Location: return.php');
		exit();
		}
		}
		
		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <p>NEWS:::::::::::::::::::::::::::::
    <textarea name="text" id="text"></textarea>
</p>
  <p>
    <input type="submit" name="Submit" value="Submit">
</p>
</form>
</body>
</html>
