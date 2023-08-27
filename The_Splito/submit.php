<?php  
session_start();
$password=$_POST["captcha"];
if($password===$_SESSION['CAPTCHA_CODE'])
{
    echo "Your form has been submitted successfully.";
}

else if($password === '')
{
    echo "<script>alert(\"Please enter the captcha.\")</script>";
}
else{
    echo "<script>alert(\" Captcha is invalid.\")</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form with Captcha</title>
</head>
<body>
    <h2>Contact Form</h2>
    <form method="post" action="submit.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="captcha">Enter Captcha:</label>
        <input type="text" name="captcha" id="captcha" ><br>
        <img src="captcha.php" alt="Captcha Image"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
