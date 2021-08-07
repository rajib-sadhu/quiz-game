<?php

    session_start();

    if (!isset($_SESSION['username'])) {
    
        echo "Logged Out";
        header('location:loginAcc.php');
    }

    $n1= $_SESSION['username'];      
    $n=  strtoupper ($n1);


    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdatabase');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ GAME HOME PAGE</title>
    <link rel="stylesheet" href="css/home_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="quiz-body">


        <center>
            <h1>Welcome to Rajib Sadhu Web Developer Basic Quiz Game</h1>
        

            <br><br>
            <button class="logout-btn"><a href="logout.php">LOG OUT</a></button>
            <br><br>
        </center>

             

<center>
        <h3> Hello!   <?php echo $n; ?> </h3> 
        <p>You Have 5 Differents Questions. And You Have to Select one out of 4.</p>
        <h5>Best of Luck</h5><br><br>
</center>


<br>



<form action="check.php" method="post">
<?php

for ($i=1; $i <6 ; $i++) { 


$q= "SELECT * FROM  question where qId = $i" ;
$query = mysqli_query($con,$q);

while($rows = mysqli_fetch_array($query))
{
    ?>
        <div class="question">
            <h4>  <?php echo $i.'. '. $rows['Questions'] ?> </h4>        
        </div>
        
    <?php

            $q= "SELECT * FROM  answers where ans_Id = $i" ;
            $query = mysqli_query($con,$q);

            while($rows = mysqli_fetch_array($query))
            {
    ?>
            <div class="mcq">
                
                <input type="radio" name="quizcheck[<?php echo $rows['ans_Id'] ?>]" value="<?php echo $rows['aId']; ?>">
                <?php echo $rows['Answers']."<br>"; ?>
                
            </div>

            
    <?php
            }
        }
    
}

?>

<br><br>

<input type="submit" class="logout-btn" name="submit" value="SUBMIT">

</form>

<br><br><br><br>

    <center><h5>Website Created by David RS</h5></center>

    </div> 
</body>
</html>