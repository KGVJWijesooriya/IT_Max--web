<?php include('part/menu.php'); ?>
<html>

<head>
    <title>Add Item</title>
</head>

<body class="content">


    <div class="paddi">
        <table class="tbl-32">
            <form action="" method="POST" enctype="multipart/form-data">
                <tr>
                    <td>Title: </td>
                    <td><input class="textbox" type="text" name="title" placeholder="Item Title"></td>
                </tr>

                <tr>
                    <td>Warranty: </td>
                    <td><input class="textbox" type="number" name="warranty" placeholder="(How Many Months)"></td>
                </tr>

                <tr>
                    <td>Discription: </td>
                    <td>
                        <textarea name="description" id="" cols="60" rows="20" placeholder="Add Description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td><input class="textbox" type="number" name="price" placeholder="Item Price"></td>
                </tr>

                <tr>
                    <td>Add Image: </td>
                    <td><input class="addimg" type="file" name="image"> </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>

                        <select class="click" name="category" id="">

                            <?php
                            //Create PHP code to display Category from Database
                            //1. Create SQL to get all active categories from database
                            $sql = "SELECT * FROM tbl_category";

                            //Executing query
                            $res = mysqli_query($conn, $sql);

                            //Count Rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //IF Count is greater than zero,
                            if ($count > 0) {
                                //we have categories
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //get the details of categories
                                    $id = $row['id'];
                                    $title = $row['title'];

                            ?>
                                    <option class="links" value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php
                                }
                            } else {
                                //we dont have category
                                ?>
                                <option value="0">No Category Found</option>
                            <?php
                            }
                            ?>
                        </select>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" class="btn-secondary1" value="UPLOAD">
                    </td>

                    <!-- <td><button href="item.php" class="btn-secondary2">CANCLE</button></td> -->
                </tr>
            </form>
        </table>
    </div>
    <div>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
    </div>
</body>


<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $warranty = $_POST['warranty'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];


    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "no";
    }

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 20000000) {
                $fileNameNew = "$title" . rand(0000, 9999) . "." .
                    $fileActualExt;
                $fileDestination = '../Images/S_item/' . $fileNameNew;
                move_uploaded_file(
                    $fileTmpName,
                    $fileDestination
                );



                $sql2 = "INSERT INTO tbl_singal_item SET
                        title='$title',
                        warranty=$warranty,
                        description = '$description',
                        price = $price,
                        image_name='$fileNameNew',
                        category_id = $category,
                        active = '$active'
                        ";


                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {

                    //Query Executed and category added
                    $_SESSION['add'] = "<div class='sucess'> Item Added Successfully.</div>";
                    //Redirect to manage category page
                    // header('http://localhost/main_project_1Y_2S/Web_Site/admin/item.php');
                } else {
                    //faild to add category
                    $_SESSION['add'] = "<div class='error'> Faild to add Item.</div>";
                    //Redirect to manage category page
                    // header('location:'.SITEURL.'admin/item.php');
                }
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You Cannot upload files of this type!";
    }
}
?>