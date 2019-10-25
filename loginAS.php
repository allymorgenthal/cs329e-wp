<!DOCTYPE html>

<html>
<head>
	<script src = "login.js"></script>
</head>

<?php
	function begin() {
		if(isset($_COOKIE["sessionid"])) {
			include 'links.html';
		} else {
			printLogin();
		}
	}

	function printLogin() {
		print<<<LOGIN
		<h1>Login Page</h1>
		<div class = "login">
		<form action = "" method = "post" onsubmit = "callServer()">
			<label for = "username"> Username: </label><br>
 			<input type = "text" name = "username" id = "username">
 			<label for = "password"> Password: </label><br>
 			<input type = "text" name = "password" id = "password">
 			<input type = "submit" value = "Submit" name = "submit"/>
 			<input type = "reset" value = "Clear" name = "reset"/>
 		</form>
 		</div>
LOGIN;
 	}


?>

<body>
	<?php begin(); ?>
        <div class = "headers1">
                <h1> ADVANCED <img src = "AS.jpg" alt = "AS"> SCANNERS </h1>
        </div>
        <div class = "navigation">
                <a href = "./advancedScanners.html">Home</a>
                <a href = "./story.html">Our Story</a>
                <a href = "./progress.html">Progress</a>
                <a href = "./contactAS.php">Contact Us</a>
                <div class = "dropdown">
                        <button class = "dropbtn" onclick = "dropDown()">Our Team
                                <i class = "fa fa-caret-down"></i>
                        </button>
                        <div class = "dropoptions" id = "myDropdown">
                                <a href = "./founders.html">Founders</a>
                                <a href = "./interns2.html">Interns</a>
                        </div>
                </div>
        </div>
        <div class = "footer">
                <p>
                        || &emsp; &emsp; &copy;Advanced Scanners Inc &emsp; &emsp;|| &emsp; &emsp; Austin, TX &emsp; &emsp;|| &emsp; &emsp;  <a href = "./loginAS.php">Employee Login</a> &emsp; &emsp; ||
        </div>
 </body>
 </html>