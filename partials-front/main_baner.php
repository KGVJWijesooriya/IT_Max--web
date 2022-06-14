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
<div class="section-p1">
    <div class="banner-container">

        <div class="banner">
            <div class="mouse">
                <img src="images/S_item/<?php echo $image_name ?>">
            </div>
            <div class="contente">
                <h2><?php echo $line_1; ?></h2>
                <span><?php echo $line_2; ?></span>
                <h3><?php echo $line_3; ?></h3>
                <p><?php echo $line_4; ?></p>
            </div>
        </div>

    </div>
</div>