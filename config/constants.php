<?php
    

    //start session
    session_start();

    //create constants to store Non Repeating Values
    define('SITEURL', 'http://localhost/main_project_1Y_2S/Web_Site/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'it-max');


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database

?>