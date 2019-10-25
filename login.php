<?php
function login() {
        if (!isset($_COOKIE["sessionID"])) {
                session_start();

                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if(isset($_POST["username"])) {
                                $username = $_POST["username"];
                                $password = $_POST["password"];

                                $myfile = fopen("./dbase/passwd", "r");
                                $myusers = Array();
                                while(!feof($myfile)) {
                                        $line = fgets($myfile);
                                        $parts = explode(":", $line);
                                        $myusers[$parts[0]] = $parts[1];
                                }

                                fclose($myfile);

                                echo $myusers;

                                if(array_key_exists($username, $users) && strcmp($users[$username], $password)){
                                        echo "<br> Successful Login! Welcome" .  $username. "<br>";
                                        setcookie("sessionID", $username, time()+1000);
                                        setcookie("timelogged", time(), time()+1000);
                                        echo "<br> <a href =\"login.php\"> Back to Login Page </a><br>";
                                }else {
                                        echo "Login Failed";
                                        echo "<br> <a href =\"login.php\"> Back to Login Page </a><br>";
                                }
                        }
                }else {
                        printLogin();
                }
        } else {
                print("<br> Welcome back ". $_COOKIE["sessionID"] ." <br>");
                if($_SERVER['REQUEST_METHOD'] === 'post') {
                        if (isset($_POST['action'])) {
                                $selected = $_POST['action'];
                                print($selected);

                                if($selected == 'insert') {
                                        insertPage();
                                }else if ($selected == "update") {
                                }else if ($selected == "delete") {
                                }else if($selected == "view") {
                                        viewTable();
                                }else if ($selected == 'logout') {
                                        logout();
                                }
                        }
                } else {
                        showOptions();
                }
        }
}

function sqlConnect() {
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
        return $connect;
}

function viewTable() {
        sqlConnect();

        print<<<TABLE1
                <table>
                        <tr>
                                <th>ID</th>
                        </tr>
                        <tr>
                                <th>Last</th>
                        </tr>
                        <tr>
                                <th>First</th>
                        </tr>
                        <tr>
                                <th>Major</th>
                        </tr>
                        <tr>
                                <th>GPA</th>
                        </tr>
TABLE1;
        $mytable = "STUDENTS";
        $result = mysql_query($connect, "SELECT * FROM $mytable");
        while($row = $result->fetch_row()) {
                print<<<TABLE2
                <tr>
                        <td>$row[0]</td>
                </tr>
                <tr>
                        <td>$row[1]</td>
                </tr>
                <tr>
                        <td>$row[2]</td>
                </tr>
                <tr>
                        <td>$row[3]</td>
                </tr>
                <tr>
                        <td>$row[4]</td>
                </tr>
TABLE2;
        }
        $result -> free();
        mysqli_close($connect);
}

function showOptions() {
        print<<<OPTIONS
                <a href = "insert.php">Insert Student Record</a><br>
                <a href = "update.php">Update Student Record</a><br>
                <a href = "delete.php">Delete Student Record</a><br>
                <a href = "view.php">View Student Record</a><br>
                <a href = "logout.php">Logout</a><br>
OPTIONS;
}

function printLogin() {
        print<<<LOGIN
                <!DOCTYPE html>
                <html lang="en">
                <head>
                        <title>Registration Form</title>
                </head>
                <body>
                        <h2>Student Records Login</h2>
                        <form action = "" method = "post">
                        <table>
                                <tr>
  <td>Username</td>
                                        <td><input type = "text" name = "username" size="30"/></td>
                                </tr>
                                <tr>
                                        <td>Password</td>
                                        <td><input type = "text" name = "password" size = "30" /></td>
                                </tr>
                                <tr>
                                        <td><input type = "submit" value = "Submit" /></td>
                                        <td><input type = "reset" value = "Reset" /></td>
                                </tr>
                        </table>
                        </form>
                </body>
                </html>
LOGIN;
}
login();
?>
