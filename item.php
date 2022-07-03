<?php include('partials-front/menu.php'); ?>

<?php
// session_start();
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql3 = "SELECT * FROM tbl_singal_item WHERE id=$id AND active='yes'";

    $res3 = mysqli_query($conn, $sql3);

    $row3 = mysqli_fetch_assoc($res3);


    $id = $row3['id'];
    $title = $row3['title'];
    $warranty = $row3['warranty'];
    $description = $row3['description'];
    $price = $row3['price'];
    $image_name = $row3['image_name'];


?>
    <section id="Topic">
        <h1><?php echo $title ?></h1>
    </section>

    <section class="section-p1 prodetails">
        <div class="single-pro-image">
            <img src="images/S_item/<?php echo $image_name ?>" width="100%" class="mainImg" alt="">
            <div class="single-pro-details">
                <h2><?php echo $price ?> LKR</h2>
                <form action="manage_cart.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="image_name" value="<?php echo $image_name ?>">
                    <input type="hidden" name="title" value="<?php echo $title; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <button type="submit" name="submit">Add to Cart
                        <span class="material-symbols-outlined">
                            shopping_cart</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="single-pro-details">
            <div class="section-p1">
                <h3><?php echo $warranty ?> Months Warranty</h3>
                <h5><?php echo $description ?></h5>
            </div>

        </div>

    </section>


<?php
}
?>
