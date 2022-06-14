<?php include('part/menu.php'); ?>

    <section id="Topic">
        <h1>SEARCH</h1>
    </section>
    <?php
    $search = $_POST['search'];
    ?>

    <section class="searchv">
        <h2><?php echo $search;?><br><br></h2>
    </section>

    <section id="S_product_B" class="section-p1" >

    <table class="tbl-full">
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
    $search = $_POST['search'];
    
        

    //SQL Query to Get foods based on search keyword
    $sql = "SELECT * FROM tbl_singal_item WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    // echo $search;

    //Execute the Query
    $res = mysqli_query($conn,$sql);

    //Count rows 
    $count = mysqli_num_rows($res);

    

    if($count>0)
    {
        

        //Item Available
        while($row=mysqli_fetch_assoc($res))
        {
            //Get the Values 
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            ?>


<tr>
                                            <td class="text-center"><?php echo $row['id'];?></td>
                                            <td class="text-center"><?php echo $row['title'];?></td>
                                            <td class="text-center"><?php echo $row['warranty'];?></td>
                                            <td class="text-center"><?php echo $row['price'];?></td>
                                            <td class="text-center"><?php echo $row['image_name'];?></td>
                                            <td class="text-center"><?php echo $row['category_id'];?></td>
                                            <td class="text-center"><?php echo $row['active'];?></td>
                                            <td class="text-center">
                                                <a href="./update-item.php?id=<?php echo $row["id"]; ?>"class="btn-secondary1"> Update Category</a>
                                                <a href="./delete-item.php?id=<?php echo $row["id"]; ?>" class="btn-secondary2"> Delete Category</a>
                                            </td>
                                        </tr> 
            <?php
            

        }
    }
    else
    {
        //Categories not Available 
        echo"<div><br><h4>Sorry! We were not able to find any products for your desired keywords!<br></h4>";
        ?><br/><img src="images/8h0c8.jpg" width="50%"></div><?php
    }
?>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>