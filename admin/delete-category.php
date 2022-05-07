<?php

    //Include constant.php
    include('../config/constants.php');

    //get ID of admin
    $id = $_GET['id'];

    //creat sql query to delete admin

    $sql = "DELETE FROM tbl_category WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if($res==true)
    {
        //echo "Admin Deleted";
        //creat a session variable to display message
        $_SESSION['delete'] = "Category Deleted Successfully";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/category.php');

    }
    else
    {
        //echo "Faild to Delete Admin";
        $_SESSION['delete'] = "Faild to Deleted Category. Try Again Later.";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/category.php');
    }

    //redirect to manage admin page with message




?>