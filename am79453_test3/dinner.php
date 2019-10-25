<!DOCTYPE html>
<html>
<head>
	<title>Exam 3-Potluck Dinner</title>
	<link rel = "stylesheet" type = "text/css" href = "./dinner.css">
	<script src = "./dinner.js"></script>
</head>

<?php
	function begin() {
		if(!isset($_COOKIE["sessionid"])) {
			if($_SERVER['REQUEST_METHOD'] === "POST") {
				if(isset($_POST["username"])) {
					$username = $_POST["username"];
					$password = $_POST["password"];

					$key = 'CS329E';
                    $method = 'aes128';

                    $password_encrypted = openssl_encrypt($password, $method, $key);

                  	

                    if(($username == 'guest') && ($password_encrypted == "gR0q4YpGzL6EdiVz6I3nPQ====")) {
                    	setcookie("sessionid", $username, time()+3600);
                    	setcookie("timelogged", time(), time()+3600);
                    	printTable();
                    } else {
                    	print<<<WRONG
                    	<p> Wrong Username or Password Entered</p>
                    	<p><a href = "./dinner.php">Back to Login</a></p>
WRONG;				
                    }
				}
			} else {
				printLogin();
			}
		} else {
			if($_SERVER['REQUEST_METHOD'] === 'POST') {
				if(isset($_POST["username"])) {
					$username = $_POST["username"];
					$items = $_POST["items"];

					$host = "summer-2018.cs.utexas.edu";
        			$user = "allysonm";
        			$pwd = "die3Dead&basin";
        			$dbs = "cs329e_allysonm";
        			$port = "3306";

        			$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

        			if (empty($connect))    {
                		die("mysqli_connect failed: " . mysqli_connect_error());
        			}

      				print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";

      				$table = "dinner";

      				if($username != "" && $items != ""){
      					$stmt = mysqli_prepare($connect, "INSERT INTO $table VALUES (?, ?)");
      					mysqli_stmt_bind_param($stmt, 'ss', $username, $items);
      					mysqli_stmt_execute($stmt);
      					mysqli_stmt_close($stmt);
      				}

      				echo "Thank you for registering!</br>";
      				echo "<a href = \"dinner.php\">Back to Mainpage</a>";
      				mysqli_close($connect);
				}
			} else {
				printTable();
			}
		}
	}

	function printTable() {
		print<<<TABLE 

		<form method = "POST" onsubmit = "checkValid()">
		<table>
			<tr>
				<th>Name:</th>
				<th>Items</th>
			</tr>
			<tr>
				<td><input type = "text" id = "username" name = "username" maxlength = "20"></td>
				<td><input type = "text" id = "items" name = "items" maxlength = "100"></td>
			</tr>
			<tr>
				<td><input type = "submit" id = "submit" name = "submit" value = "Submit"></td>
				<td><input type = "reset" name = "reset" value = "Clear"></td>
			</tr>
		</table>
		</form>
TABLE;
		$username = $_POST["username"];
		$items = $_POST["items"];

		$host = "summer-2018.cs.utexas.edu";
        $user = "allysonm";
        $pwd = "die3Dead&basin";
        $dbs = "cs329e_allysonm";
        $port = "3306";

        $connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

        if (empty($connect))    {
            die("mysqli_connect failed: " . mysqli_connect_error());
        }

      	print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";

      	        print<<<INTRO
        <tr>
                <th>Name</th>
                <th>Item</th>
        <tr><br>
INTRO;

      	$table = "dinner";
      	$result = mysqli_query($connect, "SELECT * FROM $table");
      	while($row = $result->fetch_row()) {
      		print<<<TABLE2
      		<tr>
      			<td>$row[0]</td>
      			<td>$row[1]</td>
      		</tr>
TABLE2;
      	}
      	$result->free();
      	mysqli_close($connect);
	}


	function printLogin() {
		print<<<LOGIN
		<form method = "POST">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type = "text" id = "username" name = "username"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type = "text" id = "password" name = "password"></td>
			</tr>
			<tr>
				<td><input type = "submit" name = "submit" value = "Submit"></td>
				<td><input type = "reset" name = "reset" value = "Clear"></td>
			</tr>
		</table>
		</form>
LOGIN;
	}
?>

<body> 
	<h1>Potluck Dinner Sign Up</h1>
	<?php begin(); ?>
</body>
</html>