<?php

global $temp;


include  "init.php";
    echo '<div class="container">';
        echo '<h1 class="text-center">'. str_replace('-' , '' ,$_GET["pageName"]) .'</h1>';
        echo '<div class="row ">';
              $items = getItem($_GET["cat_id"]) ;
              foreach ($items as $item) {
                echo '<div class="col-sm-6 col-md-3 ">' ;
                   echo '<div class="thumbnail item-box">' ;
                        echo '<img class="img-responsive box-image "  src="./layout/images/1.png" alt="" >';
                            echo '<h3 class="text-danger">'.$item['Price'].'</h3>';
                            echo '<h3 class="text-white">'.$item['Name'].'</h3>';
                        echo '<p class=" text-white">'.$item['Description'] .'</p>';
                   echo '</div>';
                echo  '</div>';
              }
        echo  '</div>';
    echo  '</div>';
include $temp."footer.php";
