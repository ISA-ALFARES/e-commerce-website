<?php
session_start();
global $temp, $userSession;
include "init.php";
echo '<div class="categories-title"><h2 ></h2></div>';
    echo '<div class="container categores-container">';
        echo '<div class="row">';
            echo '<div class="col-md-2">';
                echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">The product is listed</h4>';
                            echo '<ul class="list-group">';
                            echo '<li class="list-group-item">';
                            echo '<input type="checkbox" name="choices[]" value="Lenovo">  Lenovo';
                            echo '</li>';
                            echo '<li class="list-group-item">';
                            echo '<input type="checkbox" name="choices[]" value="HP">  HP';
                            echo '</li>';
                            echo '<li class="list-group-item">';
                            echo '<input type="checkbox" name="choices[]" value="Dell">  Dell';
                            echo '</li>';
                            echo '</ul>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="col-md-10">';
                    echo '<div class="row">';
                            $items = getItem($_GET["cat_id"] ) ;
                            foreach ($items as $item) {
                                echo '<div class="col-sm-12 col-md-6   col-lg-3"">' ;
                                echo '<a target="_blank" href="items.php?item_ID='.$item['Item_ID'].'" class="text-dark" style="text-decoration: none;"><div class="card item-box">';
                                            echo '<div class="card-bodys">';
                                                echo '<div class="img-box">';
                                                if (empty($item['itemAvatar'])){

                                                    echo  '<img class="img-responsive box-image" src="admin/uploads/avatars/b3.jpg" alt=""/>';
                                                }else{
                                                    echo  '<img class="img-responsive box-image" src="admin/uploads/avatars/'.$item['itemAvatar'].'" alt=""/>';
                                                }
                                                echo '</div>';
                                                echo '<div class="box-information ">';
                                                    echo '<h5 class="font-weight-bold d-inline-block title-font-size ">'.$item['Name'].'</h5>';
                                                    echo '<span class=" Description-font-size cart-descrip ">'.$item['Description'] .'</span>';
                                                    echo '<h4 class="text-dark font-weight-bold  ">'.$item['Price'].'<span class="text-dark money ">'.lang("MONY").'</span>'.'</h4>';
                                                echo '</div></a>';
                                                echo '</div>';
                                                echo '<a href="cards.php?item_ID='.$item['Item_ID'].'" class="btn btn-primary" >'.lang("ADD_TO_CARD").'</a>';
                                            echo '</div>';
                                echo '</div>';
                            }
                    echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

include $temp . "footer.php";
