<!DOCTYPE html>

<html>
<head>
	<script src = "hwk17.js"></script>
</head>
<body>
	<h1>Login Page</h1>
	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'post') {
			$username = $_POST["username"];
			$password = $_POST["password"];

			$myfile = fopen("passwd", "r");
			$users = Array();
			while(!feof($myfile)) {
				$line = fgets($myfile);
				$parts = explode(":", $line);
				$users[$parts[0]] = $parts[1];
			}
			fclose($myfile);

			if (!array_key_exists($username, $users)) {
				$myfile2 = fopen("passwd", "a+");
                $key = 'CS329E';
                $method = 'aes128';
				$password_encrypted = openssl_encrypt($password, $method, $key);
				fwrite($myfile2, $username . ":" . $password_encrypted. "\n");
				fclose($myfile2);
				echo ("User Registered");
			}
		}
	?>
	<form action = "" method = "post">
		<label for = "username"> Username: </label><br>
 		<input type = "text" name = "username" id = "username" onkeyup="checkLogin(this.value)">
 		<label for = "password"> Password: </label><br>
 		<input type = "text" name = "password" id = "password">
 		<input type = "submit" value = "Submit" name = "submit"/>
 		<input type = "reset" value = "Clear" name = "reset"/>
 	</form>
 	<p><a href = "passwd">List of Usernames</a></p>
 </body>
 </html>