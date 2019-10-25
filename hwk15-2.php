<?php
        extract($_POST);
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === "GET"){
                if(isset($_COOKIE['quizTime'])){
                        echo "Test";
                        if($_SESSION['question'] == 'Q6') {
                                printQ6();
                        } else if ($_SESSION['question'] == 'Q5') {
                                printQ5();
                        } else if ($_SESSION['question'] == 'Q4') {
                                printQ4();
                        } else if ($_SESSION['question'] == 'Q3') {
                                printQ3();
                        } else if ($_SESSION['question'] == 'Q2') {
                                printQ2();
                        } else if ($_SESSION['question'] == 'Q1') {
                                printQ1();
                        }
                } else {
                        printLogin();
                }
        } else if (isset($_SESSION['question'])) {
                if ($_SESSION['question'] == 'Q6') {
                        timer();
                        if (isset($_POST['Q6'])) {
                                $submitted = (strtoupper($_POST['Q6']));
                                $answer = 'AGE';
                                if ($submitted == $answer) {
                                        $_SESSION['correct'] ++;
                                } else {
                                        grade($_COOKIE['username']);
                                }
                        } else {
                                printQ6();
                        }
                } else if ($_SESSION['question'] == 'Q5') {
                        timer();
                        if (isset($_POST['Q5'])) {
                                $submitted = (strtoupper($_POST['Q5']));
                                $answer = 'GALAXY';
                                if ($submitted == $answer) {
                                        $_SESSION['correct'] ++;
                                } else {
                                        $_SESSION['question'] = "Q6";
                                        printQ6();
                                }
                        } else {
                                printQ5();
                        }
                } else if ($_SESSION['question'] == 'Q4') {
                        timer();
                        if (isset($_POST["Q4"])) {
                                $submitted = $_POST['Q4'];
                                $answer = 'rightMC4';
                                if ($submitted == $answer) {
                                        $_SESSION['correct'] ++;
                                } else {
                                        $_SESSION['question'] = "Q5";
                                        printQ5();
                                }
                        } else {
                                printQ4();
                        }
                } else if ($_SESSION['question'] == 'Q3') {
                        timer();
                        if (isset($_POST["Q3"])) {
                                $submitted = $_POST['Q3'];
                                $answer = 'rightMC3';
                                if ($submitted == $answer) {
                                        $_SESSION['correct'] ++;
                                } else {
                                        $_SESSION['question'] = "Q4";
                                        printQ4();
                                }
                        } else {
                                printQ3();
                        }
                } else if ($_SESSION['question'] == 'Q2') {
                        timer();
                        if (isset($_POST["Q2"])) {
                                $submitted = $_POST['Q2'];
                                $answer = 'rightTF2';
                                if ($submitted == $answer) {
                                        $_SESSION['correct'] ++;
                                } else {
                                        $_SESSION['question'] = "Q3";
                                        printQ3();
                                }
                        } else {
                                printQ2();
                        }
                } else if ($_SESSION['question'] == 'Q1') {
                        timer();
                        if (isset($_POST["Q1"])) {
                                $submitted = $_POST['Q1'];
                                $answer = 'rightTF1';
                                if ($submitted == $answer) {
                                        $_SESSION['correct'] ++;
                                } else {
                                        $_SESSION['question'] = "Q2";
                                        printQ2();
                                }
                        } else {
                                printQ1();
                        }
          }
        } else {
                if (isset($_POST['loginInfo'])) {
                        $loggedIn = false;
                        $notUnique = false;
                        $username = $_POST['username'];
                        $password = $_POST['password'];


                        $myResults = fopen('results.txt', 'r');
                        while(!feof($myResults)) {
                                $line = fgets($myResults);
                                if ($line == "") {
                                        fclose($myResults);
                                        break;
                                } else {
                                        $users = explode(":", $line);
                                        if ($users[0] == $username) {
                                                $notUnique = true;
                                                break;
                                        }
                                }       
                        }

                        if (!$notUnique) {
                                $myPasswords = fopen('passwd.txt', 'r');
                                while(!feof($myPasswords)) {
                                        echo "test";
                                        $line = fgets($myPasswords);
                                        if ($line == "") {
                                                fclose($myPasswords);
                                                break;
                                        }
                                        $users = explode(":", $line);
                                        if ((trim($users[0]) == trim($username)) && (trim($users[1]) == trim($password))) {
                                                $loggedIn = true;
                                                fclose($myPasswords);
                                                break;
                                        }
                                }
                        }

                        if ($loggedIn) {
                                setcookie('quizTime', time(), time() + 900);
                                $_SESSION['correct'] = 0;
                                $_SESSION['question'] = "Q1";
                                setcookie('username', $username, time()+3600*24*365);
                                printQ1();
                        } else {
                                echo "Login Falied";
                                echo $notUnique;
                                printLogin();
                        }
                } else {
 printLogin();
                }
        }

        function timer(){
                if (!isset($_COOKIE['quizTime'])){
                        grade($_COOKIE['username']);
                         echo "You ran out of time";
                }
        }

        function printLogin() {
                print<<<LOGINPAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Login</title>
                        </head>
                        <body>
                                <form action = "" method = "POST">
                                        <h1>Astronomy Quiz Login In</h1>
                                        <input type = "hidden" name = "loginInfo">
                                        <table>
                                                <tr>
                                                        <td>Username:</td>
                                                        <td><input type = "text" name = "username"></td>
                                                </tr>
                                                <tr>
                                                        <td>Password:</td>
                                                        <td><input type = "text" name = "password"></td>
                                                </tr>
                                                <tr>
                                                        <td><input type="submit" value="Login"></td>
                                                        <td><input type="reset" value="Clear"></td>
                                                </tr>
                                        </table>
                                </form>
                        </body>
                        </html>
LOGINPAGE;
        }

        function printQ1() {
                print<<<Q1PAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Q1</title>
                        </head>
                        <body>
                                <form action = "" method = "POST">
                                        <p> 1) According to Kepler the orbit of the earth is a circle with the sun at the center.</p>
                                        <input type = "radio" value = "wrongTF1" name = "Q1">True<br>
                                        <input type = "radio" value = "rightTF1" name = "Q1">False<br>
 <input type = "submit" value = "Submit Q1">
                                </form>
                        </body>
                        </html>
