<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "it-max");

if (mysqli_connect_error()) {
    echo "<script>
    alert('cannot connect to database');
    window.location.href='cart2.php';
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['quotation'])) {
        $query1 = "INSERT INTO `tbl_customer`(`cname`, `cnumber`, `cemail`, `s_email`) VALUES ('$_POST[cfname]','$_POST[cnumber]','$_POST[cemail]','$_POST[s_email]')";
        if (mysqli_query($con, $query1)) {
            $o_id = mysqli_insert_id($con);
            $query2 = "INSERT INTO `tbl_order`(`o_id`, `i_id`, `title`, `qty`, `price`) VALUES (?,?,?,?,?)";
            // echo $query2;
            $stmt = mysqli_prepare($con, $query2);
                mysqli_stmt_bind_param($stmt,"iisii",$o_id,$i_id , $title,$qty,$price);
                foreach ($_SESSION['cart'] as $key => $values) {
                    $i_id = $values['i_id'];
                    $title = $values['title'];
                    $qty = $values['Quantity'];
                    $price = $values['price'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                    alert('DONE');
                    window.location.href='cart2.php';
                    </script>";
            }
        }
}
