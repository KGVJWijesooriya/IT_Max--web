<?php include('partials-front/menu.php'); ?>


<section id="Topic">
    <h1>SHOP</h1>
</section>

<section>
    <?php include('partials-front/category.php') ?>
    <div class="shop">
        <div id="S_product_B">
            <?php
            $sql = "SELECT * FROM tbl_singal_item WHERE active='yes' ORDER BY id DESC ";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $category_id = $row['category_id'];

            ?>

                    <li style="list-style: none;">
                        <a href="item.php?id=<?php echo $row["id"]; ?>">
                            <div>
                                <div class="i-box" data-aos="fade-up">

                                    <img src="images/S_item/<?php echo $image_name ?>" alt="" width="100%" height="auto">
                                    <div class="deat">
                                        <div>
                                            <p><?php echo $title  ?></p>
                                        </div>
                                        <div>
                                            <h1 class="link"><?php echo $price  ?></h1>
                                            <h3>LKR</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

            <?php

                }
            }
            ?>
        </div>
    </div>
</section>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    // var menuBtn = document.getElementById("menuBtn");
    // var sideNav = document.getElementById("sideNav");

    // sideNav.style.left = "-40vh";
    // menuBtn.onclick = function() {
    //     if (sideNav.style.left == "-40vh") {
    //         sideNav.style.left = "0";
    //     } else {
    //         sideNav.style.left = "-40vh";
    //     }
    // }
</script>
</body>

</html>

