<?php include('part/menu.php'); ?>
<html>

<head>
    <title>Update Item</title>
</head>

<body class="content">

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_singal_item WHERE id=$id";

        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $warranty = $row2['warranty'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $active = $row2['active'];
    }
    ?>

    <table class="tbl-32">
        <form action="" method="POST" enctype="multipart/form-data">

            <tr>
                <td>Title: </td>
                <td><input class="textbox" type="text" name="title" value="<?php echo $title; ?>"></td>
            </tr>
            <tr>
                <td>Warranty: </td>
                <td><input class="textbox" type="number" name="warranty" value="<?php echo $warranty; ?>" placeholder="(How Many Months)"></td>
            </tr>

            <tr>
                <td>Discription: </td>
                <td>
                    <textarea name="description" id="" cols="60" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td><input class="textbox" type="number" name="price" value="<?php echo $price; ?>"></td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                    if ($current_image == "") {
                        echo "<div>Image not Available.</div>";
                    } else {
                    ?> <img src="<?php echo SITEURL; ?>images/S_item/<?php echo $current_image; ?>" width="200px"> <?php
                                                                                                                }
                                                                                                                    ?>
                    <!-- <input type="submit" name="delete" value="Delete Image" class="btn-secondary2" > -->
                </td>

            <tr>
                <td>Select New Image:</td>
                <td >
                    <input class="addimg" type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select class="click" name="category" id="">

                        <?php

                        $sql = "SELECT * FROM tbl_category ";

                        //Executing query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have categories or not
                        $count = mysqli_num_rows($res);

                        //IF Count is greater than zero,
                        if ($count > 0) {
                            //we have categories
                            while ($row = mysqli_fetch_assoc($res)) {
                                //get the details of categories
                                $category_id = $row['id'];
                                $category_title = $row['title'];

                        ?>
                                <option <?php if ($current_category == $category_id) {
                                            echo "selected";
                                        } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
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
                    <input <?php if ($active == "yes") {
                                echo "checked";
                            } ?> type="radio" name="active" value="yes">Yes
                    <input <?php if ($active == "no") {
                                echo "checked";
                            } ?> type="radio" name="active" value="no">No
                </td>
            </tr>


            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?> ">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" class="btn-secondary1"><br><br>
                    <a href="item.php" class="btn-secondary2">Cancel</a>
                </td>
            </tr>
        </form>
    </table>
</body>


<?php
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $category = $_POST['category'];
    $active = $_POST['active'];

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));

            $image_name = "$title" . rand(0000, 9999) . "." . $ext;

            $src = $_FILES['image']['tmp_name'];

            $dst = "../images/S_item/" . $image_name;

            $upload = move_uploaded_file($src, $dst);

            if ($upload == false) {
                die();
            }

            if ($current_image != "") {
                $remove_path = "../images/S_item/" . $current_image;

                $remove = unlink($remove_path);

                if ($remove == false) {
                    header('location:' . SITEURL . 'admin/item.php');
                    die();
                }
            }
        }
    } else {
        $image_name = "";
    }

    //2 create SQL Query to insert category into Database
    $sql2 = "UPDATE tbl_singal_item SET
        title='$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = $category,
        active = '$active'
        WHERE id ='$id'
        ";

    //3 execute the query and save in database
    $res = mysqli_query($conn, $sql2);

    //4 check whether the query executed or not and data added or not
    if ($res == true) {
        $_SESSION['add'] = "<div class='sucess'> Item Update Successfully.</div>";
    } else {
        $_SESSION['add'] = "<div class='error'> Faild to Update Item.</div>";
    }
}



?>