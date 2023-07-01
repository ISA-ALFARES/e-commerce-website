<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.css">
    <link rel="stylesheet" href="layout/css/style.css" >
    <link rel="stylesheet" href="layout/webfonts/all.min.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,400;0,600;0,700;0,800;1,500;1,600&display=swap" >
    <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'> -->

    <title><?php get_title()?></title>
</head>
<body>
    <?php

    if(isset($_SESSION['user'])){
        $sessionUser = $_SESSION['user'];

//            $userStatus = CheckUserStatus($_SESSION['user']);
            ?>
            <div class="uber_bar">

                <div class="d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn  mr-2 bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $sessionUser ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item text-dark" href="myProfile.php">My Profile</a></li>
                            <li><a class="dropdown-item  text-dark" href="additem.php">New Item</a></li>
                            <li><a class="dropdown-item  text-dark" href="profile.php#my-ads">My Items</a></li>
                            <li><a class="dropdown-item  text-dark" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <img class="my-image img-thumbnail rounded-circle" src="../../layout/images/b5.jpg" alt="">
                </div>

            </div>

        <?php
    }else{ ?>
        <div class="d-flex justify-content-end">
            <a href="login.php" class="uber_bar text-white" ><button  class="btn-lg btn btn-primary">
                    <i class="fa-solid fa-user ">  </i>
                    <?php echo lang("LOGIN_SIGNUP"); ?></button>
            </a>
        </div>
    <?php } ?>
    <nav class="navbar navbar-expand-lg nav-bar" style="background-color: #000000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><?php echo lang('HOMEPAGE')?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">
                    <?php  foreach (getCat() as  $cat){

                        echo '<li class="nav-item dropdown"><a class="nav-link" href="catigories.php?cat_id='.$cat['ID'].'">'.$cat['Name'].'</a></li>';

                    } ?>
                </ul>
            </div>
        </div>
    </nav>
