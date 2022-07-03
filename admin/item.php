<title>Manage Item</title>
<body class="content">
    <?php include('part/menu.php'); ?>

    <div class="content">
        <div class="wrapper">
            <div class="head">
                <div>
                    <h1>Mamage Item</h1>
                </div>
                <form action="" method="POST">
                    <div class="i_search_bar">
                        <input type="search" name="search" placeholder="Enter Your Text" class="search_txt">
                        <button type="submit" class="search_btn"><span class="material-symbols-outlined">search</span></button>
                    </div>
                </form>
            </div>
            <br />
            <!-- Add Admin -->
            <a href="<?php echo SITEURL; ?>admin/add-item.php" class="btn-primary">Add Item</a>

            <br /><br /><br />



            <table class="tbl-full tdsize">
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

                //Get the Search Keyword
                if (isset($_POST['search'])) {
                    $search = $_POST['search'];



                    //SQL Query to Get foods based on search keyword
                    $sql = "SELECT * FROM tbl_singal_item WHERE id LIKE '%$search%' OR title LIKE '%$search%' OR category_id LIKE '%$search%' ORDER BY id DESC";
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
                        <?php


                        }
                    } else {
                        //Categories not Available 
                        echo "<div><br><h4>Sorry! We were not able to find any products for your desired keywords!<br></h4>";
                        ?><br /><img src="284595933_1058817921714681_1560530709646485530_n.jpg" width="40%">
        </div>
        <?php
                    }
                } else {
                    $sql = "SELECT * FROM tbl_singal_item ORDER BY id DESC";
                    //execute the query
                    $res = mysqli_query($conn, $sql);

                    //Check whether the query is executed of not
                    if ($res == TRUE) {
                        // count rows
                        $count = mysqli_num_rows($res);


                        //check the num of rows
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                foreach ($row as $key => $val) {
                                    //generate output
                                    //echo $key . ": " . $val . "<BR />";
                                }

                                //display the value
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
<?php
                            }
                        }
                    } else {
                    }
                }
?>

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