function ready() {
	document.getElementById("contactBtn").onclick = contact;
}
function contact() {
	var elt = document.getElementById('contact2');
	var email = elt.email.value;
	var re = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/
	if (re.exec(email) === null) {
		alert ("Invalid Email");
	} else if (elt.message.value == "") {
		alert("Message Empty");
	} else {
		alert("Message Sent!");
	}
}