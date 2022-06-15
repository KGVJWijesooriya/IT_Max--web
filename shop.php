<?php include('partials-front/menu.php'); ?>


<section id="Topic">

    <?php include('partials-front/category.php') ?>
    <h1>SHOP</h1>

</section>
<?php
$page = $_GET["page"];

if ($page == "" || $page == "1")
{
    $page1=0;
}
else
{
    $page1=($page*5)-5;
}

?>
<section>
    <div class="shop">
        <div id="S_product_B">
            <?php
        $sql = "SELECT * FROM tbl_singal_item WHERE active='yes' ORDER BY id DESC limit $page1,16";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        $a = $count / 5;
        $a = ceil($a);
        // echo $a;
        echo "<br>";
        echo "<br>";
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
        <?php
        $sql1 = "SELECT * FROM tbl_singal_item WHERE active='yes'";
        $res1 = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res1);

        for ($b = 1; $b <= $a; $b++) {
        ?><a href="shop.php?page=<?php echo $b ?>"><?php echo $b . ""; ?></a> <?php
                                                                            }
                                                                                ?>
    </div>
</section>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    var menuBtn = document.getElementById("menuBtn");
    var sideNav = document.getElementById("sideNav");

    sideNav.style.left = "-40vh";
    menuBtn.onclick = function() {
        if (sideNav.style.left == "-40vh") {
            sideNav.style.left = "0";
        } else {
            sideNav.style.left = "-40vh";
        }
    }
</script>
</body>

</html>