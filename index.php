<?php
ob_start();
session_start();
$pageTitle = 'Homepage';
include 'init.php';
?>
<div class="container">
    <div class="row">
        <?php
            echo '<div class="col-md-12">';
                echo '<div class="row">';
                    $allItems = getAllFrom('*', 'items', 'Approve = 1', '', 'Item_ID');
                    foreach ($allItems as $item) {
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
                                                echo '<span class=" Description-font-size  ">'.$item['Description'] .'</span>';
                                                echo '<h4 class="text-dark font-weight-bold  ">'.$item['Price'].'<span class="text-dark money ">'.lang("MONY").'</span>'.'</h4>';
                                            echo '</div>';
                                            echo '<a href="cards.php?do=Add&item_ID='.$item['Item_ID'].'" class="cart-button ml-5 " ><span>'.lang("ADD_TO_CARD").'</span></a>';
                                        echo '</div>';
                                echo '</div></a>';
                            echo '</div>';
                        }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
include "includes/templates/footer.php";
ob_end_flush();
?>

