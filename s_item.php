<?php include('partials-front/menu.php'); ?>


<?php
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM tbl_category WHERE id=$id";

    $res2 = mysqli_query($conn, $sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $title = $row2['title'];

?>
    <section id="Topic">
        <h1><?php echo $title ?></h1>
    </section>
<?php
}
?>




<section id="S_product_B" class="section-p1" >

<?php
//Create SQL Query to Dispaly Categories from Database
$sql = "SELECT * FROM tbl_singal_item WHERE active='yes' ORDER BY id DESC";
//Execute the Query
$res = mysqli_query($conn,$sql);
//Count rows to check whether the category is available or not
$count = mysqli_num_rows($res);





if($count>0)
{
    //categories Available
    while($row=mysqli_fetch_assoc($res))
    {
        //Get the Values like id, title, image_name
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $category_id = $row['category_id'];

        if($_GET['id']==$category_id){
?>
        <li style="list-style: none;">
        <a href="item.php?id=<?php echo $row["id"]; ?>">
            <div>
            <div class="i-box" data-aos="fade-up" >
                
                    <img src="images/S_item/<?php echo $image_name ?>" alt="" width="100%" height="auto">
                    <div class="deat" >
                    <div>
                        <p ><?php echo $title  ?></p>
                    </div>
                    <div>
                        <h1 class="link" ><?php echo $price  ?></h1>
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
}
?>



</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>