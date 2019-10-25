<!DOCTYPE html>

<html>
<head>
        <link rel = "stylesheet" title = "basic style" type = "text/css" href = "./advancedScanners.css" media = "all"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset = "utf-8"/>
        <script src="dropdown.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
        $(document).ready(function() { 
                $("#submitBTN").click(function() {
                        var name = $("#username").val().trim();
                        var pass = $("#password").val().trim();

                        if (name != "" && pass != "") {
                                $.ajax ({
                                        type:'POST',
                                        url:"checklogin.php",
                                        data: {username:name, password:pass},

                                        success:function(response) {
                                                alert("hi");
                                                if(response == "true") {
                                                        window.location= "links.html";
                                                } else {
                                                        window.location= "login.php";
                                                }
                                        }        
                                });
                        } else {
                                alert("Please Fill In All Boxes");
                        } 
                });
        });
 
        </script>

</head>

<?php
        function begin() {
                if(isset($_COOKIE["sessionid"])) {include 'links.html';
                } else {
                        printLogin();
                }
        }

        function printLogin() {
                print<<<LOGIN
                <h2>Login Page</h2>
                <div class = "login">
                <form action = "" method = "post">
                        <label for = "username"> Username: </label>
                        <input type = "text" name = "username" id = "username"><br><br>
                        <label for = "password"> Password: </label>
                        <input type = "text" name = "password" id = "password"><br><br>
                        <input type = "submit" value = "Submit" name = "submitBTN" id = "submitBTN"/>
                        <input type = "reset" value = "Clear" name = "reset"/>
                </form>
                </div>
LOGIN;
        }


?>

<body>
        <?php begin(); ?>
        <div class = "headers1">
                <h1> ADVANCED <img src = "AS.jpg" alt = "AS"> SCANNERS </h1>
        </div>
        <div class = "navigation">
                <a href = "./advancedScanners.html">Home</a>
                <a href = "./story.html">Our Story</a>
                <a href = "./progress.html">Progress</a>
                <a href = "./contactAS.php">Contact Us</a>
                <div class = "dropdown">
                        <button class = "dropbtn" onclick = "dropDown()">Our Team
                                <i class = "fa fa-caret-down"></i>
                        </button>
                        <div class = "dropoptions" id = "myDropdown">
                                <a href = "./founders.html">Founders</a>
                                <a href = "./interns2.html">Interns</a>
                        </div>
   </div>
        </div>
        <div class = "footer">
                <p>
                        || &emsp; &emsp; &copy;Advanced Scanners Inc &emsp; &emsp;|| &emsp; &emsp; Austin, TX &emsp; &emsp;|| &emsp; &emsp;  <a href = "./loginAS.php">Employee Login</a> &emsp; &emsp; ||
        </div>
 </body>
 </html>
