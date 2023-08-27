<?php

require_once "config.php";
session_start();
$notlogin = false;
$_SESSION['login'] = false;
if (isset($_POST['sbtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "SELECT `id` FROM `user` WHERE `username`='$username' AND `password` = '$password'"; 
    $result = mysqli_query($link, $sql);

    // Evaluate the count
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        }
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $id;
    } else {
        $notlogin = true;
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="homecss.css">
</head>

<body>
    <div class="container-fluid ps-0 pe-0">
        <div class="row g-0 navi">

            <div class="col-3 ">
                <div class="navleft">
                    <img src="./images/logo.jpg" class="logo">
                </div>
            </div>
            <div class="col-9">
                <ul>
                    <li><a href="#" class="btn">Log In</a></li>
                    <li><a href="signup.php" class="btn">Sign Up</a></li>

                    <li><a href="#about">About</a></li>

                    <li><a href="contact.php">Contact Us</a></li>
                    <!-- <li><a href="#contact">My Account</a></li> -->
                    <li><a href="home.php">Home</a></li>
                </ul>
            </div>

        </div>
        <!-- background image start -->
        <div class="bgimage">

        </div>
        <div class="log"><br>

            <div class="round">
                <img src="./images/login.png" alt="" class="logoimg">

            </div>
            <form action="" method="post">
                <div class="chintan">
                    <!-- <center> <input class="textfeild" type="email" placeholder="Enter Email" name="email" required /><br>
                    </center> -->

                    </center>
                    <br>
                    <center>


                        <input type="text" class="textfeild" name="username" placeholder="Enter Username" onkeyup="if (/[^|a-z0-9_]+/g.test(this.value)) this.value = this.value.replace(/[^|a-z0-9_]+/g,'')"><br>
                        <script>
                            function validate() {
                                var name = document.getElementById("username").value;
                                //do checking here however you like (regex, iteration, etc.)
                            }
                        </script>


                    </center>
                    <br>
                    <center> <input class="textfeild" type="password" placeholder="Enter Password" name="password" required /><br>
                    </center>
                    <br>
                    <center><a href="home.html"><button class="primaryBtn" name="sbtn">Log In</a><br></center>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me<br>
                    </label>


                </div>
                <?php
        if ($_SESSION['login'] == true) {
            header("location:myaccount.php");
        }
        if ($notlogin) {
            echo "incorrect username or password";
        }
        ?>
            </form>

            

        </div>
    </div>
</body>


</html>











<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <h1>LOGIN</h1>
        <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your Email here" required></input>
        <label for="Password">Password:</label>
        <input type="text" name="password" id="password" placeholder="Enter your password" required></input>
        <label for="Email">Email:</label>
        <input type="email" placeholder="Type your email here" name="email" required></input>
        <input type="submit" name="sbtn"></input>
    
    </form>
</body>

</html> -->