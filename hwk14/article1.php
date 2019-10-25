<!DOCTYPE html>
<html>
<head>
	<title>Article 1</title>
</head>

<body>
	<h1>The Westfield Post</h1>
	<?php 
		if(isset($_COOKIE["id"])) {
			showArticle1();		
		} else {
			echo "<p>You need to log in to read this article <a href = './signUp.php'>Sign Up Here</a></p>";
		}
	?>
</body>
</html>
<?php
	function showArticle1() {
		print<<<ARTICLE1
			<h3>Does America Really Run On Dunkin?</h3>
			<p>No not really! Apparently Dunkin Donuts is much more popular in the Northeast than it is in the rest of the country. So really the northeast runs on Dunkin!</p>
ARTICLE1;
	}
?>