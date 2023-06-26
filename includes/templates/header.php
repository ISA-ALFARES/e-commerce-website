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
<nav class="navbar navbar-expand-lg" style="background-color: #123354;">

  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="dashbord.php"><?php echo lang('DASHBOARD')?></a></li>
          <li class="nav-item"><a class="nav-link" href="catigories.php"><?php echo lang('CATIGORIES')?></a></li>
          <li class="nav-item"><a class="nav-link" href="members.php"><?php echo lang('MEMBERS')?></a></li>
          <li class="nav-item"><a class="nav-link" href="items.php"><?php echo lang('ITEMS')?></a></li>
          <li class="nav-item"><a class="nav-link" href="comments.php"><?php echo lang('COMMENTS')?></a></li>
            <li class="nav-item dropdown   ">
                  <a class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                      <i class="fa-solid fa-user"></i>
                      <?php echo lang('ACCOUNT')?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="members.php?do=Edit&ID=<?php echo $_SESSION['ID']?>"><?php echo lang('EDIT')?></a></li>
                    <li><a class="dropdown-item" href="#"><?php echo lang('SITTING')?></a></li>
                    <li><a class="dropdown-item" href="logout.php"><?php echo lang('LOGOUT')?></a></li>
                  </ul>
            </li>            <li class="nav-item dropdown   ">
              <a class="nav-link dropdown-toggle"
                 href="#"
                 role="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false">
                  <i class="fa-solid fa-globe"></i>
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="?language=arabic.php">AR</a></li>
                  <li><a class="dropdown-item" href="?language=turkish.php">TR</a></li>
                  <li><a class="dropdown-item" href="?language=english.php">EN</a></li>
              </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>