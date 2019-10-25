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
			print<<<ARTICLE4
				<h3>Nature or Nurture? This New Study Shows New Insights</h3>
				<p>New psychological study reveals the truth on which one really plays a bigger role in making you who you are. </p>
ARTICLE4;	
        }
?>