<?php
    include   "connect.php";
    global  $temp ;
    //Routes
    $temp  =  "includes/templates/"; // Template Directory
    $lang  =  "includes/languages/"; // Languages Directory
    $func  =  "includes/funcations/";// Funcations Directory..
    //include The Improtant  files...
    include   $func ."funcation.php";     // 2-header Directory


        $lang_array = array('english.php','turkish.php','arabic.php');
        if(isset($_GET['language']) && in_array($_GET['language'] ,$lang_array)){

            $language = $_GET['language'];

            $_SESSION['language'] = $language;



        }else{

            $language = 'english.php';

        }
    include   $lang . $_SESSION['language']; // 1-Languages Directory --olwes firset file
    include   $temp ."header.php";     // 2-header Directory

    //include navbar all pages Expect The one with $navbar variable
    if(!isset($no_navbar)){include $temp."navbar.php";}  // navbar Directory not in the index.php 
