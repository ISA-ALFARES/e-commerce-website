<?php
global $tpl, $connection, $items, $temp, $do;
ob_start();
session_start();
    if (isset($_SESSION['user'])){
    $pageTitle = 'Show Items';
    include 'init.php';
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        if (isset($_GET['item_ID']) && is_numeric($_GET['item_ID']) && isset($_SESSION['usrID']) && is_numeric($_SESSION['usrID']) ){
            $itemID = $_GET['item_ID'];
            $userID = $_SESSION['usrID'];
        }
        if ( $do == "Manage"){
            ?>
            <nav class="navbar  cartnav navbar-expand-lg navbar-light bg-white">
                <div class="container">
                    <a class="navbar-brand" href="#"><i class="fa fa-shopping-cart text-colors"></i>cart</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Delte</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container mt-md-4">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-shop text-colors"></i> Satici
                                    <div class="option float-right text-right">
                                        <i class="fa fa-shipping-fast text-colors"></i> <span class="text-colors">argobedava</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-1 mb-1 d-flex align-items-center">
                                            <!-- العنصر الأول - مربع صغير يمكن الضغط عليه -->
                                            <div class="form-check ml-3">
                                                <input class="form-check-input checkbox1 "    type="checkbox">
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- العنصر الثاني - صورة داخل الـ card -->
                                                    <img class="img-fluid rounded" src="admin/uploads/avatars/b3.jpg" alt="صورة">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <!-- العنصر الثالث - نص -->
                                            <u>blablablablablablblablablablablablablablablablablablablablablablablabla</u>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <!-- العنصر الرابع - رقم قابل للزيادة والنقصان -->
                                            <input type="number" min="0" max="100" value="1" class="custom-input">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <!-- العنصر الخامس - السعر -->
                                            <span class="text-colors font-weight-bold">300 TL</span>
                                        </div>
                                        <div class="col-md-1 mb-1">
                                            <!-- العنصر السادس - رابط مع كلمة -->
                                            <a href="#"><i class="fa fa-trash-alt text-colors"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card">
                            <div class="card-body">
                                <!-- المحتوى العمودي -->
                                <p class="text-colors"> urunler</p>
                                <h3 class="text-center font-weight-bold text-colors"> 300 TL</h3>
                                <p>أجرة التوصيل</p>
                                <button class="cart-button"><span>أضف إلى السلة</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }elseif ($do == "Add" && isset($itemID)  ){
            $cartitems = getAllFrom("*", "items" , "  Item_ID = {$itemID} " ,' AND Approve = 1', "Item_ID");
            foreach ($cartitems as $cartitem) {

             $Item_ID       =  $cartitem['Item_ID'];
             $Description   = $cartitem['Description'];
             $Name          =  $cartitem['Name'];
             $Price         =  $cartitem['Price'];
             $Member_ID     =  $cartitem['Member_ID'];
             $itemAvatar    =  $cartitem['itemAvatar'];

            }
            $statement = $connection->prepare("INSERT INTO cart (CartDate, Item_id, User_id, Price) VALUES (NOW(), :insert_item_id, :insert_user_id, :insert_price)");

            $statement->execute(array(
                'insert_item_id' => $Item_ID ,
                'insert_user_id' => $userID ,
                'insert_price' => $Price));

            echo '<div class="container">' ;
            $themesg     ='<div class=" alert alert-info">'.$statement->rowCount() . 'Record updated...</div>' ;
            $page_adress = 'cards.php?do=Manage';
            redirect_home($themesg,3,$page_adress);
            echo '</div>';

        }elseif ($do == "Delete"){

            echo "add page";

        }else{
            echo "yalnis bir sayfa....!";
        }
    }else{
        echo "giris yapmalisiniz...!!";
    }
//print_r($_SESSION);
include $temp."footer.php";
ob_end_flush();

