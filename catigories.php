<?php

global $temp, $userSession;
include "init.php";
echo '<div class="categories-title"><h2 >'. str_replace('-' , '' ,$_GET["pageName"]) .' Fiyatları ve Modelleri</h2></div>';
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
                            $items = getItem($_GET["cat_id"]) ;
                            foreach ($items as $item) {
                                echo '<div class="col-sm-12 col-md-6   col-lg-3"">' ;
                                    echo '<div class="card item-box">' ;
                                        echo '<div class="card-bodys">';
                                            echo '<div class="img-box">';
                                                echo '<img class="img-responsive box-image" src="./layout/images/b2.jpg" alt="" >';
                                                echo '</div>';
                                                echo '<div class="box-information">';
                                                    echo '<h5 class="font-weight-bold d-inline-block title-font-size ">'.$item['Name'].'</h5>';
                                                    echo '<span class=" Description-font-size ">'.$item['Description'] .'</span>';
                                                    echo '<h4 class="text-dark font-weight-bold  ">'.$item['Price'].'<span class="text-dark money">'.lang("MONY").'</span>'.'</h4>';

                                                echo '</div>';
                                            echo '<input   class="btn btn-primary   add-card  ml-5 " type="submit"  value="'.lang("ADD_TO_CARD").'">';
                                            echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                    echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

include $temp . "footer.php";
