<?php
require_once "config.php";
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./transactioncss.css">
    <!-- <link rel="stylesheet" href="./myaccountcss.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./myaccountcss.css"> -->
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


  .meet_chutiyo
  {
    font-size: 20px;
    color: rgb(7, 216, 248);
    text-align: center; 
  }

  .meet_bc{
    font-size: 30px;
    color: white;
    text-align: center;
  }
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


echo "<center><span class='smruti'>" . $_SESSION['username'] . "</span></center>";echo "<br>";
$id=$_SESSION['id'];
// 
$_SESSION['gpid'] = $_GET['grpid'];
$gi = $_SESSION['gpid'];
$sql12 = "SELECT * FROM `group1` WHERE `groupid` = '$gi'";
$result12 = mysqli_query($link,$sql12);
$members=0;
while($row = mysqli_fetch_assoc($result12)){
    $members = $row['members'];
}
// display groups
// add transaction
if(isset($_POST['sbtn']))
{
$sql1= "INSERT INTO `transaction`(`totalamount`, `members`,`perperson`,`id`,`groupid`,`moneyfor`,`date`) VALUES (?,?,?,?,?,?,now())";
if ($stmt = mysqli_prepare($link, $sql1)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "iidiis", $totalamount , $members ,$perperson,$id1,$groupid,$moneyfor);
    
    // Set parameters
    $moneyfor=$_POST['moneyfor'];
    $totalamount = $_POST['totalamount'];
    
    $perperson=$totalamount/$members;
    $id1=$_SESSION['id'];
    $groupid=$gi;
    $sql2="UPDATE `group` set `perperson`=`perperson` + ? WHERE `groupid`=?";
     if($stmt1= mysqli_prepare($link, $sql2))
     {
     mysqli_stmt_bind_param($stmt1, "di", $person, $gid);
     $person=$perperson;
     $gid=$groupid;

     if (mysqli_stmt_execute($stmt1)) {
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
     }  

    // // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Records created successfully. Redirect to reading page
        //header("location: myaccount.php");
        // $_SESSION['li'] = mysqli_insert_id($link);
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
}
$sql="SELECT * from `group` WHERE `groupid`=$gi";
$result=mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($result))
{
    echo "<div class='meet_chutiyo'><br>".$row['user']."<br>".$row['perperson']."</div>";
    //   echo "<br>";
    //   echo $row['user'];
    //   echo "<br>";
    //   echo $row['perperson'];
    //   echo "</div>"
}
if(isset($_POST['dbtn'])){
    $temp = $_POST['dbtn'];
    $sql = "DELETE FROM `transaction` WHERE `trasactionid`='$temp'";
    $result = mysqli_query($link,$sql);
}

//show tranasactions 

$sql3="SELECT * FROM `transaction` WHERE `groupid` = $gi order by `date` desc";
$result1=mysqli_query($link,$sql3);
while($roww = mysqli_fetch_assoc($result1)){

    echo "<br>";
    echo "<br>";
    $totalamount=$roww['totalamount'];
    $moneyfor=$roww['moneyfor'];
    $createdon=$roww['date'];
    echo "<div class='meet_bc'><br>"."Total Amount Split: ".$totalamount."<br>"."Money For : ".$moneyfor."<br>"."Transaction Date And Time : ".$createdon."</div>";
    // echo "total amount split:$totalamount";
    // echo "<br>";
   
    // echo "money for :$moneyfor";
    // echo "<br>";
    
    // echo "transaction date and time :$createdon";
    // echo "<br>";
    // echo $roww['is_paid'];
    // echo "<br>";
    // echo $roww['id'];
    $creatorid=$roww['id'];
    $sql3="SELECT `username` FROM `user` WHERE `id` = '$creatorid'";
    $result3=mysqli_query($link,$sql3);
       while($row3=mysqli_fetch_array($result3))
       {
       $creatorname=$row3['username'];
       }
       echo "<div class='meet_bc'><br>"."Creator Name : $creatorname"."<br>"."</div>";
    //    echo  "creator name :$creatorname";
    echo "<br>";
    if($roww['is_paid']){
        echo'<center><h4 style="color:green">Paid</h4></center>';
    }
    else{
        echo'<center><h4 style="color:red">Unpaid</h4></center>';
    }
    
    echo '<center><h3><a href="trans.php?transid='.$roww['trasactionid'].'"> Record</a></h3></center>';
    echo "<br>";
    if($roww['id']==$_SESSION['id'] && $roww['is_paid'] == "1"){
        echo '<form action="" method="post">';
       // echo "HELLO MOTHERFUCKERS";
        echo '<center><button name="dbtn" value="'.$roww['trasactionid'].'" type="submit">DELETE</button></center>';
        echo '</form>';
        echo "<br>";
    }
    


}




 ?>
    
    
    
    
    
    <center><form action="" method="post">
        

        <label for="totalamount" style="color: white; font-size:30px">Total Amount : </label>
        <input class="textfeild" name="totalamount" id="totalamount" placeholder="Add the amount to split"></input><br><br>
        
        <label for="moneyfor" style="color: white; font-size: 30px;">Reason :</label>
        <input class="textfeild" name="moneyfor" id="moneyfor" placeholder="For what this money was spent"></input><br><br>
        <button class="primaryBtn" type="submit" name="sbtn">SUBMIT</button><br><br>
    </form></center>
</div>
   

</body>
</html>

















<?php
// $sql="SELECT * FROM `transaction` WHERE `id` = '$id' ";
// $result = mysqli_query($link,$sql);
// while($row = mysqli_fetch_assoc($result)){
//     echo "<br>";
//     echo $row['totalamount'];
//     echo "<br>";
//     echo $row['members'];
//     echo "<br>";
//     echo $row['perperson'];
//     echo "<br>";

//}
// $sql1="SELECT `groupid` FROM `group` WHERE `userid` = '$id' ";
// $result = mysqli_query($link,$sql1);
// while($row = mysqli_fetch_assoc($result)){
//     $tr=$row['groupid'];
//     $sql2="SELECT * FROM `group` WHERE `groupid` = '$tr'";
//     $result1= mysqli_query($link,$sql2);
//     while($row1=mysqli_fetch_assoc($result1))
//     {
//      $creatorid=$row1['creator'];
//       $sql3="SELECT `username` FROM `user` WHERE `id` = '$creatorid'";
//       $result3=mysqli_query($link,$sql3);
//       while($row3=mysqli_fetch_assoc($result3))
//       {
//         $creatorname=$row3['username'];
//       }
//       echo $creatorname;
//       echo $row1['user'];
//       echo "<br>";
//       echo $row1['is_fullfilled'];
//       echo "<br><br>";
//     }
// }
?>
