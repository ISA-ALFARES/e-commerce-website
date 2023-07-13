<?php
global $connection;
session_start();
global $temp, $userSession;
include "init.php";
echo '<div class="categories-title"><h2> <?php  echo  ?></h2></div>';

        echo '<div class="container categores-container">';
            echo '<div class="row">';
                echo '<div class="col-md-2">';
                    echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<h4 class="card-title">Sırılama</h4>';
                            $statment=$connection->prepare("SELECT * FROM items GROUP BY  brand");
                            $statment->execute();
                            $tags = $statment->fetchAll();
                            foreach ($tags as $tag) {
                                $t =$tag['brand'] ;
                                $tag = str_replace(' ', '',$t );
                                $lowertag = strtolower($t);

                                echo '<ul class="list-groups">';
                                echo '<li class="list-groups-item">';
                                if (!empty($t)) {
                                    echo "<a href='tags.php?name={$lowertag}'>" . $t . '</a>';
                                }
                                echo '</li>';
                                echo '</ul>';
                            }


                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                if (isset($_GET["cat_id"]) and is_numeric($_GET["cat_id"])){
                    $catigore = intval($_GET["cat_id"]);
                    echo '<div class="col-md-10">';
                            echo '<div class="row">';
                                    $items = getItem($catigore) ;
                                    foreach ($items as $item) {
                                        echo '<div class="col-sm-12 col-md-6   col-lg-3">' ;
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
                                                            echo '<h4 class="text-dark font-weight-bold  ">'.$item['Price'].'<span class="text-dark money "> TL</span>'.'</h4>';
                                                        echo '</div></a>';
                                                        echo '</div>';
                                                        echo '<a href="cards.php?do=Add" class="cart-button ml-5 " ><span>Sepete Ekle</span></a>';
                                                    echo '</div>';
                                        echo '</div>';
                                    }
                            echo '</div>';
                    echo '</div>';
                }else{
                    header('Location:index.php');
                    exit();
                }
            echo '</div>';
        echo '</div>';

include $temp . "footer.php";
