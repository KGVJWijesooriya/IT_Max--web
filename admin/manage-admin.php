<title>Manage Admin</title>

<body class="content">
    <?php include('part/menu.php'); ?>


    <div class="content">
        <div class="wrapper">
            <div class="head">
                <h1>Manage Admin</h1>
            </div>
            <!-- content start-->


            <br /><br />


            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>

            <br /><br />


            <!-- Add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>

                <?php

                //Query to get all Admin
                $sql = "SELECT * FROM tbl_admin";
                //execute the query
                $res = mysqli_query($conn, $sql);

                //Check whether the query is executed of not
                if ($res == TRUE) {
                    // count rows
                    $count = mysqli_num_rows($res);


                    //check the num of rows
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            foreach ($row as $key => $val) {
                                //generate output
                                //echo $key . ": " . $val . "<BR />";
                            }

                            //display the value
                ?>

                            <tr>
                                <td class="text-center"><?php echo $row['id']; ?></td>
                                <td class="text-center"><?php echo $row['full_name']; ?></td>
                                <td class="text-center"><?php echo $row['username']; ?></td>
                                <td class="text-center">
                                    <button class="btn-secondary1"> <a href="./update-admin.php?id=<?php echo $row["id"]; ?>" class="btn-secondary1"> UPDATE </a></button>
                                    <button class="btn-secondary2"><a href="./delete-admin.php?id=<?php echo $row["id"]; ?>" class="btn-secondary2"> DELETE </a></button>
                                </td>
                            </tr>
                <?php
                        }
                    }
                } else {
                }
                ?>
            </table>

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- content start-->

    <!-- Footer start-->
    <div class="footer">
        <div class="wrapper">
            footer
        </div>
    </div>
    <!-- Footer start-->
</body>

</html>