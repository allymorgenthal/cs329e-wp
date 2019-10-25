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

    $table = STUDENTS;

    $id = $_POST["studentid"];
   	$last = $_POST["lastname"];
    $first = $_POST["firstname"];

    if ($id != "") {
    	$result = mysqli_query($connect, "SELECT * from $table WHERE ID = $id");
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
        while ($row = $result -> fetch_row()) {
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
    } else {
    	if ($last != "" && $first == "") {
    		$result = mysqli_query($connect, "SELECT * from $table WHERE LAST = \"$last\"");
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
            while ($row = $result -> fetch_row()) {
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
    }
   	if ($last != "" && $first != "") {
   		$result = mysqli_query($connect, "SELECT * from $table WHERE LAST = \"$last\" AND FIRST = \"$first\"");
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
            while ($row = $result -> fetch_row()) {
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
   	}
   	if ($last =="" && $first != "") {
   		$result = mysqli_query($connect, "SELECT * from $table WHERE FIRST = \"$first\"");
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
            while ($row = $result -> fetch_row()) {
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
   		}
	}
}
function viewTable() {
	print<<<VIEWPAGE
                <form method = "post">
                <table>
                        <tr>
                                <td>ID</td>
                                <td><input type = "text" name = "studentID"></td>
                        </tr>
                        <tr>
                                <td>Last</td>
                                <td><input type = "text" name = "lastname"></td>
                        </tr>
                        <tr>
                                <td>First</td>
                                <td><input type = "text" name = "firstname"></td>
                        </tr>
                        <tr>
                                <td><input type = "submit" name = "submit" value = "Delete"></td>
                                <td><input type = "reset" name = "reset" value = "Reset"></td>
                        </tr>
                </table>
                </form>
VIEWPAGE;
        mysqli_close($connect);
}
?>

<html>
<head>
	<title>View Table</title>
</head>
<body>
	<h3>View Table</h3>
	<?php start(); ?>
	<a href = "viewAll.php">View All Students</a><br>
</body>
</html>








