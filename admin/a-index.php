<?php include('part/menu.php'); ?>
<title>IT Max Admin Panel</title>

<body class="content">

    <!-- content start-->
    <main>
        <div class="content">
            <div class="wrapper">
                <div class="head">
                    <h1>DASHBOARD</h1>
                </div>

                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
                <br /><br />


                <div class="dash">
                    <div class="col-4 text-center col-3">
                        <div class="iboxa">
                            <div>
                                <span class="material-symbols-outlined">
                                    admin_panel_settings
                                </span>
                            </div>
                            <div>
                                <?php
                                $sql = "SELECT * FROM tbl_admin";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                ?>
                                <h1><?php echo $count ?></h1>
                                <p>Admins</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-5 text-center col-3">
                        <div class="iboxa">
                            <div>
                                <span class="material-symbols-outlined">
                                    category
                                </span>
                            </div>
                            <div>
                                <?php
                                $sql1 = "SELECT * FROM tbl_category";

                                $res = mysqli_query($conn, $sql1);

                                $count1 = mysqli_num_rows($res);

                                ?>
                                <h1><?php echo $count1 ?></h1>
                                <p> Categories </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-6 text-center col-3">
                        <div class="iboxa">
                            <div>
                                <span class="material-symbols-outlined">
                                    sell
                                </span>
                            </div>
                            <div>
                                <?php
                                $sql2 = "SELECT * FROM tbl_singal_item";

                                $res = mysqli_query($conn, $sql2);

                                $count2 = mysqli_num_rows($res);

                                ?>
                                <h1><?php echo $count2 ?></h1>
                                <p>Items</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-7 text-center col-3">
                        <div class="iboxa">
                            <div>
                                <span class="material-symbols-outlined">
                                    description
                                </span>
                            </div>
                            <div>
                                <?php
                                $sql3 = "SELECT * FROM tbl_customer WHERE s_email='no'";

                                $res = mysqli_query($conn, $sql3);

                                $count3 = mysqli_num_rows($res);

                                ?>
                                <h1><?php echo $count3 ?></h1>
                                <p>Quotation</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>



            <div class="divbox">
                <h1>PENDING ODERS</h1>
                <table class="tbl-full">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Oder Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM tbl_customer WHERE s_email='no'";

                        $res = mysqli_query($conn, $sql);

                        if ($res == TRUE) {

                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    foreach ($row as $key => $val) {
                                    }
                        ?>
                                    <tr class="indeview">

                                        <td class="text-center"><?php echo $row['cname']; ?></td>
                                        <td class="text-center"><?php echo $row['c_id']; ?></td>
                                        <td class="text-center">
                                            <button class="btn-secondary1"> <a href="./view-quotation.php?id=<?php echo $row["c_id"]; ?>" class="btn-secondary1"> VIEW </a></button>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br><br><br>
            <div class="divbox">
                <h1>LAST ADDED ITEM</h1>
                <table class="tbl-full tdsize">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM tbl_singal_item ORDER BY id DESC LIMIT 3";
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
                                <tbody>
                                    <tr>
                                        <td width="5%" class="text-center"><?php echo $row['id']; ?></td>
                                        <td width="20%" class="text-center"><?php echo $row['title']; ?></td>
                                        <td width="10%" class="text-center"><?php echo $row['price']; ?></td>
                                    </tr>
                                </tbody>
                    <?php
                            }
                        }
                    } else {
                    }

                    ?>

                </table>
            </div>
            <br><br><br>
            <div class="divbox">
                <h1>LAST COMMENTS</h1>
                <table class="tbl-full tdsize">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>SUBJECT</th>
                            <th>NUMBER</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM tbl_contact ORDER BY id DESC LIMIT 3";
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
                                <tbody>
                                    <tr>
                                        <td width="5%" class="text-center"><?php echo $row['name']; ?></td>
                                        <td width="20%" class="text-center"><?php echo $row['subject']; ?></td>
                                        <td width="10%" class="text-center"><?php echo $row['number']; ?></td>
                                    </tr>
                                </tbody>
                    <?php
                            }
                        }
                    } else {
                    }

                    ?>

                </table>
            </div>
    </main>
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
<?php

?>