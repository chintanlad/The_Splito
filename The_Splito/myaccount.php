<?php

use LDAP\ResultEntry;

require_once "config.php";
session_start();


//echo $_SESSION['username'];


// if(isset($_POST['sb']))
// {
//     $meet="INSERT INTO `group1`(`groupname`,`members`) VALUES (?,?)";
//     if ($stmt = mysqli_prepare($link, $meet)) {
//     mysqli_stmt_bind_param($stmt, "si", $groupname,$members);
//     $_SESSION['mem'] = $_POST['members'];
//     $groupname=$_POST['groupname'];
//     $members=$_POST['members'];
//     if(mysqli_stmt_execute($stmt)){
       
//         $_SESSION['il'] = mysqli_insert_id($link);
//     } else {
       
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
// }

// if(isset($_POST['sbtn']))
// {
// $sql= "INSERT INTO `transaction`(`totalamount`, `members`,`perperson`,`id`,`groupid`,`moneyfor`) VALUES (?,?,?,?,?,?)";
// if ($stmt = mysqli_prepare($link, $sql)) {
//     // Bind variables to the prepared statement as parameters
//     mysqli_stmt_bind_param($stmt, "iidiis", $totalamount , $members ,$perperson,$id1,$groupid,$moneyfor);
    
//     // Set parameters
//     $moneyfor=$_POST['moneyfor'];
//     $totalamount = $_POST['totalamount'];
//     $members = $_SESSION['mem'];
//     $perperson=$totalamount/$members;
//     $id1=$_SESSION['id'];
//     $groupid=$_SESSION['il'];
//     // Attempt to execute the prepared statement
//     if (mysqli_stmt_execute($stmt)) {
//         // Records created successfully. Redirect to reading page
//         //header("location: myaccount.php");
//         // $_SESSION['li'] = mysqli_insert_id($link);
//     } else {
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
// }

// if(isset($_POST['sbt'])){
//     for($i=0;$i<$_SESSION['mem'];$i++){
//         //echo "HELLO";
//     $sql1= "INSERT INTO `group`(`groupid`,`creator`, `user`,`userid`) VALUES (?,?,?,?)";
//     if ($stmt = mysqli_prepare($link, $sql1)) {
//         //echo "HELLO1";
//     // Bind variables to the prepared statement as parameters
    
//     mysqli_stmt_bind_param($stmt, "iisi", $grid, $id1 , $user ,$userid,);
//     $user=$_POST['username'.($i+1).''];
//     $query="SELECT `id` FROM `user` WHERE `username` = '$user'";
//     $result1=mysqli_query($link,$query);
//     while($gg=mysqli_fetch_assoc($result1))
//     {   //echo "HELLO3";
//         $userid=$gg['id'];
//     }

//     $id1=$_SESSION['id'];
//     $grid=$_SESSION['il'];
//     // Attempt to execute the prepared statement
//     if (mysqli_stmt_execute($stmt)) {
//         //echo "HELLO4";
//        // header("location:transaction.php");
//         // Records created successfully. Redirect to reading page
//     } else {
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
// }
// }

// $id=$_SESSION['id'];
// $sql1="SELECT `groupid` FROM `group` WHERE `userid` = '$id' ";
// $result = mysqli_query($link,$sql1);
//  while($row = mysqli_fetch_assoc($result)){
//     $tr=$row['groupid'];
//     $sql2="SELECT * FROM `group1` WHERE `groupid` = '$tr'";
//     $result1= mysqli_query($link,$sql2);
//     while($row1=mysqli_fetch_assoc($result1))
//     {
//         $groupname=$row1['groupname'];
//         $groupid = $row['groupid'];
//         echo "<br>";
//         echo '<a href="transaction.php?grpid='.$groupid.'">'.$groupname.'</a>';
//         echo "<br>";
//         $members=$row1['members'];
//         echo $members;
//         // echo "<br>";
//     //  $creatorid=$row1['creator'];
//     // 
//     //    echo $creatorname;
//     //    echo $row1['user'];
//     //    echo "<br>";
//     //    //echo $row1['is_fullfilled'];
//     //    echo "<br><br>";
//     }

//  }

// ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./myaccountcss.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./myaccountcss.css">
    <!-- <link rel="stylesheet" href="./aboutcss.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>


     <style>
        .smruti{
    font-size: 50px;
    color: #fff;
    text-align: center;
  }


  .adi{
    /* display: flex; */
    background-color: #ffffff;
        position: relative;
        margin-top: 34px;
                height: auto;
                display: inline-block;
        width: 563px;
        margin-left: 103px;
        padding: 28px;
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }

  /* .adi1{
    display: flex;
  } */
</style>
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
                <li><a href="logout.php" class="btn">Log Out</a></li>

<li><a href="#about">About</a></li>
<li><a class="active" href="myaccount.php">My Account</a></li>
<li><a href="contact1.php">Contact Us</a></li>
<!-- <li><a href="#contact">My Account</a></li> -->
<li><a href="home11.php">Home</a></li>
                </ul>
            </div>

        </div>

        <?php

//use LDAP\ResultEntry;

// require_once "config.php";
// session_start();


echo "<center><span class='smruti'>" ."Welcome To Splito : ". $_SESSION['username'] . "</span></center>";


