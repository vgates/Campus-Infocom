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
			document.getElementById('email').value=result[1];
			document.getElementById('phone').value=result[2];
			document.getElementById('mobile').value=result[3];
			document.getElementById('maritalStatus').value=result[4];
			document.getElementById('paddress').value=result[5];
			document.getElementById('taddress').value=result[6];
			document.getElementById('dob').value=result[7];
			document.getElementById('gender').value=result[8];
			document.getElementById('religion').value=result[9];
			document.getElementById('caste').value=result[10];
			document.getElementById('dept').value=result[11];
			document.getElementById('qualification').value=result[12];
			document.getElementById('designation').value=result[13];
		}
	}
	xmlhttp.open("GET","underground/fetchStaffDetails.php?id="+id+"&token="+token,true);
	xmlhttp.send(null);
}