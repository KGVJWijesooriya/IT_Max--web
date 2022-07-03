
        <div class="col-8 text-center col-3">
            <?php
            $sql3 = "SELECT * FROM tbl_customer";

            $res = mysqli_query($conn, $sql3);

            $count3 = mysqli_num_rows($res);

            ?>
            <div class="iboxa">
                <div>
                    <h1><?php echo $count3 ?></h1>
                </div>
                <div><span class="material-symbols-outlined">
                        description
                    </span></div>
            </div>
            <br />
            Total Quotation

        </div>

        <div class="col-9 text-center col-3">
            <?php
            $sql3 = "SELECT * FROM tbl_customer WHERE s_email='no'";

            $res = mysqli_query($conn, $sql3);

            $count3 = mysqli_num_rows($res);

            ?>
            <div class="iboxa">
                <div>
                    <h1><?php echo $count3 ?></h1>
                </div>
                <div><span class="material-symbols-outlined">
                        pending
                    </span></div>
            </div>
            <br />
            Pending Quotation

        </div>

        <div class="col-10 text-center col-3">
            <?php
            $sql3 = "SELECT * FROM tbl_customer WHERE s_email='yes'";

            $res = mysqli_query($conn, $sql3);

            $count3 = mysqli_num_rows($res);

            ?>
            <div class="iboxa">
                <div>
                    <h1><?php echo $count3 ?></h1>
                </div>
                <div><span class="material-symbols-outlined">
                        task_alt
                    </span></div>
            </div>
            <br />
            Email Send Quotation

        </div>