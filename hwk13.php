<html>
<head>
	<title> Homework 13 </title>
	<link rel="stylesheet" type="text/css" href="hwk13.css">
</head>

<body>
	<h1> Sign-Up Sheet</h1>

	<?php
		$script = $_SERVER['PHP_SEheLF'];
		$myFile = fopen("register.txt", "r");
		$signUp = [];
		while(true){
			$line = fgets($myFile);
			if ($line == "") {
				break 
			}
			$signup = explode(":", $line);
			$time = $signup[0];
			$name = $signup[1];
			$signUp[$time] = $name;
		}
		fclose($myFile)

		$times = array("8", "9:00am", "10:00am", "11:00am", "12:00pm", "1:00pm", "2:00pm", "3:00pm", "4:00pm", "5:00pm");

		extract($_POST);
		foreach($times as $time) {
			if (!empty($_POST[$times])) {
				if (!array_key_exists($time, $signUp)) {
					$name = $_POST[$time];
					$myFile = fopen("register.txt", "a");
					fwrite($myFile, "$time:$name \n");
					fclose($myFile);
					$signUp[$time] = $name;
				}
			}
		}
	?>
	<form name = "timeSheet" method = "POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table border = "1">
		<?php 
			foreach($times as $time) {
			echo "<tr><td>$time</td>";
			if (array_key_exists($time, $signUp)) {
				echo "<td> $scheduled[$time] </td></tr>";
			} else {
				echo "<td><input type = 'text' name=$t></td></tr>";
			}
		}
	?>
	</table>
	<input type = "submit" value = "Sign-Up">
	<input type = "reset" value = "Clear">
	</form>
</body>
</html>

