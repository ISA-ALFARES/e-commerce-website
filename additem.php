<?php
global $connection, $items;
session_start();
if (isset($_SESSION['user'])){
    global $temp;
    include  "init.php";
    print_r($_SESSION)  ;
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

        $itemAvatarName = $_FILES['avatar']['name'] ;
        $itemAvatarSize = $_FILES['avatar']['size'] ;
        $itemAvatarType = $_FILES['avatar']['type'] ;
        $itemAvatarTmp = $_FILES['avatar']['tmp_name'] ;
        $itemAvatarAllowdExtension =   array('jpeg' , 'jpg' , 'png' , 'gif');
        $avatarArray = explode('.', $itemAvatarName);
        $itemAvatarExtension = strtolower(end($avatarArray));


        $fromErrors  = array();
        $name        = filter_var($_POST['name'] ,FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'] ,FILTER_SANITIZE_STRING);
        $price       = filter_var($_POST['price'] ,FILTER_SANITIZE_NUMBER_INT);;
        $status      = filter_var($_POST['status'] ,FILTER_SANITIZE_STRING);;
        $country     = filter_var($_POST['country'] ,FILTER_SANITIZE_STRING);
        $catigore    = filter_var($_POST['catigore'] ,FILTER_SANITIZE_STRING);
        $tags        = filter_var($_POST['tags'] ,FILTER_SANITIZE_STRING);

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
        if($status == 0 ){
            $fromError [] = 'Status Can\'t be <sronge>Empty</sronge>';
        }
        if(empty($country)){
            $fromError [] = 'country Can\'t be <sronge>Empty</sronge>';
        }
        if($catigore == 0 ){
            $fromError [] = 'CAtigore Can\'t be <sronge>Empty</sronge>';
        }
        if (!empty($itemAvatarName) && ! in_array($itemAvatarExtension , $itemAvatarAllowdExtension)){
            $formNameError[] = "The image format is invalid";
        }
        if (empty($itemAvatarName)){
            $formNameError[] = "Avatar Cant Be <strong>Empty</strong>..!";//1  (MB) = 1024  (KB)  1  (MB) = 1024  (KB)
        }
        if($itemAvatarSize >= ((4*1024)*1024)){

            $formNameError[] = "Image size cannot be greater than <strong>4MB </strong>..!";
        }
        if (empty($fromErrors)){

            $avatar = rand(0 , 1000000) . '_' . $itemAvatarName ;
            // mkdir("uploads/avatars" ,0777);

            move_uploaded_file($itemAvatarTmp , "admin/uploads\avatars\\".$avatar);

            $stetment=$connection->prepare("INSERT INTO 
                        items(Name , Description , Price , Status , Country  , Add_Data ,Cat_ID ,Member_ID ,brand,itemAvatar )
                        VALUES (:zname ,:zdescription ,:zprice ,:zstatus, :zcountry ,now() ,:zcat,:zmember ,:zbrand,:zitemAvatar)");
            $stetment->execute(array(

                'zname'          =>  $name ,
                'zdescription'   =>  $description ,
                'zprice'         =>  $price ,
                'zstatus'        =>  $status ,
                'zcountry'       =>  $country ,
                'zcat'           =>  $catigore ,
                'zmember'           => $_SESSION['usrID'] ,
                'zbrand'           => $tags ,
                'zitemAvatar'   =>  $avatar
            ));
            if ($stetment) {
                echo '<div class="container">';
                echo '<div class=" alert alert-info">' . $stetment->rowCount() . 'Record updated...</div>';
                echo '</div>';
            }

        }

    }
    ?>
    <h1 class="text-center text-dark"><?php echo lang("ADD_NEW_ITEM")?></h1>';
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mt-3 mb-3">

                    <div class="card-header bg-primary text-white">Hisabım</div>
                    <div class="card-body crate-add">
                        <div class="row">
                            <div class="col-md-8">
                                <!--start Add Form-->
                                <div class="continyer">
                                    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                        <!-- Start item name field -->
                                        <i class="fa-solid fa-caret-right icons"></i>
                                        <div class="form-group">
                                            <input
                                                    class="form-control live-name"
                                                    type="text"
                                                    name="name"
                                                    placeholder="    Ürün Adı"
                                                    value=""
                                            <span class="axstrisx"></span>
                                        </div>
                                        <!-- End username field -->
                                        <!-- Start Description Field -->
                                        <i class="fa-solid fa-caret-right icons"></i>
                                        <div class="form-group ">
                                            <input
                                                    value=""
                                                    type="text"
                                                    name="description"
                                                    class="form-control live-description"
                                                    placeholder="  Ürün Tanımı" />
                                            <span class="axstrisx">*</span>
                                        </div>
                                        <!-- End Description Field -->
                                        <!-- Start Price  field -->
                                        <i class="fa-solid fa-caret-right icons"></i>
                                        <div class="form-group">
                                            <input

                                                    class="form-control live-price"
                                                    type="text"
                                                    name="price"
                                                    placeholder="    Ürün Fiatı...! "
                                            <span class="axstrisx"></span>
                                        </div>
                                        <!-- End Price field -->
                                        <!-- Start Status Field -->
                                        <div class="form-group ">
                                            <select  class="form-control selection " name="status">
                                                <option value="0">Status</option>
                                                <option value="1">Yeni</option>
                                                <option value="2">Yeni gibi</option>
                                                <option value="3">Eski</option>
                                            </select>
                                        </div>
                                        <!-- End Status Field -->
                                        <!-- Start Country name field -->
                                        <i class="fa-solid fa-caret-right icons"></i>
                                        <div class="form-group">
                                            <input

                                                    class="form-control live-image"
                                                    type="text"
                                                    name="country"
                                                    placeholder="    Ülke...! "
                                                    value=""
                                            <span class="axstrisx"></span>
                                        </div>
                                        <!--End Country field-->
                                        <!-- Start Catigore Field -->
                                        <div class="form-group">
                                            <select  class="form-control selection " name="catigore">
                                                <option value="0">Kategori</option>
                                                <?php
                                                $stetment=$connection->prepare("SELECT * FROM categories");
                                                $stetment ->execute();
                                                $cats =$stetment ->fetchAll();
                                                foreach ($cats as $cat ){
                                                    echo  "<option value='".$cat['ID']."'>" . $cat['Name'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <!-- End Catigore Field -->
                                        <!-- Start avatar  field -->
                                        <i class="fa-solid fa-photo icons"></i>
                                        <div class="form-group">
                                            <input
                                                    class="form-control"
                                                    type="file"
                                                    name="avatar"
                                                    placeholder=""
                                                    value=""
                                                    required="required"
                                            <span class=""></span>
                                        </div>
                                        <!-- End avatar  field -->
                                        <!-- Start Tags Field -->
                                        <i class="fa-solid fa-caret-right icons"></i>
                                        <div class="form-group">
                                            <input
                                                    class="form-control"
                                                    type="text"
                                                    name="tags"
                                                    placeholder=<?php echo lang('Separate Tags With Comma') ?> />
                                        </div>
                                        <!-- End Tags Field -->
                                        <!-- Start Save  field -->
                                        <input
                                                class="btn btn-success btn-block btn-add-item"
                                                type="submit"
                                                value="Save Item">
                                        <!-- End Save  field -->
                                    </form>
                                </div>
                             <!--End Add Form-->
                            </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="card item-box live-preview">' ;
                                            <div class="card-bodys">
                                                <div class="img-box">
                                                    <img class="img-responsive box-image" src="./layout/images/b2.jpg" alt="" >
                                                </div>
                                                <div class="box-information">
                                                    <h5 class="font-weight-bold d-inline-block title-font-size "></h5>
                                                    <span class=" Description-font-size "></span><br>
                                                        <h4 class="text-dark font-weight-bold  d-inline-block"></h4><span class="text-info money"><?php echo lang("MONY"); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <!-- end form-->
                    <?php
                    if (!empty($fromErrors)) {
                        foreach ($fromErrors as $error) {
                            echo '<div class="mb-3 mx-5  alert alert-danger ">' . $error . '</div>';
                        }
                    }else{

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <?php
}else{
    header('Location:login.php');
}

include $temp."footer.php";
