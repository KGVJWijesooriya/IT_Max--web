<body class="content">
    <?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <div class="head">
                <div>
                    <h1>Manage Item</h1>
                </div>
                <div class="i_search_bar">
                    <input type="text" placeholder="Enter Your Text" name="search" id="search_text" class="search_txt">
                    <button type="submit" class="search_btn"><span class="material-symbols-outlined">search</span></button>
                </div>
            </div>

            <br />
            <!-- Add Admin -->
            <a href="<?php echo SITEURL; ?>admin/add-item.php" class="btn-primary">Add Item</a>

            <br /><br /><br />

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>

            <?php

            $stmt = $conn->prepare("SELECT * FROM tbl_singal_item");
            $stmt->execute();
            $result = $stmt->get_result();

            ?>

            <table class="tbl-full tdsize" id="table-data">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Warranty</th>
                    <th>Price</th>
                    <th>Image Name</th>
                    <th>Category</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                while ($row = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <td width="5%" class="text-center"><?php echo $row['id']; ?></td>
                        <td width="20%" class="text-center"><?php echo $row['title']; ?></td>
                        <td width="5%" class="text-center"><?php echo $row['warranty']; ?></td>
                        <td width="10%" class="text-center"><?php echo $row['price']; ?></td>
                        <td width="10%" class="text-center"><?php echo $row['image_name']; ?></td>
                        <td width="5%" class="text-center"><?php echo $row['category_id']; ?></td>
                        <td width="5%" class="text-center"><?php echo $row['active']; ?></td>
                        <td width="10%" class="text-center">
                            <button class="btn-secondary1"><a href="./update-item.php?id=<?php echo $row["id"]; ?>"> UPDATE</a></button><br><br>
                            <button class="btn-secondary2"><a href="./delete-item.php?id=<?php echo $row["id"]; ?>"> DELETE</a></button>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            
            <div class="clearfix"></div>

        </div>
    </div>

    <div class="itm_left">
        <div class="itm_left_data">
            <table class="tbl-full2">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>

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
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $title ?></td>
                        </tr>

                <?php
                    }
                } else {
                    //Categories not Available
                    echo "<div>Category not Added</div>";
                }
                ?>
        </div>
    </div>
    </table>
</body>

</html>