<!DOCTYPE html>
<html>
<head>
        <title>Article 3</title>
</head>

<body>
        <h1>The Westfield Post</h1>
        <?php
                if(isset($_COOKIE["id"])) {
                        showArticle3();
                } else {
                        echo "<p>You need to log in to read this article</p>";
                }
        ?>
</body>
</html>
<?php
        function showArticle3() {
  			print<<<ARTICLE3
				<h3>Help Save Endangered Elephants!</h3>
				<p>New non-profit is dedicated to making sure elephants dont go extinct. Read below to see what you can do to make a difference.</p>
ARTICLE3;
        }
?>
