<?php
	$username = $_GET["username"];
	$myfile = fopen("passwd", "r");
	$users = Array();
	while(!feof($myfile)) {
		$line = fgets($myfile);
		$parts = explode(":", $line);
		$users[$parts[0]] = $parts[1];
	}
	fclose($myfile);

	if(array_key_exists($username, $users)) {
		$response = "true";
		echo $response;
	} else {
		$response = "false";
		echo $response;
	}
?>