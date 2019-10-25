<?php
        $username = $_POST["username"];
        $password = $_POST["password"];

        echo($username);

        $myfile = fopen("employee.txt", "r");
        $users = Array();
        while(!feof($myfile)) {
                $line = fgets($myfile);
                $parts = explode(":", $line);
                $users[$parts[0]] = $parts[1];
        }
        fclose($myfile);

        if(array_key_exists($username, $users)) {
                if ($password == $users[$username]) {
                        $response = "true";
                        echo $response;
                        setcookie(sessionid, $username, time()+3600);
                        setcookie(timeloggedin, time(), time()+3600);
                } else {
                        $response = "false";
                        echo $response;
                }
        } else {
                echo("You are not a registed employee");
        }
?>