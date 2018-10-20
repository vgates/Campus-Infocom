// JavaScript Document
function showDetails(id,token)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  xmlhttp=new XMLHttpRequest();
	else if (window.ActiveXObject)
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	else
	  alert("Your browser does not support XMLHTTP!");
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4)
  		{
			var ss = xmlhttp.responseText;
			var result=ss.split("||");
			document.getElementById('name').value=result[0];
			document.getElementById('urollno').value=result[1];
			document.getElementById('dept').value=result[2];
			document.getElementById('sem').value=result[3];
			document.getElementById('rollno').value=result[4];
			
			document.getElementById('dob').value=result[5];
			document.getElementById('gender').value=result[6];
			document.getElementById('paddress').value=result[7];
			document.getElementById('taddress').value=result[8];
			document.getElementById('phone').value=result[9];
			document.getElementById('email').value=result[10];
			document.getElementById('religion').value=result[11];
			document.getElementById('caste').value=result[12];
			document.getElementById('xtra').value=result[13];
			document.getElementById('gname').value=result[14];
			document.getElementById('relation').value=result[15];
			document.getElementById('occupation').value=result[16];
			document.getElementById('contactno').value=result[17];
			
			document.getElementById('xiiinst').value=result[18];
			document.getElementById('xiiboard').value=result[19];
			document.getElementById('xiiyear').value=result[20];
			document.getElementById('xiimarks').value=result[21];
			document.getElementById('xiimaxmarks').value=result[22];
			
			document.getElementById('maths').value=result[23];
			document.getElementById('maxmaths').value=result[24];
			document.getElementById('phy').value=result[25];
			document.getElementById('maxphy').value=result[26];
			document.getElementById('chem').value=result[27];
			document.getElementById('maxchem').value=result[28];
			
			document.getElementById('cetrank').value=result[29];
			document.getElementById('xinst').value=result[30];
			document.getElementById('xboard').value=result[31];
			document.getElementById('xyear').value=result[32];
			document.getElementById('xmarks').value=result[33];
			document.getElementById('xmaxmarks').value=result[33];
			
		}
	}
	xmlhttp.open("GET","underground/fetchStudDetails.php?id="+id+"&token="+token,true);
	xmlhttp.send(null);
}