<title>Update Admin</title>
<body class="content">
    <?php include('part/menu.php'); ?>

    <div class="content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <br /><br /><br />

            <?php
            //1. Get the ID of selected Admin
            $id = $_GET['id'];

            //2. Create sql query to get the Details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //check whether the query is executed or not
            if ($res == true) {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if ($count == 1) {
                    //Get the Details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $password = $row['password'];
                } else {
                    //Redirect ti Manage admin Page
                    header('admin/manage-admin.php');
                }
            }

            ?>
            <br /><br /><br />

            <from action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input class="textbox" type="text" name="full_name" value="<?php echo $full_name ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td>
                            <input class="textbox" type="text" name="username" value="<?php echo $username ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input class="textbox" type="password" name="password" value="<?php echo $password ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-primary">

                        </td>
                    </tr>

                </table>

        </div>

    </div>

    <?php

    //Check whether the submit button is clicked
    if (isset($_POST['submit'])) {
        //echo "Button Clicked";
        //get all the values to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //creat a sql query to update admin
        $sql = "UPDATE tbl_admin SET
         full_name = '$full_name',
         username = '$username',
         password ='$password'
         WHERE id='$id'
         ";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the query executed successfully or not
        if ($res == true) {
            // query executed and admin updated
            $_SESSION['update'] = "<div class='success'> Admin Updated Successfuly. </div> ";
            //Redirect to Manage admin Page
            header('location:manage-admin.php');
        } else {
            //faild to update
            $_SESSION['update'] = "<div class='error'> Faild to delete Admin </div>";
            //redirect to manage admin page
            header('location:manage-admin.php');
        }
    }

    ?>