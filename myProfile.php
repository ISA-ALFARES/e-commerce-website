<?php
global $connection, $items;
session_start();
if (isset($_SESSION['user'])){
    global $temp;
    include  "init.php";
    $userStatment=$connection->prepare("SELECT *  FROM users WHERE Username = ? ");

    $userStatment->execute(array($_SESSION['user']));

    $information = $userStatment ->fetchAll();

    ?>
    <h1 class="text-center">Hisabim</h1>';
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mt-3 mb-3">
                    <div class="card-header bg-primary text-white">Hisabim</div>
                    <div class="card-body information">
                        <?php

                        foreach ($information as $info){
                            ?>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-solid fa-unlock "></i>
                                    <span>ad</span> :   <?php echo $info['Username']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-envelope "></i>
                                    <span>E-post</span> :   <?php echo $info['Email']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-user-group "></i>
                                    <span>Ad ve soyad</span> :   <?php echo $info['Fullname']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-calendar "></i>
                                    <span>ekleme tarih</span> :   <?php echo $info['Date']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-tags "></i>
                                    <span>Kategori</span> :   <?php echo $info['UserID']; ?>
                                </li>

                            </ul>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div id="my-ads" class="my-ads block">
            <div class="col-md-12">
                <div class="card mt-3 mb-3">
                    <div class="card-header bg-primary text-white ">Reklamlarım</div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-start flex-wrap">
                            <?php
                            foreach ((getitems('Member_ID' ,$info['UserID'])) as $item){
                                echo '<div class="col-sm-6 col-md-4 col-lg-4">' ;
                                    echo '<a target="_blank" style="text-decoration: none;  href="items.php?item_ID='.$item['Item_ID'].'"><div class="thumbnail item-box">';
                                        echo '<img class="img-responsive box-image "  src="./layout/images/b3.jpg" alt="" >';
                                        echo '<div class="box-information">';
                                            echo '<h5 class="font-weight-bold d-inline-block title-font-size ">'.$item['Name'].'</h5>';
                                            echo '<span class=" Description-font-size ">'.$item['Description'] .'</span>';
                                             echo '<h4 class="text-dark font-weight-bold  ">'.$item['Price'].'<span class="text-dark money"> TL</span>'.'</h4>';
                                                 if ($item['Approve'] == 0)
                                                    {
                                                        echo '<span class="text-white text-center not-approve">'.lang("NOT APPROVE").'</span>';

                                                    }
                                        echo '</div>';
                                    echo '</div></a>';
                                echo  '</div>';
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3 mb-3">
                    <div class="card-header bg-primary text-white "> comments Latest</div>
                    <div class="card-body">
                        <?php
                        $commentStatus=$connection->prepare("SELECT *  FROM comments WHERE user_id = ? ");

                        $commentStatus->execute(array($info['UserID']));

                        $comments = $commentStatus ->fetchAll();

                        if (!empty($comments)){
                            foreach ($comments as $comment){
                                ?>
                                <ul class="list-unstyled">
                                    <li>
                                         <?php echo '<div class="comments-list">'.$comment['Comment'].'</div>'; ?>
                                    </li>
                                </ul>
                           <?php }
                        }else{
                            echo "no commetns...!!!";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
}else{
    header('Location:login.php');
}

include $temp."footer.php";
