function login() {
	var name = $("#username").val();
	var pass = $("#password").val();

	if (name != "" && name != null && pass != "" && pass != null) {
		$.ajax ({
			type:'post',
			url:'checklogin.php',
			data: {
				username:name,
				password:pass
			},
			success:function(response) {
				if(response == "success") {
					window.location.href = "links.html";
				} else {
					window.location.href = "login.php";
				}
				
			} 
		});
	} else {
		alert("Please Fill In All Boxes");
	}
	return false; 
} 
