<?php
    include   "connect.php";

    //Routes
    $temp  =  "includes/templates/"; // Template Directory
    $lang  =  "includes/languages/"; // Languages Directory
    $func  =  "includes/funcations/";// Funcations Directory..
    //include The Improtant  files...
    include   $func ."funcation.php";     // 2-header Directory
    include   $lang ."english.php"; // 1-Languages Directory --olwes firset file
    include   $temp ."header.php";     // 2-header Directory

    //include navbar all pages Expect The one with $navbar variable
    if(!isset($no_navbar)){include $temp."navbar.php";}  // navbar Directory not in the index.php 
?>