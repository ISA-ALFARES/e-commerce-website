<?php
session_start();
global $temp, $userSession;
include "init.php";
    if (isset($_GET['name'])) {
        $tag = $_GET['name'];
        echo "<h1 class='text-center '>" . $tag . "</h1>";
        echo '<div class="container categores-container">';
                echo '<div class="col-md-12">';
                      echo'<div class="row">';
                            $tagItems = getAllFrom("*", "items", " brand like '%$tag%'", "AND Approve = 1", "Item_ID");
                            foreach ($tagItems as $item) {
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
                                                            echo '<h4 class="text-dark font-weight-bold  ">'.$item['Price'].'<span class="text-dark money ">'.lang("MONY").'</span>'.'</h4>';
                                                        echo '</div>';
                                             echo '</a>';
                                            echo '</div>';
                                        echo '<a href="cards.php?item_ID='.$item['Item_ID'].'" class="btn btn-primary" >'.lang("ADD_TO_CARD").'</a>';
                                        echo '</div>';
                            //echo '</div>';
                            }
                 echo'</div>';
             echo'</div>';
                    }else{
                        header('Location:index.php');
                        exit();
                    }
        echo '</div>';
include $temp . "footer.php";
