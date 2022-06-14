<?php

include('../config/constants.php');
include('login-check.php');

?>

<form action="" method="post" enctype="multipart/form-data">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/a-style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- CSS only -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    </head>

    <body>
        <!-- Menu start-->

        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="../Images/Logo/logo.png">
                        <h2>It Max</h2>
                    </div>

                    <div class="sidebar">
                        <a href="a-index.php" class="active">
                            <span class="material-symbols-outlined">dashboard</span>
                            <h3>Dashboard</h3>
                        </a>
                    </div>

                    <div class="sidebar">
                        <a href="manage-admin.php" class="active">
                            <span class="material-symbols-outlined">admin_panel_settings</span>
                            <h3>Admin</h3>
                        </a>
                    </div>

                    <div class="sidebar">
                        <a href="category.php" class="active">
                            <span class="material-symbols-outlined">category</span>
                            <h3>Categoty</h3>
                        </a>
                    </div>

                    <div class="sidebar">
                        <a href="item.php" class="active">
                            <span class="material-symbols-outlined">sell</span>
                            <h3>items</h3>
                        </a>
                    </div>

                    <div class="sidebar">
                        <a href="offers.php" class="active">
                            <span class="material-symbols-outlined">
                                percent
                            </span>
                            <h3>Offers</h3>
                        </a>
                    </div>

                    <div class="sidebar">
                        <a href="quotation.php" class="active">
                            <span class="material-symbols-outlined">
                                description
                            </span>
                            <h3>Quotation</h3>
                        </a>
                    </div>

                    <div class="sidebar">
                        <a href="logout.php" class="active">
                            <span class="material-symbols-outlined">logout</span>
                            <h3>LOG OUT</h3>
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Menu End-->