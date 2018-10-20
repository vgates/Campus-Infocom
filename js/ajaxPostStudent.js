// JavaScript Document
function adddetails(purpose) {  // This function does the AJAX request
 
  //  Set our destination PHP page…  
  http.open("POST", "underground/stud_entry.php", true);
  http.onreadystatechange = getHttpRes;

  // Make our POST parameters string…
  var params = "purpose="+purpose + "&name="+encodeURI(document.getElementById('name').value) +"&studid="+ encodeURI(document.getElementById('studid').value) +"&urollno="+ encodeURI(document.getElementById('urollno').value) +"&dept="+ encodeURI(document.getElementById('dept').value)+"&sem="+ encodeURI(document.getElementById('sem').value)+"&rollno="+ encodeURI(document.getElementById('rollno').value)+"&dob="+ encodeURI(document.getElementById('dob').value)+"&gender="+ encodeURI(document.getElementById('gender').value)+"&paddress="+ encodeURI(document.getElementById('paddress').value)+"&taddress="+ encodeURI(document.getElementById('taddress').value)+"&phone="+ encodeURI(document.getElementById('phone').value)+"&email="+ encodeURI(document.getElementById('email').value)+"&religion="+ encodeURI(document.getElementById('religion').value)+"&caste="+ encodeURI(document.getElementById('caste').value)+"&xtra="+ encodeURI(document.getElementById('xtra').value)+"&gname="+ encodeURI(document.getElementById('gname').value)+"&relation="+ encodeURI(document.getElementById('relation').value)+"&occupation="+ encodeURI(document.getElementById('occupation').value)+"&contactno="+ encodeURI(document.getElementById('contactno').value)+"&xinst="+ encodeURI(document.getElementById('xinst').value)+"&xboard="+ encodeURI(document.getElementById('xboard').value)+"&xyear="+ encodeURI(document.getElementById('xyear').value)+"&xmarks="+ encodeURI(document.getElementById('xmarks').value)+"&xmaxmarks="+ encodeURI(document.getElementById('xmaxmarks').value)+"&maths="+ encodeURI(document.getElementById('maths').value)+"&phy="+ encodeURI(document.getElementById('phy').value)+"&chem="+ encodeURI(document.getElementById('chem').value)+"&maxmaths="+ encodeURI(document.getElementById('maxmaths').value)+"&maxphy="+ encodeURI(document.getElementById('maxphy').value)+"&maxchem="+ encodeURI(document.getElementById('maxchem').value)+"&cetrank="+ encodeURI(document.getElementById('cetrank').value)+"&xiiinst="+ encodeURI(document.getElementById('xiiinst').value)+"&xiiboard="+ encodeURI(document.getElementById('xiiboard').value)+"&xiiyear="+ encodeURI(document.getElementById('xiiyear').value)+"&xiimarks="+ encodeURI(document.getElementById('xiimarks').value)+"&xiimaxmarks="+ encodeURI(document.getElementById('xiimaxmarks').value);

  // Set our POST header correctly…
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  // Send the parms data…
  http.send(params);

}

function getHttpRes( ) {
  if (http.readyState == 4 && http.status == 200) { 
	alert(http.responseText);
  }
}

function getXHTTP( ) {
  var xhttp;
   try {   // The following "try" blocks get the XMLHTTP object for various browsers…
      xhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e2) {
 		 // This block handles Mozilla/Firefox browsers...
	    try {
	      xhttp = new XMLHttpRequest();
	    } catch (e3) {
	      xhttp = false;
	    }
      }
    }
  return xhttp; // Return the XMLHTTP object
}

var http = getXHTTP();