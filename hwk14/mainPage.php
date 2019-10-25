<?php
	function checkState() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

				if (array_key_exists($username, $users) && strcmp($users[$username], $password)) {
					setcookie("id", $username, time()+120);
					setcookie("timeLoggedIn", time(), time()+120);
				} else {
					echo "Login Failed";
					echo "Bad Username or Password";
				}
			} else {
				if(isset($_COOKIE["id"])) {
					showSuccess();
				} else {
					showLogin();
				}
			}
		}
	}

	function showLogin() {
        print<<<LOGINPAGE
        <html>
        <head>
                <title>Login</title>
        </head>
        <body>
                <form action = ""  method = "POST">
                <h2> Login In </h2>
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
                                <td><input type = "submit" value = "Login"></td>
                                <td><input type = "reset" value = "Clear"></td>
                        </tr>
                </table>
                </form>
                <p>You dont have a login? Sign Up here: <a href = "signUp.php">Sign Up</a></p>
        </body>
        </html>
LOGINPAGE;
    }

function showSuccess() {
	echo "hi";
}

?>

<div class = "articles">
	<h2>Articles</h2>
	<a href = "./article1.php">Does America Really Run On Dunkin?</a><br>
	<a href = "./article2.php">Why Do Most Americans Say Blue Is Their Favorite Color?</a><br>
	<a href = "./article3.php">Help Save Endangered Elephants!</a><br>
	<a href = "./article4.php">Nature or Nurture? This New Study Shows New Insights</a><br>
	<a href = "./article5.php">What Makes A Good Party? The Ten Things You Need To Know</a><br>
</div>
<div class = "login">
	<?php checkState(); ?>
</div>





