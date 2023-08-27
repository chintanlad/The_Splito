


<?php
// require_once "config.php";
// session_start();
// if (isset($_GET['transid'])) {
//     $_SESSION['tid'] = $_GET['transid'];
// }
// $tid = $_SESSION['tid'];
// $id = $_SESSION['id'];
// $sql = "SELECT * FROM `group` WHERE `groupid`=(SELECT `groupid` FROM `transaction` WHERE `trasactionid`='$tid')";
// $result = mysqli_query($link, $sql);
// $members = 0;


// if (isset($_POST['paybtn'])) {
//     $gi = $_SESSION['gpid'];

//     $sql2 = "INSERT INTO `paid`(`userid`, `ispaid`, `transactionid`, `groupid`) VALUES ('$id','1','$tid','$gi')";
//     $result3 = mysqli_query($link, $sql2);
//     $sql7 = "UPDATE `group` set `perperson`=`perperson`-(SELECT `perperson` from `transaction` where `userid`='$id' and `trasactionid`='$tid') where `userid`='$id' ";
//     $result7 = mysqli_query($link, $sql7);
// }
// while ($row = mysqli_fetch_assoc($result)) {
//     // $j=0;
//     $members++;
//     $i = $row['userid'];
//     $sql3 = "SELECT * FROM `paid` WHERE `userid`='$i' AND `transactionid`='$tid'";
//     $result3 = mysqli_query($link, $sql3);
    // while(mysqli_num_rows($result3) ){//$row3 = mysqli_fetch_assoc($result3)){
    //     $j++;
    // }

//     echo $row['user'];
//     if (mysqli_num_rows($result3)) {
//         echo '<h4 style="color:green">paid</h4>';
//     } else {
//         echo '<h4 style="color:red">notpaid</h4>';
//     }
//     echo "<br>";
// }

// $sql5 = "SELECT * FROM `paid` WHERE `transactionid`='$tid'";
// $result5 = mysqli_query($link, $sql5);

// if (mysqli_num_rows($result5) == $members) {
//     $sql6 = "UPDATE `transaction` SET `is_paid`='1' WHERE `trasactionid`='$tid'";
//     $result6 = mysqli_query($link, $sql6);
// }

// $sql2 = "SELECT * FROM `paid` WHERE `userid`='$id' AND `transactionid`='$tid'";
// $result2 = mysqli_query($link, $sql2);
// // $i=0;
// // while($row2 = mysqli_fetch_assoc($result2)){
// //     $i++;
// // }



// ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./myaccountcss.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./transcss.css">
    <!-- <link rel="stylesheet" href="./aboutcss.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    


    <script src="transjs.js"></script>
   

    <title>Trans</title>
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
                    <li><a href="signup.php" class="btn">Sign Up</a></li>

                    <li><a href="#about">About</a></li>

                    <li><a href="contact.php">Contact Us</a></li>
                    <!-- <li><a href="#contact">My Account</a></li> -->
                    <li><a href="home.php">Home</a></li>
                </ul>
            </div>

        </div>
        <?php
        
        require_once "config.php";
        session_start();
      
        if (isset($_GET['transid'])) {
            $_SESSION['tid'] = $_GET['transid'];
        }
        $tid = $_SESSION['tid'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `group` WHERE `groupid`=(SELECT `groupid` FROM `transaction` WHERE `trasactionid`='$tid')";
        $result = mysqli_query($link, $sql);
        $members = 0;
        
        
        if (isset($_POST['paybtn'])) {
            $gi = $_SESSION['gpid'];
        
            $sql2 = "INSERT INTO `paid`(`userid`, `ispaid`, `transactionid`, `groupid`) VALUES ('$id','1','$tid','$gi')";
            $result3 = mysqli_query($link, $sql2);
            $sql7 = "UPDATE `group` set `perperson`=`perperson`-(SELECT `perperson` from `transaction` where `id`='$id' and `trasactionid`='$tid') where `userid`='$id' and `groupid`='$gi'";
            $result7 = mysqli_query($link, $sql7);
        }
        while ($row = mysqli_fetch_assoc($result)) {
            // $j=0;
            $members++;
            $i = $row['userid'];
            $sql3 = "SELECT * FROM `paid` WHERE `userid`='$i' AND `transactionid`='$tid'";
            $result3 = mysqli_query($link, $sql3);
            // while(mysqli_num_rows($result3) ){//$row3 = mysqli_fetch_assoc($result3)){
            //     $j++;
            // }
        
            echo $row['user'];
            if (mysqli_num_rows($result3)) {
                echo '<h4 style="color:green">Paid</h4>';
            } else {
                echo '<h4 style="color:red">UnPaid</h4>';
            }
            echo "<br>";
        }
        
        $sql5 = "SELECT * FROM `paid` WHERE `transactionid`='$tid'";
        $result5 = mysqli_query($link, $sql5);
        
        if (mysqli_num_rows($result5) == $members) {
            $sql6 = "UPDATE `transaction` SET `is_paid`='1' WHERE `trasactionid`='$tid'";
            $result6 = mysqli_query($link, $sql6);
        }
        
        $sql2 = "SELECT * FROM `paid` WHERE `userid`='$id' AND `transactionid`='$tid'";
        $result2 = mysqli_query($link, $sql2);
        // $i=0;
        // while($row2 = mysqli_fetch_assoc($result2)){
        //     $i++;
        // }
        
        
        
        ?>



<?php
  $isuploaded=0;
        if (mysqli_num_rows($result2)) {
            echo '<p style="color:green; font-size:40px;">You have Paid..!!!</p>';
        } else {
            echo '<form action="" method="post">
            <button type="submit" id="paybutton" name="paybtn" class="pbutton" value="paid">PAY</button>
            <div class="progress-bar"></div>
            <svg x="0px" y="0px"
            viewBox="0 0 25 30" style="enable-background:new 0 0 25 30;">
             <path class="pcheck" class="st0" d="M2,19.2C5.9,23.6,9.4,28,9.4,28L23,2"/>
           </svg>
        </form>';
        }
        ?>
        <?php

if(isset($_POST['upload'])){
            

            $directory = "uploads/";
            $targetfile  = $directory . basename($_FILES["fl"]["name"]);
            $filetype = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
        
            if($filetype != "png" && $filetype != "jpg" ){
                $typeerror = true;
            }
            else{
                if(move_uploaded_file($_FILES["fl"]["tmp_name"],$targetfile)){
                    $filename = $_FILES["fl"]["name"];
                    $filepath = $directory;
                   
                    $sql11="UPDATE `transaction` SET `file_name`='$filename' WHERE `trasactionid` = '$tid'";
                    
        
                    
        
                    $result11 = mysqli_query($link,$sql11);
                    $isuploaded=true;
        
                    
                }
                
               
            }
            
        }
        ?>
    </div>



    <!-- <main>
  <div class="pbutton">
    <div class="ptext">Submit</div>
  </div>
  <div class="progress-bar"></div>
  <svg x="0px" y="0px"
   viewBox="0 0 25 30" style="enable-background:new 0 0 25 30;">
    <path class="pcheck" class="st0" d="M2,19.2C5.9,23.6,9.4,28,9.4,28L23,2"/>
  </svg>
</main> -->


    <!-- <form action="" method="post">
<input type="submit" name = "update"></input>
        <!--
    //     if(isset($_POST['update'])){
    //             echo '
    //             <label for="newamount">update amount</label>
    //                 <input type="text" name="newamount" id="newamount" placeholder="update values" ></input>';
    //         }
    //        echo  '<input type="submit" name ="upd"></input>';
    //        if(isset($_POST['upd']))
    //        {
    //         $sql8="UPDATE `transaction` set `perperson` = ? where `trasactionid`=$tid  and `userid`= $id";
    //         if($stmt8= mysqli_prepare($link, $sql8))
    //         {
    //         mysqli_stmt_bind_param($stmt8, "d", $new);
    //         $new=$_POST['newamount'];
    //         if (mysqli_stmt_execute($stmt8)) {
    //         $sql9="UPDATE `transaction` set `perperson` = ? where `trasactionid`=$tid  and `userid` != $id";
    //         if($stmt9=mysqli_prepare($link,$sql9))
    //         {
    //         mysqli_stmt_bind_param($stmt9,"d",$update);
    //         $sql10="SELECT * FROM `transaction` where `trasactionid`= $tid";
    //         $result9=mysqli_query($link,$sql10);
    //         $row=mysqli_fetch_array($result9);
    //         $update=($row['totalamount']-$new)/($row['members']-1);

    //         }
    //         } else {
    //         echo "Oops! Something went wrong. Please try again later.";
    //         }
    //     }    
    // }
      //-->

    <?php
    // if(mysqli_num_rows($result2)){
    //     echo '<p style="color:green">you have PAID!</p>';


    // }
    // else{
    //     echo '<form action="" method="post">
    //     <button type="submit" id="paybutton" name="paybtn" value="paid">PAY</button>
    // </form>';
    // }
    ?>


<?php 
        if($isuploaded == 0){
            echo ' <form action="" method="post"  enctype="multipart/form-data">
            <input type="file" placeholder="Choose File" name="fl" class="cf" required id="cf">
            <br>
            <button type="submit"value="upload" id="sbmt" name="upload">UPLOAD</button>
            </form>';
        }
        else{
            echo '<img src="uploads/'.$filename.'" style="height:200px;"alt="not found">';
            echo '<br>';
            echo '<a href="uploads/'.$filename.'" download>Download</a>';
        }
        
    ?>

</body>

</html>