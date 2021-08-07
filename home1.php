<?php

session_start();

if (!isset($_SESSION['username'])) {
    
    echo "Logged Out";
    header('location:loginAcc.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <center>
    <h1>Welcome To my Website</h1>

    <p>Hello! <?php  echo $_SESSION['username']; ?> </p> <br><br>
    <button><a href="logout.php">LOG OUT</a></button>


    </center>
    
</body>
</html>