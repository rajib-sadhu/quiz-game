<?php

    session_start();
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Register Form</title>
    <?php include 'links/link.php' ?>

</head>
<body>

<?php

    include 'dbcon.php';


    if(isset($_POST['submit']))
{
        $username = mysqli_real_escape_string($con, $_POST['user']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $Cpassword = mysqli_real_escape_string($con, $_POST['Cpassword']);

       
    

                $emailquery = "select * from registration where Email = '$email'";
                $query = mysqli_query($con, $emailquery);

                $emailcount = mysqli_num_rows($query);
    
    if($emailcount>0)
    {
        ?>
        <script>
                 alert("Email Already Exists");
        </script>
        <?php
    }
    else
    {
        if($password === $Cpassword)
        {


            $insertquery = "INSERT INTO registration( `Name`, `Email`, `Mobile`, `Password`, `Cpassword`) VALUES ('$username','$email','$mobile','$password','$Cpassword')";

            $iquery = mysqli_query($con, $insertquery);

            if($iquery)
            {
                ?>

                <script>
                    alert("Ok Connection");
                </script>
                
                <?php
                header('location:succregist.html');
            }
            else
            {
                ?>

                <script>
                    alert("No Connection");
                </script>

                <?php
            }

        }
        else
        {
            ?>

                <script>
                    alert("Passwords are not matching.");
                </script>

                <?php
        }
    }
}

?>


<center style="color:red;"><h1><u>Welcome To RS World</u></h1></center>

    <div class="sign-up-form">

        <h1>Create Account</h1>
        <p>Get started with your free account</p>
     
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" name="forms" onsubmit="return myFunction()">

             <input type="text" class="input-box" placeholder="Enter Your Full Name" name="user" required id="userId">
             <br><span id="uMessage"  style="color: red;"></span>

             <input type="text" class="input-box" placeholder="Enter Your Email Address" name="email" required id="emailId">
             <br><span id="eMessage" style="color: red;"></span>

             <input type="text" class="input-box"  name="mobile" placeholder="Enter Your Mobile Number" required id="numId">
             <br><span id="numMessage" style="color: red;"></span>



             <input type="password" class="input-box"  name="password" placeholder="Enter Your Password" required id="password">
             <br><span id="pMessage1" style="color: red;"></span>

             <input type="password" class="input-box" name="Cpassword" placeholder="Confirm Your Password" required >
             <br><span id="pMessage2" style="color: red;"></span>
             
             


             <button name="submit" type="submit" class="signup-btn">Create Account</button>
             <hr>
          <!--   <p class="or">OR</p>
             <button type="button" class="google-btn">Log In with Google <span> <img src="files/google-icon.png" alt=""></span> </button> 
             <button type="button" class="facebook-btn">Log In with Facebook <span> <img src="files/facebook-icon.png" alt=""></span> </button>  -->
             <p>Do you have an account? <a href="loginAcc.php">Sign In</a></p>
        </form>
        

    </div>


    <script type="text/javascript" src="script/form_script.js"></script>



    </script>


    
</body>
</html>