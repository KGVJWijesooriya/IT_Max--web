<nav id="sideNav">
    <div class="category">
        <ul>
            <li>
                <br><br>
                <ul>
                    <?php
                    $sql = "SELECT * FROM tbl_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);


                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                    ?>
                            <li>
                                <a href="s_item.php?id=<?php echo $row["id"]; ?>">
                                    <p><?php echo $title ?></p>
                                </a>
                            </li>
                    <?php
                        }
                    } else {
                        //Categories not Available
                        echo "<div>Category not Added</div>";
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<p>
    <span id="menuBtn" class="material-symbols-outlined">
        menu
    </span>
</p>