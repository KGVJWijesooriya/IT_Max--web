<?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br />

            <?php
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            
            ?>
            <br /><br />

            <!-- Add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br />

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>

                    <?php

                        //Query to get all Admin
                        $sql = "SELECT * FROM tbl_admin";
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
                                            <td class="text-center"><?php echo $row['full_name'];?></td>
                                            <td class="text-center"><?php echo $row['username'];?></td>
                                            <td class="text-center">
                                                <a href="./update-admin.php?id=<?php echo $row["id"]; ?>"class="btn-secondary1"> Update Admin</a>
                                                <a href="./delete-admin.php?id=<?php echo $row["id"]; ?>" class="btn-secondary2"> Delete Admin</a>
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