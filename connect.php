<?php

    $dsn  ="mysql:host=localhost;dbname=shop";   //data soruse name
    $user = "root";                              //The user to conect
    $pass = "";                                  //Password of this user
    $optaion = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    try                                           //exception system
    {
        $connection = new PDO( $dsn,$user,$pass,$optaion);    //Start A new connection with Pdo class
        $connection ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "You Are connected..";                  //try condation  
    }
    catch(PDOException $e){
        echo "Error..". $e->getMessage();
    }
?>