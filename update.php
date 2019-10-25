<!DOCTYPE html>

<?php

function start() {
        viewTable();
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

        $table = "STUDENTS";


        $id = $_POST["studentid"];
        $last = $_POST["lastname"];
        $first = $_POST["firstname"];
        $major = $_POST["major"];
        $gpa = $_POST["gpa"];

        if (($id != "") && ($last != "" || $first != "" || $major != "" || $gpa != "")) {
                if($last != "" ) {
                        $stmt = mysqli_prepare ($connect, "UPDATE $table SET lastname = ? WHERE id = $id");
                        mysqli_stmt_bind_param($stmt, 's', $last);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        echo("updated");
                }
                if ($first != "") {
                        $stmt = mysqli_prepare ($connect, "UPDATE $table SET firstname = ? WHERE id = $id");
                        mysqli_stmt_bind_param($stmt, 's', $first);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt); echo("updated");
                }
                if ($major != "") {
                        $stmt = mysqli_prepare ($connect, "UPDATE $table SET major = ? WHERE id = $id");
                        mysqli_stmt_bind_param($stmt, 's', $major);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        echo("updated");
                }
                if ($gpa != "") {
                        $stmt = mysqli_prepare ($connect, "UPDATE $table SET gpa = ? WHERE id = $id");
                        mysqli_stmt_bind_param($stmt, 's', $gpa);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        echo("updated");
                }

                ?><a href = "login.php">Back to Login</a><?php
        }else {
                echo("empty field");
        }
}

function viewTable(){
        print<<<UPDATEPAGE
                <form method = "post">
                <table>
                        <tr>
                                <td>ID</td>
                                <td><input type = "text" name = "studentID"></td>
                        </tr>
                        <tr>
 <td>Last</td>
                                <input type = "text" name = "lastname"></td>
                        </tr>
                        <tr>
                                <td>First</td>
                                <input type = "text" name = "firstname"></td>
                        </tr>
                        <tr>
                                <td>Major</td>
                                <input type = "text" name = "major"></td>
                        </tr>
                        <tr>
                                <td>GPA</td>
                                <input type = "text" name = "gpa"></td>
                        </tr>
                        <tr>
                                <td><input type = "submit" name = "submit" value = "submit"></td>
                                <td><input type = "reset" name = "reset" value = "clear"></td>
                        </tr>
                </table>
                </form>
UPDATEPAGE;
}
mysqli_close($connect);
?>

<html>
<head>
        <title> Update Table </title>
</head>
<body>
        <h3>Update Table</h3>
        <?php start(); ?>
</body>
</html>
