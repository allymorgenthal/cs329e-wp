<!DOCTYPE html>
<html>
<head>
        <title>Article 5</title>
</head>

<body>
        <h1>The Westfield Post</h1>
        <?php
                if(isset($_COOKIE["id"])) {
                        showArticle5();
                } else {
                        echo "<p>You need to log in to read this article</p>";
                }
        ?>
</body>
</html>
<?php
        function showArticle5() {
			print<<<ARTICLE5
				<h3>What Makes A Good Party? The Ten Things You Need To Know</h3>
				<p>These 10 party tips will help you plan the best party of the year! From what snack and drinks to buy to what music to play we will help you learn the right way to throw a soiree. </p>
ARTICLE5;
        }
?>