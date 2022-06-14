<body class="content">
    <?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <div class="head">
                <h1>Manage Quotation</h1>
            </div>


            <table class="tbl-full">
                <tr>
                    <th>Full Name</th>
                    <th>Oder Number</th>
                    <th>Action</th>
                </tr>

                <?php

                $sql = "SELECT * FROM tbl_customer ORDER BY c_id DESC";

                $res = mysqli_query($conn, $sql);


                if ($res == TRUE) {

                    $count = mysqli_num_rows($res);


                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            foreach ($row as $key => $val) {
                            }

                ?>

                            <tr>

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
            </table>



            <div class="clearfix"></div>

        </div>
    </div>


    <!-- content start-->

    <!-- Footer start-->
    <div class="footer">
        <div class="col-8 text-center col-3">
            <?php
            //Create PHP code to display Category from Database
            //1. Create SQL to get all active categories from database
            $sql3 = "SELECT * FROM tbl_customer";

            //Executing query
            $res = mysqli_query($conn, $sql3);

            //Count Rows to check whether we have categories or not
            $count3 = mysqli_num_rows($res);

            ?>
            <h1><?php echo $count3 ?></h1>
            <br />
            Total Quotation

        </div>

        <div class="col-9 text-center col-3">
            <?php
            //Create PHP code to display Category from Database
            //1. Create SQL to get all active categories from database
            $sql3 = "SELECT * FROM tbl_customer WHERE s_email='no'";

            //Executing query
            $res = mysqli_query($conn, $sql3);

            //Count Rows to check whether we have categories or not
            $count3 = mysqli_num_rows($res);

            ?>
            <h1><?php echo $count3 ?></h1>
            <br />
            Pending Quotation

        </div>
        
        <div class="col-10 text-center col-3">
            <?php
            //Create PHP code to display Category from Database
            //1. Create SQL to get all active categories from database
            $sql3 = "SELECT * FROM tbl_customer WHERE s_email='yes'";

            //Executing query
            $res = mysqli_query($conn, $sql3);

            //Count Rows to check whether we have categories or not
            $count3 = mysqli_num_rows($res);

            ?>
            <h1><?php echo $count3 ?></h1>
            <br />
            Email Send Quotation

        </div>
    </div>
    <!-- Footer start-->
</body>