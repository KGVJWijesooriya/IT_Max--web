<body class="loginbg">
<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
         
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/a-style.css"> 

</head>


        <div class="login">
                    <img src="../Images/Logo/logo.png" alt="">
                    <br><br>
                    <h1> LOGIN </h1>
                    <br/>

                    <?php
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }

                        if(isset($_SESSION['no-login-message']))
                        {
                            echo $_SESSION['no-login-message'];
                            unset($_SESSION['no-login-message']);
                        }
                    ?>
                    <br/><br/>

                    <!-- Login Form Starts Here -->
                    <form action="" method="POST" class="text-center text-color">
                        Username:<br/>
                        <input type="text" name="username" placeholder="Enter Username" class="logintxt" required><br/><br/>
                        Password:<br/>
                        <input type="password" name="password" placeholder="Enter Password" class="logintxt" required><br/><br/><br>

                        <input type="submit" name="submit" value="Login" class="loginbtn">
                        
                    </form>
                    <br><br>

                    <!-- Login Form Ends Here -->
                    
                    </div>
                </div>
        </div>
    
</body>


<?php

    //Check whether the Submit Button is Clicked or NOT
    if(isset($_POST['submit']))
    {
        //process for login
        //get the data from login from
        echo $username = $_POST['username'];
        echo $password = $_POST['password'];

    //check user name and password available
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        // count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user Available 
            $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/a-index.php');
        }
        else
        {
            //user not available
            $_SESSION['login'] = "<div class='error text-center'>User name or Password did not Match.</div>";
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }


?>