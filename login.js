var xhr;
if (window.ActiveXObject) { 
	xhr = new ActiveXObject ("Microsoft.XMLHTTP"); 
} else if (window.XMLHttpRequest) { 
    xhr = new XMLHttpRequest(); 
}

function updatePage() {
	if (xhr.readyState == 4) {
		if (xhr.status == 200) {
			var response = xhr.responseText;
			if (response == "true") {
				window.location.href = "links.html";
			}	
		}
	}
}

function callServer() { 

	var username = document.getElementById("username").value; 
	var password = document.getElementById("password").value; 

	if ((username == null) || (username == "")) return; 
	if ((password == null) || (password == "")) return; 

	var url = "checklogin.php?username=" + escape(username) +"&password=" + escape(password); 

	xhr.open ("GET", url, true); 

	xhr.onreadystatechange = updatePage; 

	xhr.send(null); 
}