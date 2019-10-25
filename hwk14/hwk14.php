<html>
<head>
	<title> Homework 14 </title>
</head>
<body>
	<h1> The Westfield Post </h1>
	<p> <a href = "./signUp.php"> Vegetables Are Better For You Than Fruit </a>
		<a href = "./signUp.php"> Yosemite Was Named The Best National Park </a>
	</p>
</body>
</html>
<?php
	session_start();

	if (session_id() == "" || !isset($_SESSION['login'])) {
?>

		<a href = "./signUp.php">Register</a>
<?php
	} else {
		echo "Hi, " $_SESSION['login'];
?>
		<a href = "./logout.php">Logout</a>
<?php
	}
?> 





	 
?>

	<label for = "userName">Username</label>
	<input type = "text" name = "userName">
	<br>
	<label for = "password">Password</label>
	<input type = "text" name = "password">
	<input type = "button" value = "Register">