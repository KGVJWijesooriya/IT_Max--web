<html>
<head>
    <title>Add Category</title>
</head>

<body class="content">
    
<?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

    <table class="tbl-30">
    <form action="" method="POST" enctype="multipart/form-data">
        <tr><td>Title: </td>
        <td><input type="text" name="title" placeholder="Category Title"></td></tr>
        <tr><td>Add Image: </td>
        <td><input type="file" name="file"> </td></tr>
        <tr><td><button type="submit" name="submit">Upload</button> </td></tr>
    </form>
    </table>
</body>

<?php

    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('png,jpg');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0){
                if ($fileSize < 200000) {
                    $fileNameNew = uniqid('', true).".".
                    $fileActualExt;
                    $fileDestination = '../Images/product_category/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, 
                    $fileDestination);
                    header("Location: add-category.php?uploadsuccess");
                    
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } 
        else {
            echo "You Cannot upload files of this type!";
        }


        



?>


//2 create SQL Query to insert category into Database
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image='$fileTmpName'
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
    