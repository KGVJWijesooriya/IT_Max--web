<body class="content">
<?php include('part/menu.php'); ?>

    <!-- content start-->
    <div class="content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br/><br/>
            
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories

            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories

            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories

            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories

            </div>
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