if(isset($_POST['sb']))
{
    $meet="INSERT INTO `group1`(`groupname`,`members`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($link, $meet)) {
    mysqli_stmt_bind_param($stmt, "si", $groupname,$members);
    $_SESSION['mem'] = $_POST['members'];
    $groupname=$_POST['groupname'];
    $members=$_POST['members'];
    if(mysqli_stmt_execute($stmt)){
       
        $_SESSION['il'] = mysqli_insert_id($link);
    } else {
       
        echo "Oops! Something went wrong. Please try again later.";
    }
}
}

if(isset($_POST['sbtn']))
{
$sql= "INSERT INTO `transaction`(`totalamount`, `members`,`perperson`,`id`,`groupid`,`moneyfor`) VALUES (?,?,?,?,?,?)";
if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "iidiis", $totalamount , $members ,$perperson,$id1,$groupid,$moneyfor);
    
    // Set parameters
    $moneyfor=$_POST['moneyfor'];
    $totalamount = $_POST['totalamount'];
    $members = $_SESSION['mem'];
    $perperson=$totalamount/$members;
    $id1=$_SESSION['id'];
    $groupid=$_SESSION['il'];
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Records created successfully. Redirect to reading page
        //header("location: myaccount.php");
        // $_SESSION['li'] = mysqli_insert_id($link);
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
}

if(isset($_POST['sbt'])){
    for($i=0;$i<$_SESSION['mem'];$i++){
        //echo "HELLO";
    $sql1= "INSERT INTO `group`(`groupid`,`creator`, `user`,`userid`) VALUES (?,?,?,?)";
    if ($stmt = mysqli_prepare($link, $sql1)) {
        //echo "HELLO1";
    // Bind variables to the prepared statement as parameters
    
    mysqli_stmt_bind_param($stmt, "iisi", $grid, $id1 , $user ,$userid,);
    $user=$_POST['username'.($i+1).''];
    $query="SELECT `id` FROM `user` WHERE `username` = '$user'";
    $result1=mysqli_query($link,$query);

    while($gg=mysqli_fetch_assoc($result1))
    {   //echo "HELLO3";
        $userid=$gg['id'];
    }

    $id1=$_SESSION['id'];
    $grid=$_SESSION['il'];
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        //echo "HELLO4";
       // header("location:transaction.php");
        // Records created successfully. Redirect to reading page
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
}
}

$id=$_SESSION['id'];
$sql1="SELECT `groupid` FROM `group` WHERE `userid` = '$id' ";
$result = mysqli_query($link,$sql1);





echo "<center><div class='adi'>";

 while($row = mysqli_fetch_assoc($result)){
    $tr=$row['groupid'];
    $sql2="SELECT * FROM `group1` WHERE `groupid` = '$tr'";
    $result1= mysqli_query($link,$sql2);
    while($row1=mysqli_fetch_assoc($result1))
    {
        $groupname=$row1['groupname'];
        $groupid = $row['groupid'];
        echo "<br>";
        echo '<a href="transaction.php?grpid='.$groupid.'">'.$groupname.'</a>';
        echo "<br>";
        $members=$row1['members'];
        echo "Total Members of this Group:".$members;
        // echo "<br>";
    //  $creatorid=$row1['creator'];
    // 
    //    echo $creatorname;
    //    echo $row1['user'];
    //    echo "<br>";
    //    //echo $row1['is_fullfilled'];
    //    echo "<br><br>";
    }

 }
 echo "</div></center>";

?>
    <center><form action="" method="post">
        <center><h2>Create group</h2></center>
        <label for="groupname" style="color: white; font-size:30px">Group name :</label>
        <input class="textfeild" name="groupname" id="groupname" placeholder="Your group name"></input><br><br>
        
        <label for="members" style="color: white; font-size:30px">Total Members :</label>
        <input class="textfeild" name="members" id="members" placeholder="Total members including yourself"></input><br><br>
        <button class="primaryBtn" type="submit" name="sb">SUBMIT</button><br><br>
    </form></center>
    <form action="" method="post">
        <?php
        if(isset($_POST['sb'])){
            for($i=0;$i<$_SESSION['mem'];$i++){
                echo '
                <center><label for="username'.($i+1).'" style="font-size:40px;">Username '.($i+1).'</label>
                    <select name="username'.($i+1).'" id="username'.($i+1).'" placeholder="Add '.($i+1).' username" >';
                    $sql = "SELECT * FROM `user`";
                    $result = mysqli_query($link,$sql);
                    echo '<option value = "">-select-</option>';
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value = "'.$row['username'].'"> '.$row['username'].'</option>';
                    }

                echo '</select></center>';
            }
        }
        if(isset($_GET['err']))
        {
            echo "Invalid username";
        }
        ?>
        <center><button class="primaryBtn" type="submit" name="sbt">SUBMIT</button><br><br></center>
    </form>
    <!-- <form action="" method="post">
        <label for="totalamount">Total Amount</label>
        <input type="text" name="totalamount" id="totalamount" placeholder="Add the amount to split" ></input>
        
        <input type="text" name="moneyfor" id="moneyfor" placeholder="For what this money was spent"></input>
        <input type="submit" name = "sbtn"></input>
    </form> -->
   
    <!-- <a href="logout.php">LOGOUT</a> -->

</body>
</html>