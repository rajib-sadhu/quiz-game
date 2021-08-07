<?php

    session_start();

    if(!isset($_SESSION['username']))
    {
        header('location:loginAcc.php');
    }

    $n1= $_SESSION['username'];      
    $n=  strtoupper ($n1);


    $con = mysqli_connect('localhost','root');

    if($con)
    {
        ?>
            <script>alert("DB Success!");</script>
        <?php
    }

    mysqli_select_db($con,'quizdatabase');

    if(isset($_POST['submit']))
    {
        if(!empty($_POST['quizcheck']))
        {
            $count = count($_POST['quizcheck']);

            $answerAttm =  $count;

            $result = 0;
            $i = 1;

            $selected = $_POST['quizcheck'];
            

            $q = "select * from question";
            $query = mysqli_query($con,$q);

            while ($rows = mysqli_fetch_array($query))
            {
                
                
                $checked = $rows['ans_Id'] == $selected[$i];

                if($checked)
                {
                    $result++;
                }

                $i++;
            }

            $score = $result;
        }
    }

    $name = $_SESSION['username'];
    $finalResult = " INSERT INTO `user`(`Username`, `totalQuestion`, `answerCorrect`) VALUES ('$name','5','$result') ";
    
    $queryResult = mysqli_query($con,$finalResult);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game Result</title>
    <link rel="stylesheet" href="css/check_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
</head>
</head>
<body>


<div class="check-body">
<center>
    <h1>Welcome to Rajib Sadhu Web Developer Basic Quiz Game</h1>
<br>
    <button  class="logout-btn"><a href="logout.php">LOG OUT</a></button>
    <br><br>
             
</center>

<p>Thanks for playing</p>

<div class="question">
    <h4>You have attended the question</h4>
</div>
<div class="ans">
    <h2><?php echo $answerAttm; ?> </h2>
</div>
<div class="question">
    <h4>You have Score</h4>
</div>
<div class="ans">
    <h2><?php echo $score; ?> </h2>
</div>

</div>

<br><br><br><br>

    <center><h5>Website Created by David RS</h5></center>

    </div> 
</body>
</html>