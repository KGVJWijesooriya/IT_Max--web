<?php include('partials-front/menu.php'); ?>

<section id="Topic">
    <h1>CART</h1>
</section>

<br><br><br><br><br>

<section>
    <div class="section-p1">
        <table id="carttbl" border="2px" class="carttbl">

            <thead>
                <td>
                </td>
                <td>
                    <p>PRODUCT</p>
                </td>
                <td>
                    <p>QUANTITY</p>
                </td>
                <td>
                    <p>PRICE</p>
                </td>
                <td>
                    <p>TOTAL</p>
                </td>
                <td>
                    <p>ACTION</p>
                </td>
            </thead>

            <?php
            $sql = "SELECT * FROM tbl_cart";
            $res2 = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res2);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $product_id = $row['product_id'];
                    $image_name = $row['image_name'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $qty = $row['qty'];

            ?>

                    <tr>
                        <form action="" method="POST">
                            <th>
                                <img src="images/S_item/<?php echo $image_name ?>" alt="">
                            </th>
                            <td>
                                <p><?php echo $title ?></p>
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="hidden" name="title" value="<?php echo $title ?>">
                            </td>
                            <td>

                                <p><input type="number" value="<?php echo $qty ?>" class="iqty" name="Mod_Quantity" onchange="subTotal()" min="1" max="10" size="1"></p>

                            </td>
                            <td>
                                <p><input name="price" type="hidden" value="<?php echo $price ?>" class="iprice"><?php echo $price ?></p>
                            </td>
                            <td>
                                <p class="itotal"></p>
                            </td>
                            <td>
                                <a href="deletecartit.php?id=<?php echo $id ?>">
                                    <h5> <span class="material-symbols-outlined">delete
                                        </span></h5>
                                </a>
                            </td>
                    </tr>

                    <td></td>

            <?php
                }
            }
            ?>
            <tfoot topborder="1px">
                <td></td>
                <td></td>
                <td>
                    <p>TOTAL: </p>
                </td>
                <td colspan="2">
                    <h3 id="gtotal"></h3>
                </td>
                <td>
                </td>
                <td></td>
            </tfoot>

            <script>
                var gt = 0;
                var iprice = document.getElementsByClassName('iprice');
                var iqty = document.getElementsByClassName('iqty');
                var itotal = document.getElementsByClassName('itotal');
                var gtotal = document.getElementById('gtotal');


                function subTotal() {
                    gt = 0;
                    for (i = 0; i < iprice.length; i++) {
                        itotal[i].innerText = (iprice[i].value) * (iqty[i].value);
                        gt = gt + (iprice[i].value) * (iqty[i].value);
                    }
                    gtotal.innerText = gt;
                }

                subTotal();
            </script>
        </table>
    </div>
</section>

<section>
    <div class="qform">
        <div>
            <table>
                <tr>
                    <td>
                        <p>Full Name</p>
                    </td>
                    <td><input type="text" name="cfname" class="texta" maxlength="25" size="25" required></td>
                </tr>

                <tr>
                    <td>
                        <p>Telephone No &nbsp;&nbsp;&nbsp;</p>
                    </td>
                    <td><input type="number" name="cnumber" class="texta" required></td>
                </tr>

                <tr>
                    <td>
                        <p>Email</p>
                    </td>
                    <td><input type="email" name="cemail" class="texta" required></td>
                    <input type="hidden" name="s_email" value="No">
                </tr>
            </table>
        </div>
        <div class="qform">
            <button type="submit" name="submit" class="qbtn"> Get Quatation</button>
        </div>
    </div>
    </form>
    <div>
        b
    </div>
</section>



<?php

if (isset($_POST['submit'])) {


    $cname = $_POST['cfname'];
    $cnumber = $_POST['cnumber'];
    $cemail = $_POST['cemail'];

    $sql = "SELECT * FROM tbl_cart";

    $res2 = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res2);

    $o_id =  rand(10, 100);
    $s_email = $_POST['s_email'];

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res2)) {
            $i_id = $row['id'];
            $title = $row['title'];;
            $price = $row['price'];
            $qty = $_POST['Mod_Quantity'];

            $sql2 = "INSERT INTO tbl_order SET 
            o_id = '$o_id',
            i_id = $i_id,
            title = '$title',
            price = $price,
            qty = $qty
            ";

            // echo $sql2;
            mysqli_query($conn, $sql2);
        }

        $sql3 = "INSERT INTO tbl_customer SET 
            o_id = $o_id,
            cname = '$cname',
            cnumber = $cnumber,
            cemail = '$cemail',
            s_email = '$s_email'
            ";

        // echo $sql3;
        mysqli_query($conn, $sql3);
    }
}
?>