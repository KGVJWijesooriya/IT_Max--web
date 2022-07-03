<div class="category">
    <div id="productC" class="">

        <?php
        //Create SQL Query to Dispaly Categories from Database
        $sql = "SELECT * FROM tbl_category";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Count rows to check whether the category is available or not
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            //categories Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values like id, title, image_name
                $id = $row['id'];
                $title = $row['title'];
        ?>


                <a href="s_item.php?id=<?php echo $row["id"]; ?>" class="cb">
                    <li style="list-style: none;">
                        <div class="pc-box">
                            <div>
                                <p class="pc-box-text"><?php echo $title ?></p>
                            </div>
                        </div>
                    </li>
                </a>


        <?php
            }
        } else {
            //Categories not Available
            echo "<div>Category not Added</div>";
        }
        ?>
    </div>
</div>