<body class="content">
<?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <h1>Manage Category</h1>

<br />
            <!-- Add Admin -->
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

            <br />

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image Name</th>
                    <th>Action</th>
                </tr>

                    <?php

                        //Query to get all Admin
                        $sql = "SELECT * FROM tbl_category";
                        //execute the query
                        $res = mysqli_query($conn, $sql);

                        //Check whether the query is executed of not
                        if($res==TRUE)
                        {
                            // count rows
                            $count = mysqli_num_rows($res);
                            

                            //check the num of rows
                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    foreach($row as $key => $val){
                                        //generate output
                                        //echo $key . ": " . $val . "<BR />";
                                    }

                                    //display the value
                                    ?>

                                        <tr>
                                            <td class="text-center"><?php echo $row['id'];?></td>
                                            <td class="text-center"><?php echo $row['title'];?></td>
                                            <td class="text-center"><?php echo $row['image'];?></td>
                                            <td class="text-center">
                                                <a href="./update-admin.php?id=<?php echo $row["id"]; ?>"class="btn-secondary1"> Update Category</a>
                                                <a href="./delete-category.php?id=<?php echo $row["id"]; ?>" class="btn-secondary2"> Delete Category</a>
                                            </td>
                                        </tr> 
                                    <?php
                                }
                            }
                        }
                        else
                        {

                        }
                    ?>
            </table>

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- content start-->

    
    <!-- Footer start-->
    <div class="footer">
        <div class="wrapper">
        footer
        </div>
    </div>
    <!-- Footer start-->
</body>
</html>