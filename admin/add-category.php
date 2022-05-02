<?php include('part/menu.php');?>


<body class="content">
    

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br/><br/>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <br/><br/>
         
        <!-- Add Category from starts -->
        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Category Title">
                </td>
            </tr>

            <tr>
                <td>Add Image: </td>
                <td>
                    <input type="file" name="image" >
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-primary">
                </td>
            </tr>

        </table>
        </form>
        <!-- Add Category from ends -->

        <?php

            //Check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                // echo "Clicked";

                //1 get the value from category form
                $title = $_POST['title'];

                //Check whether the image is selected or not and set the value for image name accoridingly
                print_r($_FILES["image"]);


                die();// Break the code here
                if(isset($_FILES['image']['name']))
                {
                    //uplod the image
                    //to upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/product_category/$image_name";

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //SET message
                        $_SESSION['upload'] = "<div class='error'>Faild to upload image.</div>";
                        //Redirect to add Category page
                        header('location:'.SITEURL.'admin/add-category.php');
                    }
                }
                else
                {
                    //Don't uplod Image and set the iamge_name value as blank
                    $image_name="";
                }


                //2 create SQL Query to insert category into Database
                $sql = "INSERT INTO tbl_category SET
                    title='$title'
                    ";
                
                //3 execute the query and save in database
                $res = mysqli_query($conn, $sql);

                //4 check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and category added
                    $_SESSION['add'] = "<div class='sucess'> Category Added Successfully.</div>";
                    //Redirect to manage category page
                    header('location:'.SITEURL.'admin/category.php');
                }
                else
                {
                    //faild to add category
                    $_SESSION['add'] = "<div class='error'> Faild to add Category.</div>";
                    //Redirect to manage category page
                    header('location:'.SITEURL.'admin/category.php');
                }
            }
        
        ?>


    </div>
</div>
</body>