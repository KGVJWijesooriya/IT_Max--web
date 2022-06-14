<?php include('part/menu.php'); ?>

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

<?php

    if (isset($_POST["submit"]))
    {
        $title = $_POST["title"];

        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

        $uploads_dri = '/images';

        move_uploaded_file($tname, $uploads_dri.'/'.$pname);

        $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";

        if(mysqli_query($conn,$sql)){

            echo "File Sucessfully upload";
        }
        else{
            echo "Error";
        }
    }
?>