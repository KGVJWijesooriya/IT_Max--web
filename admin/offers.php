<title>Manage Offers</title>
<body class="content">
    <?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <div class="head">
                <h1>Manage Offers</h1>
            </div>
            <?php
            $sql3 = "SELECT * FROM tbl_offer WHERE active='yes'";

            $res3 = mysqli_query($conn, $sql3);

            $row3 = mysqli_fetch_assoc($res3);


            $id = $row3['id'];
            $product_id = $row3['product_id'];
            $active = $row3['active'];
            $line_1 = $row3['line_1'];
            $line_2 = $row3['line_2'];
            $line_3 = $row3['line_3'];
            $line_4 = $row3['line_4'];

            ?>
            <?php

            $id = $row3['product_id'];

            $sql4 = "SELECT * FROM tbl_singal_item WHERE id=$id AND active='yes'";

            $res4 = mysqli_query($conn, $sql4);

            $row4 = mysqli_fetch_assoc($res4);

            $image_name = $row4['image_name'];


            ?>
            <div>
                <h1>Main Banner</h1>
                <div class="banner-container">
                    <div class="banner">
                        <div class="mouse">
                            <img src="../images/S_item/<?php echo $image_name ?>">
                        </div>
                        <div class="contente">
                            <h2><?php echo $line_1; ?></h2>
                            <span><?php echo $line_2; ?></span>
                            <h3><?php echo $line_3; ?></h3>
                            <p><?php echo $line_4; ?></p>
                        </div>
                    </div>
                    <h1>EDIT BANER</h1>
                    <br><br>

                    <h3> Item ID</h3>
                    <form action="" method="post">
                        <div>
                            <input class="textbox" type="number" name="pid" value="<?php echo $product_id; ?>">
                            <input type="submit" name="submit" class="btn-secondary1" value="UPLOAD">
                            <input type="hidden" name="b_id" value="1">
                            <div><br><br>
                                <p>Show Offer</p><br>
                                <input <?php if ($active == "yes") {
                                            echo "checked";
                                        } ?> type="radio" name="active" value="yes">Yes
                                <input <?php if ($active == "no") {
                                            echo "checked";
                                        } ?> type="radio" name="active" value="no">No
                            </div>
                        </div>
                        <br>

                        <div>
                            <input class="textbox" type="text" name="line_1" value="<?php echo $line_1; ?>">
                            <input class="textbox" type="text" name="line_2" value="<?php echo $line_2; ?>">
                        </div>
                        <br>
                        <div>
                            <input class="textbox" type="text" name="line_3" value="<?php echo $line_3; ?>">
                            <input class="textbox" type="text" name="line_4" value="<?php echo $line_4; ?>">
                        </div>
                    </form>
                </div>
            </div>



            <?php

            if (isset($_POST['submit'])) {
                $b_id = $_POST['b_id'];
                $pid = $_POST['pid'];
                $line_1 = $_POST['line_1'];
                $line_2 = $_POST['line_2'];
                $line_3 = $_POST['line_3'];
                $line_4 = $_POST['line_4'];


                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "no";
                }

                $sql2 = "UPDATE tbl_offer SET
                        product_id=$pid,
                        active = '$active',
                        line_1='$line_1',
                        line_2 = '$line_2',
                        line_3 = '$line_3',
                        line_4='$line_4'
                        WHERE id ='$b_id'
                        ";
                // echo $sql2;

                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['add'] = "<div class='sucess'> Item Added Successfully.</div>";
                } else {
                    $_SESSION['add'] = "<div class='error'> Faild to add Item.</div>";
                }
            }
            ?>