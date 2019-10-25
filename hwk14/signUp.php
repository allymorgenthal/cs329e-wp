<?php
	function checkState() {
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			if (isset($_POST["username"])) {
				$username = $_POST["username"];
				$password = $_POST["password"];

				$myFile = fopen("passwd.txt", "r");
				$users = Array();
				while(!feof($myFile)) {
					$line = fgets($myFile);
					$parts = explode(":", $line);
					$users[$parts[0]] = $parts[1];
				}
				fclose($myFile);

				if(!array_key_exists($username, $users)) {
					$myFile2 = fopen('passwd.txt', 'a+');
					fwrite($myFile2, $username. ":" .$password. "\n");
					fclose($myFile2);
					setcookie("id", $username, time()+120);
					setcookie("timeLoggedIn", time(), time()+120);
					print($username." has been successfully created <br>");
					print("<a href = './title.php'>Back to Main Page</a>");
				}else{
					print($username." was already taken <br>");
					print("<a href = ./title.php'>Back to Main Page</a>");
				}
			}
		} else {
			if(isset($_COOKIE["id"])){
				print("You are already signed up");
				print("<a href = './title.php'>Back to Main Page</a>");
			} else {
				showSignUp()
			}
		}
	}

	function showSignUp() {
		        print<<<REGISTER
        <html>
        <head>
                <title>Register</title
        </head>
        <body>
                <form action = ""  method = "POST">
                <h2> Register </h2>
                <table>
                        <tr>
                                <td>Usermame:</td>
                                <td><input type = "text" name = "username"></td>
                        </tr>
                        <tr>
                                <td>Password:</td>
                                <td><input type = "text" name = "password"></td>
                        </tr>
                        <tr>
                                <td>Confirm Password:</td>
                                <td><input type "text" name = "password2"></td>
                        </tr>
                        <tr>
                                <td><input type = "submit" value = "Register"></td>
                                <td><input type = "reset" value = "Clear"></td>
                        </tr>
                </table>

                </form>
        </body>
        </html>
REGISTER;
	}
?>

<html>
<head>
	<title>Register</title>
</head>
<body>
	<?php checkState(); ?>
</body>
</html>


