// JavaScript Document
function addDetails(purpose) {  // This function does the AJAX request
 
  //  Set our destination PHP page�  
  http.open("POST", "underground/staff_entry.php", true);
  http.onreadystatechange = getHttpRes;

  // Make our POST parameters string�
  var params = "purpose="+purpose + "&name="+encodeURI(document.getElementById('name').value) +"&staffid="+ encodeURI(document.getElementById('staffid').value) +"&qualification="+ encodeURI(document.getElementById('qualification').value) +"&dept="+ encodeURI(document.getElementById('dept').value)+"&designation="+ encodeURI(document.getElementById('designation').value)+"&maritalStatus="+ encodeURI(document.getElementById('maritalStatus').value)+"&dob="+ encodeURI(document.getElementById('dob').value)+"&gender="+ encodeURI(document.getElementById('gender').value)+"&paddress="+ encodeURI(document.getElementById('paddress').value)+"&taddress="+ encodeURI(document.getElementById('taddress').value)+"&phone="+ encodeURI(document.getElementById('phone').value)+"&email="+ encodeURI(document.getElementById('email').value)+"&religion="+ encodeURI(document.getElementById('religion').value)+"&caste="+ encodeURI(document.getElementById('caste').value)+"&mobile="+ encodeURI(document.getElementById('mobile').value);

  // Set our POST header correctly�
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  // Send the parms data�
  http.send(params);

}

function getHttpRes( ) {
  if (http.readyState == 4 && http.status == 200) { 
	alert(http.responseText);
  }
}

function getXHTTP( ) {
  var xhttp;
   try {   // The following "try" blocks get the XMLHTTP object for various browsers�
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