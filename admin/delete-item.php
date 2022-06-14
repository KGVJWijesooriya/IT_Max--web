<?php

    //Include constant.php
    include('../config/constants.php');

    //get ID of admin
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name!="")
                {
                    $remove_path = "../images/S_item/".$image_name;

                    $remove = unlink($remove_path);

                    if($remove==false)
                    {
                        header('location:'.SITEURL.'admin/item.php');
                        die();
                    }
                }
    //creat sql query to delete admin

    $sql = "DELETE FROM tbl_singal_item WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if($res==true)
    {
        //echo "Admin Deleted";
        //creat a session variable to display message
        $_SESSION['delete'] = "Item Deleted Successfully";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/item.php');

    }
    else
    {
        //echo "Faild to Delete Admin";
        $_SESSION['delete'] = "Faild to Deleted Item. Try Again Later.";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/item.php');
    }

    //redirect to manage admin page with message




?>