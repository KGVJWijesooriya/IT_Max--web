<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Max</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
    <nav id="Mnav">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <span class="material-symbols-outlined">
                menu
            </span>
        </label>
        <a href="index.php"><img src="./Images/Logo/logo.png" class="logo" width="100px"></a>
        <ul>
            <li><?php include('partials-front/searchbox.php') ?></li>
            <li><a href="index.php">HOME</a></li>
            <li><a href="shop.php">SHOP</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="cart2.php"><span class="material-symbols-outlined">
                        shopping_cart
                    </span></a></li>
        </ul>
    </nav>

    <section id="Topic">
        <h1>CART</h1>
    </section>

    <br>

    <section>
        <?php

        $id = $_GET['id'];
        ?>
        <div class="section-p1">
            <table id="carttbl" border="2px" class="carttbl">

                <thead>
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
                <tbody>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            // print_r($value);
                            $total = $total + $value['price'];
                            echo "
                        <tr>
                            <td>
                                <p>$value[title]</p>
                            </td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                                <p><input class='iqty' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10' size='1'></p>
                                <input type='hidden' name='title' value='$value[title]'>
                                </form>
                            </td>
                            <td>
                                <p>$value[price]<input name='price' type='hidden' value='$value[price]' class='iprice'></p>
                                <input type='hidden' name='title' value='$value[title]'>
                            </td>
                            <td>
                                <p class='itotal'></p>
                            </td>
                            <td>
                                <form action='manage_cart.php' method='POST'>
                                <button name='Remove_item'>
                                    <h5> <span class='material-symbols-outlined'>delete
                                        </span></h5>
                                    <input type='hidden' name='title' value='$value[title]'>
                                </button>
                                </form>
                            </td>
                        </tr>
                        ";
                        }
                    }
                    ?>
                </tbody>
                <tfoot topborder='1px'>

                    <td></td>
                    <td>
                        <p>TOTAL: </p>
                    </td>
                    <td colspan='2'>
                        <h3 id='gtotal'> <?php echo $total ?></h3>
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
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        ?>
            <form action="quotation.php" method="POST">
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
                        <button type="submit" name="quotation" class="qbtn"> Get Quatation</button>
                    </div>
                </div>
            </form>
        <?php
        } ?>
    </section>