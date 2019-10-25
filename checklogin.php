<?php
	$username = $_GET["username"];
	$password = $_GET["password"];

	$myfile = fopen("employee.txt", "r");
	$users = Array();
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$parts = explode(":", $line);
		$users[$parts[0]] = $parts[1];
	}
	fclose($myfile);

	if(array_key_exists($username, $users)) {
		if ($password == $users[1]) {
			$response = "true";
			setcookie(sessionid, $username, time()+3600);
			setcookie(timeloggedin, time(), time()+3600);
		} else {
			$response = "false";
		}
		echo $response;
	} else {
		alert("You are not a registed employee")
	}
?>