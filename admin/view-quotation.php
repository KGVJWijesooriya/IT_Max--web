<title>View Quotation</title>

<body class="content">
    <?php include('part/menu.php'); ?>

    <div class="content">
        <div class="wrapper">
            <div class="head">
                <h1>View Quotation</h1>
            </div>
            <?php
            if (isset($_GET['id'])) {

                $c_id = $_GET['id'];

                $sql = "SELECT * FROM tbl_customer WHERE c_id='$c_id'";

                // echo $sql;
                $res = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($res);

                $c_id = $row['c_id'];
                $cname = $row['cname'];
                $cnumber = $row['cnumber'];
                $cemail = $row['cemail'];
                $s_email = $row['s_email'];
            }
            ?>
            <div class="quotation">
                <form action="" method="post">
                    <div>
                        <h3>Customer Details</h3>
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <P><?php echo $cname; ?></P>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>
                                    <P><?php echo $cnumber; ?></P>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <P><?php echo $cemail; ?></P>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo $s_email ?> Email Sent</td>
                            </tr>

                            <input type="hidden" name="c_id" value="<?php echo $c_id; ?> ">
                            <input type="hidden" name="s_email" value="YES">

                        </table>
                    </div>
                    <br><br>
                    <div>
                        <h3>Oder Details</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Title</th>
                                    <th>Quontitiy</th>
                                    <th>Product Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <?php
                            if (isset($_GET['id'])) {

                                $o_id = $_GET['id'];

                                $sql1 = "SELECT * FROM tbl_order WHERE o_id='$o_id'";

                                // echo $sql;
                                $res1 = mysqli_query($conn, $sql1);

                                $count = mysqli_num_rows($res1);

                                if ($count > 0) {

                                    while ($row1 = mysqli_fetch_assoc($res1)) {

                                        $o_id = $row1['o_id'];
                                        $i_id = $row1['i_id'];
                                        $title = $row1['title'];
                                        $qty = $row1['qty'];
                                        $price = $row1['price'];

                            ?>
                                        <tbody>
                                            <tr>
                                                <td class="cen">
                                                    <P><?php echo $i_id; ?></P>
                                                </td>
                                                <td>
                                                    <P><?php echo $title; ?></P>
                                                </td>
                                                <td class="cen">
                                                    <P><?php echo $qty; ?></P>
                                                    <input type="hidden" value="<?php echo $qty ?>" class="iqty" name="Mod_Quantity" onchange="subTotal()">
                                                </td>
                                                <td class="cen">
                                                    <P class="iprice"><?php echo $price; ?></P>
                                                    <input name="price" type="hidden" value="<?php echo $price ?>" class="iprice">
                                                </td>
                                                <td>
                                                    <p class="itotal"><?php echo $price * $qty ?></p>
                                                </td>
                                            </tr>
                                        </tbody>

                            <?php
                                    }
                                }
                            }
                            ?>
                        </table>
                    </div>
            </div>
        </div>
        <br><br><br>
        <div class="qsubmit">
            <button name="submit">
                <h3> Send Email </h3>
            </button>
        </div>
    </div>
    </form>
    <div>
        <?php include('part/quotationinfo.php') ?>
    </div>
    <?php
    if (isset($_POST['submit'])) {

        $c_id = $_POST['c_id'];
        $s_email = $_POST['s_email'];

        $sql2 = "UPDATE tbl_customer SET
        s_email = '$s_email'
        WHERE c_id ='$c_id'
        ";

        $res = mysqli_query($conn, $sql2);

        if ($res == true) {
            echo "<script>
            alert('Email Sent Successfully');
            window.location.href='./quotation.php';
        </script>";
        } else {
            echo "<script>
            alert('Email Not Sent');
        </script>";
        }
    }
    ?>