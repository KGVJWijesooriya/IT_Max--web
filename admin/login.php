<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
         
    <title>Login</title>
    <link rel="stylesheet" href="a-style.css"> 

</head>
<body class="content">

        <div class="login">
            <h1> LOGIN </h1>
            <br/><br/>

            <!-- Login Form Starts Here -->
            <form action="" method="POST" class="text-center text-color">
                Username:<br/>
                <input type="text" name="username" placeholder="Enter Username"><br/><br/>
                Password:<br/>
                <input type="password" name="password" placeholder="Enter Password"><br/><br/><br/><br/>

                <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>

            <!-- Login Form Ends Here -->
            
            <p>udbfjoguiofjldbnjfhuoaglfknhuofklnklnshifhknvk;ajpfh</p>


        </div>
    
</body>


<?php

    //Check whether the Submit Button is Clicked or NOT
    if(isset($_post['submit']))
    {
        //process for login
        //get the data from login from
        echo $username = $_POST['username'];
        echo $password = $_POST['password'];

        
    }

?>

//check user name and password available
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);