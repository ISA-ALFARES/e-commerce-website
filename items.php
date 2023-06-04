<?php

global $temp, $connection;
session_start();
    if(isset($_SESSION['Username'])){
       $page_title =  "ITEMS";     // The Page Title...;
       include  'init.php';       // include files

        $do =    isset($_GET['do'])  ?    $_GET['do']    :  'Manage';
        if($do == "Manage"){
            echo "hello isa";
            echo 'Welcome  you are in manage  category<br>';
            echo '<a href="items.php?do=Add">Add New Category..<br></a>';
            echo '<a href="items.php?do=Edit">Edit  ..<br></a>';
            echo '<a href="items.php?do=Update">Update  ..<br></a>';

        }elseif($do == 'Edit'){

            echo 'Welcome  you are in Edit  category';
        }elseif($do == 'Add'){




        }elseif($do == 'Insert'){



        }elseif($do == 'Update'){

            echo 'Welcome  you are in Update  category';
        }else{
            echo 'Error  There\'s no page with the name...';
        }
        //End manage page...
        include $temp."footer.php";
    }else{
        header('Location : index.php ');
        exit();
    }