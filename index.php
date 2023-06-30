<?php
global $userSession;
session_start();
    if (isset($_SESSION['user'])){
        global $temp;
        include  "init.php";
        echo '<a class="uber_bar ">hello  ' .$userSession. '</a>';

    }else{
        header('Location:login.php');
    }

include $temp."footer.php";
