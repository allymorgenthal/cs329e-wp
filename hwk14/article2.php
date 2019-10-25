<!DOCTYPE html>
<html>
<head>
	<title>Article 2</title>
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
			print<<<ARTICLE2
				<h3>Why Do Most Americans Say Blue Is Their Favorite Color?</h3>
				<p>Blue is a proud, bold color and Americans seem to like it best! 70% of Americans say blue is their favorite color.</p>
ARTICLE2;
	}
?>