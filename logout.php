<!DOCTYPE html>
<html>
<head>
        <title> LOGGED OUT </title>
</head>
<body>
        <h3> Logged Out </h3>
        You have been logged out.<br>
        <a href = "login.php">Back to Login</a>
</body>
</html>

<?php
        setcookie("sessionid", $username, time()-3600);
        setcookie("timelogged", time(), time()-3600);
        destorySession();
?>