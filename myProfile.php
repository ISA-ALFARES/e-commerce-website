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
    <h1 class="text-center">My Profile</h1>';
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mt-3 mb-3">
                    <div class="card-header bg-primary text-white">My Profile</div>
                    <div class="card-body information">
                        <?php

                        foreach ($information as $info){
                            ?>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-solid fa-unlock icons"></i>
                                    <span>Name</span> :   <?php echo $info['Username']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-envelope icons"></i>
                                    <span>Email</span> :   <?php echo $info['Email']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-user-group icons"></i>
                                    <span>Full Name</span> :   <?php echo $info['Fullname']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-calendar icons"></i>
                                    <span>Ragistered Data</span> :   <?php echo $info['Date']; ?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-tags icons"></i>
                                    <span>Fov Category</span> :   <?php echo $info['UserID']; ?>
                                </li>

                            </ul>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3 mb-3">
                    <div class="card-header bg-primary text-white ">My ads</div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-start flex-wrap">
                            <?php
                            foreach ((getitems('Member_ID' ,$info['UserID'])) as $item){
                                echo '<div class="col-sm-6 col-md-4 col-lg-3">' ;
                                echo '<div class="thumbnail item-box">' ;
                                echo '<img class="img-responsive box-image "  src="./layout/images/b2.jpg" alt="" >';
                                echo '<h3 class="text-danger">'.$item['Price'].'</h3>';
                                echo '<h3 class="">'.$item['Name'].'</h3>';
                                echo '<p class=" ">'.$item['Description'] .'</p>';
                                echo '</div>';
                                echo  '</div>';
                            }
                            ?>
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

                        if (!empty($comment['Comment'])){
                            foreach ($comments as $comment){
                                echo 'comment :'.$comment['Comment'].'<br>';
                            }
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
