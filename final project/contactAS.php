<!DOCTYPE html>
<html>
<head>
	<title>Contact Advacned Scanners</title>
	<link rel = "stylesheet" title = "basic style" type = "text/css" href = "./advancedScanners.css" media = "all"/>
	<meta charset = "utf-8"/>
	<script src="contactSubmit.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
	function submit() {
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if(isset($_POST["name"])) {
                                $first = $_POST["first"];
                                $last = $_POST["last"];
                                $email = $_POST["email"];
                                $subject = $_POST["subject"];
                                $message = $_POST["message"];


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

      				$table = "advancedscanners";

      				if($first != "" && $last != "" && $email != "" && $subject != "" && $message != ""){
      					$stmt = mysqli_prepare($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?)");
      					mysqli_stmt_bind_param($stmt, 'sssss', $first, $last, $email, $subject, $message);
      					mysqli_stmt_execute($stmt);
      					mysqli_stmt_close($stmt);
      				} else {
      					echo "All fields must be filled out to submit."
      				}

      				echo "Thank you for contacting us!</br>";
      				mysqli_close($connect);
?>

<body>
		<div class = "headers1">
		<h1> ADVANCED <img src = "AS-1.jpg" alt = "AS"> SCANNERS </h1>
	</div>
	<div class = "navigation">
			<a href = "./advancedScanners.html">Home</a>
			<a href = "./story.html">Our Story</a>
			<a href = "./progress.html">Progress</a>
			<a href = "./contactAS.html">Contact Us</a>
			<div class = "dropdown">
				<button class = "dropbtn" onclick = "dropDown()">Our Team 
			 		<i class = "fa fa-caret-down"></i>
			 	</button>
			 	<div class = "dropoptions" id = "myDropdown">
			 		<a href = "./founders.html">Founders</a>
			 		<a href = "./interns.html">Interns</a>
				</div>
			</div>
	</div>
	<div class = "contactForm">
		<h1> Contact Advanced Scanners Inc. </h1>
		<p> If you'd like to learn more about us, or how to work with us, let us know! <br><br>
		Advanced Scanners was founded by a PhD optical physicist and a serial entrepreneur to try and help surgeons preform better surgery. <br><br>
		Machines will enhance human capabilities.  This trend is taking place all around us.  Simply put, machines and computers can perform some tasks so much faster, consistently, and accurately, than we can.<br><br>
		People and machines, working together.  That’s what the future looks like, and we are the eyes of that movement.<br><br>
		Join us on this journey! <a href = "./advancedScanners.html">Home</a> </p>
	</div>
	<div class = "form">
		<?php submit(); ?>
		<form id = "contact2" action = "" method = "post">
			<label for = "first"> Name: </label><br>
 			<input type = "text" name = "first" id = "first" placeholder = "First Name"/> &emsp;
 			<input type = "text" name = "last" id = "last" placeholder = "Last Name"/><br>

 			<label for = "email"> Email: </label><br>
 			<input type = "text" name = "email" id = "email" placeholder = "Email" /><br>

 			<label for = "subject"> Subject: </label><br>
 			<input type = "text" name = "subject" id = "subject" placeholder = "Subject"/><br><br>

 			<label for = "message"> Message: </label><br>
 			<input type = "text" name = "message" id = "message" placeholder = "Message"/><br><br>
 			<input type = "button" value = "Submit" id = "contactBtn"/>
 			<input type = "reset" value = "Clear"/>
 		</form>
 	</div>
 		<div class = "footer">
		<p>
			|| &emsp; &emsp; &copy;Advanced Scanners Inc &emsp; &emsp;|| &emsp; &emsp; Austin, TX &emsp; &emsp;|| 
		</p>
	</div>
</body>
</html>