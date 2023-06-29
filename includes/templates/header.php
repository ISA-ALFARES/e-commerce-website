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


        $userStatus = CheckUserStatus($_SESSION['user']);
        echo $userStatus."<br>";
        if ($userStatus  == 1){

            echo "<div class='text-white'>hesabınız ِAktiv değil</div>" ;
        }

        ?>
        <div class="d-flex justify-content-end">
            <a class="uber_bar text-white" ><button  class="btn-lg btn btn-primary">
                    <i class="fa-solid fa-user icons"></i>
                    <?php echo lang("MY_ACCOUNT")?></button>
            </a>
        </div>

    <?php  }
    else{ ?>
        <div class="d-flex justify-content-end">
            <a class="uber_bar text-white" ><button  class="btn-lg btn btn-primary">
                    <i class="fa-solid fa-user icons">  </i>
                    <?php echo lang("LOGIN_SIGNUP"); ?></button></a>
        </div>
    <?php } ?>
    <nav class="navbar navbar-expand-lg nav-bar" style="background-color: #123354;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><?php echo lang('HOMEPAGE')?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">
                    <?php  foreach (getCat() as  $cat){

                        echo '<li class="nav-item dropdown"><a class="nav-link" href="catigories.php?cat_id='.$cat['ID'].'&pageName='.str_replace(' ' , '-' ,$cat['Name']).'">'.$cat['Name'].'</a></li>';
                    } ?>
                    <li class="nav-item dropdown"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
