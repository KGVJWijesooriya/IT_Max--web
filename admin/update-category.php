<title>Update Category</title>
<body class="content">
<?php include('part/menu.php'); ?>

<div class="content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br /><br /><br />
        
        <?php
            //1. Get the ID of selected Admin
            $id=$_GET['id'];

            //2. Create sql query to get the Details
            $sql="SELECT * FROM tbl_category WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn,$sql);

            //check whether the query is executed or not
            if($res==true)
            {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $title = $row['title'];
                }
                else
                {
                    //Redirect ti Manage admin Page
                    header('admin/manage-admin.php');
                }
            
            }
        
            
        ?>

        
<br /><br /><br />

        <from action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input class="textbox" type="text" name="title" value="<?php echo $title ?>">
                </td>
            </tr>

            <tr>
            <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-primary" >

                </td>
            </tr>
        </table>
    </div>
</div>

<?php

if(isset($_POST['delete']))
    {
      $path = "../Images/product_category/$image";
      if (!unlink($path)) 
      {
       echo "You Have Error !";
      }
       else {
                    
       }
    }
?>

<?php

    //Check whether the submit button is clicked
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

        $allowed = array('png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0){
                if ($fileSize < 20000000) {
                    $fileNameNew = uniqid('', true).".".
                    $fileActualExt;
                    $fileDestination = '../Images/product_category/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, 
                    $fileDestination);
                    //header("Location: add-category.php?uploadsuccess");
                    
                    //2 create SQL Query to insert category into Database
                        $sql = "UPDATE tbl_category SET
                        title='$title',
                        image='$fileNameNew'
                        WHERE id='$id'
                        ";

                                    //execute the query
                                    $res = mysqli_query($conn, $sql);

                                    //check whether the query executed successfully or not
                                    if($res==true)
                                    {
                                        // query executed and admin updated
                                        $_SESSION['update'] = "<div class='success'> Admin Updated Successfuly. </div> ";
                                        //Redirect to Manage admin Page
                                        header('location:category.php');
                                    }
                                    else
                                    {
                                        //faild to update
                                        $_SESSION['update'] = "<div class='error'> Faild to delete Admin </div>";
                                        //redirect to manage admin page
                                        header('location:manage-admin.php');

                                    }
    
                    }
                }
            }
    }

?>