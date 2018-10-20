<?php
include('class/Gen.php');
$genObj=new gen;
$genObj->chkCookieAdmin();
$genObj->db();

if(isset($_POST['Submit']))
{
$staffid="administrator";
$query=mysql_query("SELECT * FROM news WHERE staffid='$staffid'");

$i=0;
while($row=mysql_fetch_array($query))
{
	$i=$i+1;
	$j=$_POST["$i"];
	if($j!=NULL)
	{
		$text=$row['text'];
		mysql_query("DELETE FROM news WHERE text='$text'");
	}
}
}	
?>
<html>
<head>
<title><?php $genObj->title(); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
}
.ff {
	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
}
.cell {
	font-size: 16px;
	color: #0066FF;
	font-weight: bold;
}
.butname {
	color: #00CCFF;
	background-color: #0000CC;
	font-size: 16px;
	font-weight: bold;
	width: 300px;
	font-family: "Times New Roman", Times, serif;
	cursor: hand;
}
.style5 {color: #000000;
	font-size: 9px;
}
.style6 {font-weight: bold}
-->
</style>
<link href="btstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="25" background="title.jpg"><p align="center" class="style5"><strong>A</strong></p>
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
      <form name="form2" method="post" action="news.php">
        <p>&nbsp; </p>
        <p align="center">
          <input name="Submit2" type="submit" class="butstyle" value="Update News">
        </p>
      </form>
        <form name="form1" method="post" action="">
<?php
$staffid="administrator";
$query=mysql_query("SELECT * FROM news WHERE staffid='$staffid'");
$i=0;
echo "<table border='0'>
	<tr bgcolor=\"#0099FF\">
	<th class=\"ff\">Delete</th>
	<th class=\"ff\">NEWS</th>
	</tr>";
$flag=0;
while($row=mysql_fetch_array($query))
{
	$i=$i+1;
	if($flag==0)
		echo "<tr>";
	else
		echo "<tr bgcolor=\"#BFDFFF\">";
	echo "<td>"."<input type=\"checkbox\" name=\"$i\" value=\"checkbox\">"."</td>";
	echo "<td class=\"cell\">".$row['text']."</td>";
	echo "</tr>";	
	if($flag==0)
		$flag=$flag+1;
	else
		$flag=$flag-1;
}
echo "</table>";
?>
          <div align="left">
            <p align="center">
              <input name="Submit" type="submit" class="butstyle" value="Delete">
            </p>
          </div>
          <p>&nbsp;</p>
        </form>
    </div></td>
  </tr>
</table>
</body>
</html>
