<?php
global $tpl, $connection, $items, $temp, $do;
ob_start();
session_start();
    if (isset($_SESSION['user'])){
        $userIDs = $_SESSION['usrID'];
        $username = $_SESSION['user'];

        $pageTitle = 'Show Items';
    include 'init.php';
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        if (isset($_GET['item_ID']) && is_numeric($_GET['item_ID']) && isset($_SESSION['usrID']) && is_numeric($_SESSION['usrID']) ){
            $itemID = $_GET['item_ID'];
            $userID = $_SESSION['usrID'];
        }
        if ( $do == "Manage"){

            $statement=$connection->prepare("SELECT   cart.*, items.* , users.Username 
                                            FROM cart 
                                            INNER JOIN items ON items.Item_ID = cart.Item_id
                                            INNER JOIN users ON users.UserID  = items.Member_ID where User_id  = {$userIDs}  ORDER BY BasketID DESC ;	
                                            ");
            $statement->execute();
            $cartUserItems = $statement->fetchAll();

                ?>
                <nav class="navbar  cartnav navbar-expand-lg navbar-light bg-white">
                    <div class="container">
                        <a class="navbar-brand" href="#"><i class="fa fa-shopping-cart text-colors"></i>cart</a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class=" text-colors" href="#">Ürünler Sil</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container mt-md-4">


                    <div class="row">
                        <div class="col-md-10">
                            <?php foreach ($cartUserItems as $cart){
                                global $cartid;
                                $cartid = $cart['BasketID'];
                                ?>
<!--                                <input type="hidden" name="cardid" value="--><?php //echo $userid ; ?><!--">-->

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fa fa-shop text-colors"></i> <?php  echo  $cart['Username']; ?>
                                        <div class="option float-right text-right">
                                            <i class="fa fa-shipping-fast text-colors"></i> <span class="text-colors">kargobedava</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-1 mb-1 d-flex align-items-center">

                                                <div class="form-check ml-3">
                                                    <input
                                                            class="form-check-input checkbox1 "

                                                            type="checkbox"
                                                            <?php if (isset($cart['Item_id'])){
                                                            echo 'checked' ;
                                                            }; ?>
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- العنصر الثاني - صورة داخل الـ card -->
                                                        <?php
                                                        if (empty($cart['itemAvatar'])){

                                                            echo  '<img  src="admin/uploads/avatars/b3.jpg" alt=""/>';
                                                        }else{
                                                            echo  '<img class="img-fluid rounded" src="admin/uploads/avatars/'.$cart['itemAvatar'].'" alt="Urun Resimi"/>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-4">
                                                <!-- العنصر الثالث - نص -->
                                                <p><?php  echo  '<b>'.$cart['Name'].'</b>'.$cart['Description']; ?></p>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <!-- العنصر الرابع - رقم قابل للزيادة والنقصان -->
                                                <input type="number"
                                                       min="0"
                                                       max="100"
                                                       value="<?php echo $cart['Quantity'] ?>"
                                                       class="custom-input">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <!-- العنصر الخامس - السعر -->
                                                <span class="text-colors font-weight-bold"><?php  echo  $cart['Price'] .'TL'; ?></span>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <!-- العنصر السادس - رابط مع كلمة -->
                                                <a href="?do=Delete&cartid=<?php echo  $cartid ?>"><i class="fa fa-trash-alt text-colors"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }; ?>
                        </div>



                        <div class="col-md-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <!-- المحتوى العمودي -->
                                    <p class="text-colors"> urunler</p>
                                    <h3 class="text-center font-weight-bold text-colors">
                                        <?php
                                        $totalPrice = 0;

                                        foreach ($cartUserItems as $cart) {
                                            $price = intval($cart['Price']) * intval($cart['Quantity']);
                                            $totalPrice += $price;
                                        }

                                        echo $totalPrice;
                                        ?>

                                        </h3>
                                    <p class="text-success">Kargo bedava </p>
                                    <a href="order.php?cartid=<?php echo  $cartid ?>" class="cart-button"><span>Sepeti Onayla</span></a>
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
             $item = chekNewcart('*','cart','Item_id',$Item_ID);{
                 if ($item == 1){
                     $statement = $connection->prepare("INSERT INTO cart (CartDate, Item_id, User_id,Quantity, Price)
                                                     VALUES (NOW(), :insert_item_id, :insert_user_id, 1 , :insert_price)
                                                     ");

                     $statement->execute(array(
                         'insert_item_id' => $Item_ID ,
                         'insert_user_id' => $userID ,
                         'insert_price' => $Price));

                     echo '<div class="container mt-5">' ;
                     $themesg     ='<div class=" alert alert-info">'.$statement->rowCount() . 'Record updated...</div>' ;
                     $page_adress = 'cards.php?do=Manage';
                     redirect_home($themesg,3,$page_adress);
                     echo '</div>';
                 }else{
//
//                     $statement=$connection->prepare("UPDATE  CART SET Quantity values(+1)");
//                     $statement->execute();
                     echo '0';

                 }
            }

        }elseif ($do == "Edit"){

            echo 'edit page';

        }elseif ($do == "Delete"){

                if (isset($_GET['cartid'])){

                    $cartid = $_GET['cartid'];
                    $statement = $connection->prepare("DELETE FROM cart  WHERE BasketID = $cartid ");
                    $statement->execute();
                    $count = $statement->rowCount();
                    if ($count == 1){

                        echo '<div class="container mt-5">' ;
                        $themesg     ='<div class=" alert alert-info">'.$statement->rowCount() . 'Sepetten başarıyla kaldırıldı...</div>' ;
                        $page_adress = 'cards.php?do=Manage';
                        redirect_home($themesg,1,$page_adress);
                    }

                }

        }else{
            echo "yalnis bir sayfa....!";
        }
    }else{
        echo "giris yapmalisiniz...!!";
    }
//print_r($_SESSION);
include $temp."footer.php";
ob_end_flush();