Q1PAGE;
        }

        function printQ2() {
                print<<<Q2PAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Q2</title>
                        </head>
                        <body>
                                <form action = "" method = "POST">
                                        <p> 2) Ancient astronomers did consider the heliocentric model of the solar system but rejected it because they could not detect parallax.</p>
                                        <input type = "radio" value = "rightTF2" name = "Q2">True<br>
                                        <input type = "radio" value = "wrongTF2" name = "Q2">False<br>
                                        <input type = "submit" value = "Submit Q2">
                                </form>
                        </body>
                        </html>
Q2PAGE;
        }

        function printQ3() {
                print<<<Q3PAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Q3</title>
                        </head>
                        <body>
                                <form action = "" method = "POST">
                                <p>3) The total amount of energy that a star emits is directly related to its</p><br>
                                <input type = "checkbox" value = "wrongMC3" name = "Q3">surface gravity and magnetic field<br>
                                <input type = "checkbox" value = "rightMC3" name = "Q3">radius and temperature<br>
                                <input type = "checkbox" value = "wrongMC3" name = "Q3">pressure and volume<br>
                                <input type = "checkbox" value = "wrongMC3" name = "Q3">location and velocity<br>
                                        <input type = "submit" value = "Submit Q3">
                                </form>
                        </body>
                        </html>
Q3PAGE;
        }

        function printQ4() {
                print<<<Q4PAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Q4</title>
 </head>
                        <body>
                                <form action = "" method = "POST">
                                <p>4) Stars that live the longest are</p><br>
                                <input type = "checkbox" value = "wrongMC4" name = "Q4">high mass<br>
                                <input type = "checkbox" vale = "wrongMC4" name = "Q4">high temperature<br>
                                <input type = "checkbox" value = "wrongMC4" name = "Q4">lots of hydrogen<br>
                                <input type = "checkbox" value = "rightMC4" name =      "Q4">small mass<br>
                                        <input type = "submit" value = "Submit Q4">
                                </form>
                        </body>
                        </html>
Q4PAGE;
        }

        function printQ5(){
                print<<<Q5PAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Q5</title>
                        </head>
                        <body>
                                <form action="" method="POST">
                                        <p>5) A collection of a hundered billion stars, gas, and dust is called a
                                        <input type = "text" id = "Q5">.</p>
                                        <input type = "submit" value = "Submit Q5">
                                </form>
                        </body>
                        </html>
Q5PAGE;
        }


        function printQ6(){
                print<<<Q6PAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15 - Q6</title>
                        </head>
                        <body>
                                <form action="" method="POST">
                                        <p> 6) The inverse of the Hubble's constant is a measure of the <input type = "text" name = "Q6"> of the universe.</p>
                                        <input type = "submit" value = "Submit Q6">
                                </form>
                        </body>
                        </html>
Q6PAGE;
        }

        function gradeQuiz($user) {
                $myScore = $_SESSION['correct'] * 10;
print<<<GRADEPAGE
                        <!DOCTYPE html>
                        <html>
                        <head>
                                <title>Homework 15-Grade</title>
                        </head>
                        <body>
                                <p>Your Gade Is: <br>
                                        $score / 60</p>
                        </body>
                        </html>
GRADEPAGE;

                $myResults = fopen('results.txt', 'a+');
                $userScore = $user. ":". $score . "\n";
                fwrite($myResults, $userScore);
                fclose($myResults);
                setcookie('quizTime', 0, time());
                setcookie('username', 0, time());
                session_destroy();
        }
?>
