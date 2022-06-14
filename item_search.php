<?php include('partials-front/menu.php'); ?>

<section id="Topic">
    <h1>SEARCH</h1>
</section>
<?php
$search = $_POST['search'];
?>

<section class="searchv">
    <h2><?php echo $search; ?><br><br></h2>
</section>

<section id="S_product_B" class="section-p1">

    <?php

    //Get the Search Keyword
    $search = $_POST['search'];



    //SQL Query to Get foods based on search keyword
    $sql = "SELECT * FROM tbl_singal_item WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    // echo $search;

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Count rows 
    $count = mysqli_num_rows($res);



    if ($count > 0) {


        //Item Available
        while ($row = mysqli_fetch_assoc($res)) {
            //Get the Values 
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
    ?>


            <li style="list-style: none;">
                <a href="item.php?id=<?php echo $row["id"]; ?>">
                    <div>
                        <div class="i-box" data-aos="fade-up">

                            <img src="images/S_item/<?php echo $image_name ?>" alt="" width="100%" height="auto">
                            <div>
                                <p><?php echo $title  ?></p>
                            </div>
                            <div>
                                <h1 class="link"><?php echo $price  ?></h1>
                                <h3>LKR</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        <?php


        }
    } else {
        //Categories not Available 
        echo "<div><br><h4>Sorry! We were not able to find any products for your desired keywords!<br></h4>";
        ?><br /><img src="images/8h0c8.jpg" width="50%"></div><?php
                                                            }
                                                                ?>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>