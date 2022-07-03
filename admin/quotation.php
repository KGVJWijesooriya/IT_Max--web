<title>Manage Quotation</title>
<body class="content">
    <?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <div class="head">
                <h1>Manage Quotation</h1>
            </div>
            <br><br>
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


    <div>
        <?php include('part/quotationinfo.php') ?>
    </div>
    <!-- Footer start-->
</body>