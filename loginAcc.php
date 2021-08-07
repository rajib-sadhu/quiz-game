<?php

    session_start();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game Log In</title>
    <?php  include 'links/link.php'; ?>
</head>
<body>


<?php

    include 'dbcon.php';

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $emailSearch = "select * from registration where email='$email'";
        $query = mysqli_query($con, $emailSearch);

        $emailCount = mysqli_num_rows($query);

        if($emailCount)
        {
            $email_pass= mysqli_fetch_assoc($query);

            $dbpass= $email_pass['Password'];

            $_SESSION['username']= $email_pass['Name'];



            if ($dbpass) 
            {
                ?>
                <script>
                        alert("Login Successful");
                        location.replace("home.php");
                </script>
                <?php
                
                
            }
            else
            {
                ?>
                <script>
                        alert("Password Incorrect");
                </script>
                <?php
            }
        }
        else
        {
            ?>
                <script>
                        alert("Invalid Email");
                </script>
                <?php
        }
    }

?>






<center style="color:red;"><h1><u>Welcome To RS World</u></h1></center>

<div class="sign-up-form">

    <h1>Sign Up</h1>
    <p>Let's Start</p>
  
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" name="forms" onsubmit="return myFunction()">


         <input type="text" class="input-box" placeholder="Enter Your Email Address" name="email" required id="emailId">
         <br><span id="eMessage" style="color: red;"></span>



         <input type="password" class="input-box"  name="password" placeholder="Enter Your Password" required id="password">
         <br><span id="pMessage1" style="color: red;"></span>

         

         <button name="submit" type="submit" class="signup-btn">Sign Up</button>
         <hr>
       <!--   <p class="or">OR</p>
        <button type="button" class="google-btn">Log In with Google <span> <img src="files/google-icon.png" alt=""></span> </button> 
         <button type="button" class="facebook-btn">Log In with Facebook <span> <img src="files/facebook-icon.png" alt=""></span> </button> -->
         <p>Don't have an account? <a href="registration.php">Sign Up Here</a></p> 
    </form>
    

</div>
    
</body>
</html>