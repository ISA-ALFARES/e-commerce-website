<?php
global $connection, $items;
session_start();
if (isset($_SESSION['user'])){
    global $temp;
    include  "init.php";

    ?>
    <h1 class="text-center"><?php echo lang("ADD_NEW_ITEM")?></h1>';
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mt-3 mb-3">
                    <div class="card-header bg-primary text-white">My Profile</div>
                    <div class="card-body crate-add">
                        <div class="row">
                            <div class="col-md-8">
                                <!--start Add Form-->
                                <div class="continyer">
                                    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <!-- Start item name field -->
                                        <i class="fa-solid fa-caret-right icons"></i>
                                        <div class="form-group">
                                            <input
                                                    class="form-control live-name"
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
                                                    class="form-control live-description"
                                                    required="required"
                                                    placeholder="   Description of The Item" />
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
                                                    placeholder="    Enter the Price...! "
                                                    value=""
                                                    required="required">
                                            <span class="axstrisx">*</span>
                                        </div>
                                        <!-- End Price field -->
                                        <!-- Start Status Field -->
                                        <div class="form-group ">
                                            <select  class="form-control selection " name="status">
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
                                        <!--End Country field-->
                                        <!-- Start Catigore Field -->
                                        <div class="form-group">
                                            <select  class="form-control selection " name="catigore">
                                                <option value="0">Catigore</option>
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
                </div>
            </div>
        </div>
    </div>


    <?php
}else{
    header('Location:login.php');
}

include $temp."footer.php";
