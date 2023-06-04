<?php

global $temp, $connection;
session_start();
    if(isset($_SESSION['Username'])){
       $page_title =  "ITEMS";     // The Page Title...;
       include  'init.php';       // include files

        $do =    isset($_GET['do'])  ?    $_GET['do']    :  'Manage';
        if($do == "Manage"){
            echo "hello isa";
            echo 'Welcome  you are in manage  category<br>';
            echo '<a href="items.php?do=Add">Add New Category..<br></a>';
            echo '<a href="items.php?do=Edit">Edit  ..<br></a>';
            echo '<a href="items.php?do=Update">Update  ..<br></a>';

        }elseif($do == 'Edit'){

            echo 'Welcome  you are in Edit  category';
        }elseif($do == 'Add'){

            ?>
            <!--start Add Form-->
            <div class="continyer">
                <h1 class="text-center"><?php echo lang("ADDMEMBER")?></h1>
                <form class="contact-form" action="<?php echo "?do=Insert" ?>" method="POST">
                    <!-- Start item name field -->
                    <i class="fa-solid fa-caret-right icons"></i>
                    <div class="form-group">
                        <input

                            class="form-control"
                            type="text"
                            name="name"
                            placeholder="    Enter the Item Name...! "
                            value=""
                            required="required">
                        <span class="axstrisx">*</span>
                    </div>
                    <!-- End username field -->
                    <!-- Start Description Field -->
                    <i class="fa-solid fa-caret-right icons"></i>
                    <div class="form-group ">
                        <input
                            type="text"
                            name="description"
                            class="form-control"
                            required="required"
                            placeholder="   Description of The Item" />
                        <span class="axstrisx">*</span>
                    </div>
                    <!-- End Description Field -->
                    <!-- Start item name field -->
                    <i class="fa-solid fa-caret-right icons"></i>
                    <div class="form-group">
                        <input

                            class="form-control"
                            type="text"
                            name="price"
                            placeholder="    Enter the Price...! "
                            value=""
                            required="required">
                        <span class="axstrisx">*</span>
                    </div>
                    <!-- End username field -->
                    <!-- Start Status Field -->
                    <div class="form-group">
                        <select  class="form-control" name="status">
                            <option value="0">Status</option>
                            <option value="1">New</option>
                            <option value="2">Like New</option>
                            <option value="3">Used</option>
                            <option value="4">Very Old</option>
                        </select>
                    </div>
                    <!-- End Status Field -->
                    <!-- Start Country name field -->
                    <i class="fa-solid fa-caret-right icons"></i>
                    <div class="form-group">
                        <input

                            class="form-control"
                            type="text"
                            name="country"
                            placeholder="    Enter the Country name...! "
                            value=""
                            required="required">
                        <span class="axstrisx">*</span>
                    </div>
                    <!-- End Country field -->
                    <!-- Start Save  field -->
                    <input
                        class="btn btn-success btn-block"
                        type="submit"
                        value="Save Item">
                    <!-- End Save  field -->
                </form>
            </div><!--End Add Form-->

            <?php

        }elseif($do == 'Insert'){


            if ($_SERVER['REQUEST_METHOD']  ==  "POST"){

                $name            = $_POST['name'];
                $description     = $_POST['description'];
                $price           = $_POST['price'];
                $status          = $_POST['status'];
                $country         = $_POST['country'];

                $fromError = array();

                if(empty($name)){
                    $fromError [] =  "Name Can\'t be <sronge>Empty</sronge>" ;
                }
                if(empty($description)){
                    $fromError [] = 'Description Can\'t be <sronge>Empty</sronge>';
                }
                if(empty($price)){
                    $fromError [] = 'price Can\'t be <sronge>Empty</sronge>';
                }
                if(empty($status)){
                    $fromError [] = 'Status Can\'t be <sronge>Empty</sronge>';
                }
                if(empty($country)){
                    $fromError [] = 'country Can\'t be <sronge>Empty</sronge>';
                }

                if (!empty($fromError)){

                    foreach ($fromError as $error){

                        echo  '<div class="alert alert-danger">'.$error.'</div>' ;
                    }
                }

                else{

                    $stetment=$connection->prepare("INSERT INTO 
                        
                        items(Name , Description , Price , Status , Country  , ADD_Data  )
                        VALUES (:zname ,:zdescription ,:zprice ,:zstatus, :zcountry ,now() )");
                    $stetment->execute(array(

                        'zname'          =>  $name ,
                        'zdescription'   =>  $description ,
                        'zprice'         =>  $price ,
                        'zstatus'        =>  $status ,
                        'zcountry'       =>  $country ,
                    ));
                    echo '<div class="container">' ;
                    $themesg     ='<div class=" alert alert-info">'.$stetment->rowCount().'Record updated...</div>' ;
                    $page_adress = 'items.php';
                    redirect_home($themesg,2,$page_adress);
                    echo '</div>';

                }


            }else{// error page
                header("Location: index.php");
                exit();
            }

        }elseif($do == 'Update'){

            echo 'Welcome  you are in Update  category';
        }else{
            echo 'Error  There\'s no page with the name...';
        }
        //End manage page...
        include $temp."footer.php";
    }else{
        header('Location : index.php ');
        exit();
    }