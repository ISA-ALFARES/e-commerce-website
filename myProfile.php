<?php
session_start();
    if (isset($_SESSION['user'])){
        global $temp;
        include  "init.php";
        echo '<a class="uber_bar ">hello' .$_SESSION["user"]. 'in my profile page </a>';
        ?>
         <h1 class="text-center">My Profile</h1>';
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card  mt-3 mb-3">
                        <div class="card-header bg-primary text-white">My Information</div>
                        <div class="card-body">
                            Name: isa...?
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-3 mb-3">
                        <div class="card-header bg-primary text-white ">My ads</div>
                        <div class="card-body">
                            adss...?
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-3 mb-3">
                        <div class="card-header bg-primary text-white ">Latest</div>
                        <div class="card-body">
                            comments
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
