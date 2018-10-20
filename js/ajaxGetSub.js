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
			document.getElementById('dept').value=result[1];
			document.getElementById('sem').value=result[2];
			document.getElementById('internal').value=result[3];
			document.getElementById('external').value=result[4];
		}
	}
	xmlhttp.open("GET","underground/fetchSubDetails.php?id="+id+"&token="+token,true);
	xmlhttp.send(null);
}