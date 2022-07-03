<?php include('part/menu.php'); ?>
<html>

<head>
    <title>Add Category</title>
</head>

<body class="content">

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
    <div>
        <div>
            <h1>Add Category</h1>
        </div>

        <div>
            <br><br><br>
            <table class="tbl-31">
                <form action="" method="POST" enctype="multipart/form-data">
                    <tr>
                        <td>Title:
                            <input class="textbox" type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><button class="btn-primary" type="submit" name="submit">UPLOAD</button> </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</body>

<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    $sql = "INSERT INTO tbl_category SET
                        title='$title',
                        image='$fileNameNew'
                        ";

    //3 execute the query and save in database
    $res = mysqli_query($conn, $sql);

    //4 check whether the query executed or not and data added or not
    if ($res == true) {
        //Query Executed and category added
        $_SESSION['add'] = "<div class='sucess'> Category Added Successfully.</div>";
        //Redirect to manage category page
        header('location:' . SITEURL . 'admin/category.php');
    } else {
        //faild to add category
        $_SESSION['add'] = "<div class='error'> Faild to add Category.</div>";
        //Redirect to manage category page
        header('location:' . SITEURL . 'admin/category.php');
    }
}


?>