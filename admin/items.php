<?php

global $temp, $connection;
session_start();
    if(isset($_SESSION['Username'])){
       $page_title =  "ITEMS";     // The Page Title...;
       include  'init.php';       // include files

        $do =    isset($_GET['do'])  ?    $_GET['do']    :  'Manage';
        if($do == "Manage"){


                $query = '';
                if (isset($_GET['page']) && $_GET['page'] == 'pending'){

                    $query  = ' AND RegStatus =  0';
                }
                $stetment=$connection->prepare("SELECT items.* , categories.Name AS 'Catigore Name ',users.Username 
                            FROM items 
                            INNER JOIN categories ON categories.ID = items.Cat_ID 
                            INNER JOIN users ON users.UserID =items.Member_ID ;
                            ");
                //execute the data entered by the items
                $stetment->execute();

                //Assign to variable...
                $rows = $stetment->fetchAll();
                echo '<h1 class="text-center">'.  lang("MANAGE_ITEMS").'</h1>';
                if (! empty($rows)){
                    ?>
                    <div class="container">
                        <div class="table-responsive">

                            <table class="main-table text-center table text-white table-bordered border-danger ">
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Description</td>
                                    <td>Price</td>
                                    <td>Adding Date</td>
                                    <td>Catigore name</td>
                                    <td>User name</td>
                                    <td>Control</td>
                                </tr>
                                <tr>
                                    <?php
                                    foreach($rows as $row){
                                        echo "<tr>";
                                        echo "<td>" . $row['Item_ID'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Description'] . "</td>";
                                        echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>" . $row['Add_Data']."</td>";
                                        echo "<td>" . $row['Name']."</td>";
                                        echo "<td>" . $row['Username']."</td>";
                                        echo "<td>
                              <a class='btn btn-success' href='items.php?do=Edit&ID=".$row['Item_ID']."' role='button'><i class='fa-solid fa-pen-to-square'> </i> Edit </a>
                              <a  href='items.php?do=Delete&ID=".$row['Item_ID']."' role='button' class='btn btn-danger confirm' ><i class='fa-regular fa-trash-can'> </i> Delete </a>";
                                        if($row['Approve'] == 0 ){

                                            echo "<a  href='items.php?do=Approve&item_id=".$row['Item_ID']."' role='button' class='btn btn-info confirm Activate' ><i class='fa-solid fa-circle-check''></i> Approve </a>";
                                        }
                                    }
                                    ?>
                                </tr>
                            </table>
                            <a class="btn btn-primary btn-lg" href="?do=Add" role="button"><i class="fa-solid fa-plus"></i>     Add Item    </a>
                        </div>
                    </div>
                    <?php
                }else{
                    echo '<div class="container">';
                    echo  '<div class="alert alert-danger">Sorry This page is empty, there is nothing to display...!</div>';
                    echo  '<a class="btn btn-primary btn-lg add_null" href="?do=Add" role="button"><i class="fa-solid fa-plus"></i>     Add Item    </a>';
                    echo '<div>';
                }
        }elseif($do == 'Add'){

            ?>
            <!--start Add Form-->
            <div class="continyer">
                <h1 class="text-center"><?php echo lang("ADD_ITEMS")?></h1>
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
                    <!-- End Country field -->
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
                    <!-- Start Member Field -->
                    <div class="form-group">
                        <select  class="form-control selection" name="member">
                            <option value="0">Member</option>
                            <?php
                            $stetment=$connection->prepare("SELECT * FROM users");
                            $stetment ->execute();
                            $users =$stetment ->fetchAll();
                            foreach ($users as $user ){
                                echo  "<option value='".$user['UserID']."'>" . $user['Username'] . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <!-- End member Field -->
                    <!-- Start Save  field -->
                    <input
                        class="btn btn-success btn-block"
                        type="submit"
                        value="Save Item">
                    <!-- End Save  field -->
                </form>
            </div><!--End Add Form-->

            <?php

        }elseif($do == 'Edit'){
            // Chek if  Get Request is numaric & Get the integer value of it
            $item_ID = isset($_GET['ID'])&& is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0 ;

            //Select all data Depend On this ID

            $stetment = $connection->prepare("SELECT *  FROM items  WHERE Item_ID = ?");
            //Execute query

            $stetment ->execute(array($item_ID));

            //If the entered data exists, it will be stored here/ Fetch the data

            $items = $stetment->fetch();

            //The Row Count
            $count = $stetment->rowcount();

            if($count > 0) { ?>

                <!--start Edit Form-->
                <div class="continyer">
                    <h1 class="text-center"><?php echo lang("EDIT_ITEMS")?></h1>
                    <form class="contact-form" action="<?php echo "?do=Update" ?>" method="POST">
                        <!-- Start item name field -->
                        <input type="hidden" name="item_ID" value="<?php echo $item_ID ; ?>">
                        <i class="fa-solid fa-caret-right icons"></i>
                        <div class="form-group">
                            <input

                                    class="form-control"
                                    type="text"
                                    name="name"
                                    placeholder="    Enter the Item Name...! "
                                    value="<?php echo $items['Name'] ?>"
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
                                    placeholder="   Description of The Item"
                                    value="<?php echo $items['Description'] ?>"

                            />
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
                                    value="<?php echo $items['Price'] ?>"
                                    required="required">
                            <span class="axstrisx">*</span>
                        </div>
                        <!-- End username field -->
                        <!-- Start Status Field -->
                        <div class="form-group ">
                            <select  class="form-control selection " name="status">
                                <option value="1" <?php  if($items['Status'] == 1){ echo  'selected' ; } ?>>New</option>
                                <option value="2" <?php  if($items['Status'] == 2){ echo  'selected' ; } ?>>Like New</option>
                                <option value="3" <?php  if($items['Status'] == 3){ echo  'selected' ; } ?>>Used</option>
                                <option value="4" <?php  if($items['Status'] == 4){ echo  'selected' ; } ?>>Very Old</option>
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
                                    value="<?php echo $items['Country'] ?>"
                                    required="required">
                            <span class="axstrisx">*</span>
                        </div>
                        <!-- End Country field -->
                        <!-- Start Catigore Field -->
                        <div class="form-group">
                            <select  class="form-control selection " name="catigore">
                                <option value="0">Catigore</option>
                                <?php
                                $stetment=$connection->prepare("SELECT * FROM categories");
                                $stetment ->execute();
                                $cats =$stetment ->fetchAll();
                                foreach ($cats as $cat ){
                                    echo  "<option value='".$cat['ID']."'";
                                    if($items['Cat_ID'] == $cat['ID']){ echo "selected" ;}
                                    echo ">". $cat['Name'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <!-- End Catigore Field -->
                        <!-- Start Member Field -->
                        <div class="form-group">
                            <select  class="form-control selection" name="member">
                                <option value="0">Member</option>
                                <?php
                                $stetment=$connection->prepare("SELECT * FROM users");
                                $stetment ->execute();
                                $users =$stetment ->fetchAll();
                                foreach ($users as $user ){
                                    echo  "<option value='".$user['UserID']."'" ;
                                    if($items['Member_ID'] == $user['UserID']){ echo "selected" ;}
                                    echo     ">" . $user['Username'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <!-- End member Field -->
                        <!-- Start Save  field -->
                        <input
                                class="btn btn-success btn-block"
                                type="submit"
                                value="Save Item">
                        <!-- End Save  field -->
                    </form>
                </div>
                <!--End Form-->
            <?php }
            else{//Enter a user ID that does not exist
                $errormsg = "Sorry You Enter a user ID that does not exist";
                redirect_home($errormsg);
            }
        /*************************************/

            $stetment=$connection->prepare("SELECT comments.*, users.Username AS username
                                              FROM comments
                                              INNER JOIN users
                                              ON users.UserID  = comments.user_id 
                                              where  item_id = ?
                                              ");

            //execute the data entered by the user
            $stetment->execute(array($item_ID));

            //Assign to variable...
            $comments = $stetment->fetchAll();
                if (! empty($comments)){
                    ?>
                    <div class="container">
                        <div class="table-responsive">
                            <h1 class="text-center"><?php echo lang("MANAGECOMMENTS");  echo "   ( ".$items['Name']." )" ?></h1>
                            <table class="main-table text-center table text-white table-bordered border-danger ">
                                <tr>
                                    <td>ID</td>
                                    <td>Comment</td>
                                    <td>User Name</td>
                                    <td>Comment_data</td>
                                    <td>Control</td>
                                </tr>
                                <tr>
                                    <?php
                                    foreach($comments as $comment){
                                        echo "<tr>";
                                        echo "<td>" . $comment['comment_ID'] . "</td>";
                                        echo "<td>" . $comment['Comment'] . "</td>";
                                        echo "<td>" . $comment['username']   . "</td>";
                                        echo "<td>" . $comment['Comment_data']."</td>";
                                        echo "<td>
                              <a class='btn btn-success' href='comments.php?do=Edit&comment_id=".$comment['comment_ID']."' role='button'><i class='fa-solid fa-pen-to-square'> </i> Edit </a>
                              <a  href='comments.php?do=Delete&comment_id=".$comment['comment_ID']."' role='button' class='btn btn-danger confirm' ><i class='fa-regular fa-trash-can'> </i> Delete </a>";
                                        if($comment['Status'] == 0 ){

                                            echo "<a  href='comments.php?do=activate&comment_id=".$comment['comment_ID']."' role='button' class='btn btn-info confirm Activate' ><i class='fa-solid fa-circle-check''></i> Activate </a>";
                                        }
                                        echo  "</td>";
                                        echo "<tr>";
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                }
        }elseif($do == 'Update'){

            if ($_SERVER['REQUEST_METHOD']  ==  "POST"){

                $item_ID         = $_POST['item_ID'];
                $name            = $_POST['name'];
                $description     = $_POST['description'];
                $price           = $_POST['price'];
                $status          = $_POST['status'];
                $country         = $_POST['country'];
                $cat             = $_POST['catigore'];
                $user            = $_POST['member'];

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
                if($cat == 0 ){
                    $fromError [] = 'CAtigore Can\'t be <sronge>Empty</sronge>';
                }
                if($user == 0 ){
                    $fromError [] = 'memper Can\'t be <sronge>Empty</sronge>';
                }

                if (!empty($fromError)){

                    foreach ($fromError as $error){

                        echo  '<div class="alert alert-danger ">'.$error.'</div>' ;
                    }
                }else{
                    $stetment=$connection->prepare("UPDATE
                                                                    items
                                                               SET
                                                                   Name = ? ,
                                                                   Description = ? ,
                                                                   Price = ? ,
                                                                   Status = ? ,
                                                                   Country = ? ,
                                                                   Cat_ID = ? ,
                                                                   Member_ID = ? 
                                                               WHERE Item_ID = ?");
                    $stetment->execute(array($name,$description,$price,$status,$country,$cat,$user,$item_ID));
                    echo '<div class="container">' ;
                    $themesg     ='<div class=" alert alert-info">'.$stetment->rowCount().'Record updated...</div>' ;
                    $page_adress = 'items.php';
                    redirect_home($themesg,2,$page_adress);
                    echo '</div>';
                }
            }
        }elseif($do == 'Insert'){


            if ($_SERVER['REQUEST_METHOD']  ==  "POST"){

                $name            = $_POST['name'];
                $description     = $_POST['description'];
                $price           = $_POST['price'];
                $status          = $_POST['status'];
                $country         = $_POST['country'];
                $cat             = $_POST['catigore'];
                $user            = $_POST['member'];

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
                if($cat == 0 ){
                    $fromError [] = 'CAtigore Can\'t be <sronge>Empty</sronge>';
                }
                if($user == 0 ){
                    $fromError [] = 'memper Can\'t be <sronge>Empty</sronge>';
                }

                if (!empty($fromError)){

                    foreach ($fromError as $error){

                        echo  '<div class="alert alert-danger ">'.$error.'</div>' ;
                    }
                }

                else{

                    $stetment=$connection->prepare("INSERT INTO 
                        items(Name , Description , Price , Status , Country  , Add_Data  , Cat_ID , Member_ID )
                        VALUES (:zname ,:zdescription ,:zprice ,:zstatus, :zcountry ,now()  ,:zcatigores ,:zmember)");
                    $stetment->execute(array(

                        'zname'          =>  $name ,
                        'zdescription'   =>  $description ,
                        'zprice'         =>  $price ,
                        'zstatus'        =>  $status ,
                        'zcountry'       =>  $country ,
                        'zcatigores'      => $cat ,
                        'zmember'      => $user
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

        }elseif ($do == "Delete") {
            // Chek if  Get Request is numeric & Get the integer value of it
            $item_ID = isset($_GET['ID'])&& is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0 ;

            $chek = chekitem('Item_ID' , 'items' , $item_ID);

            if($chek > 0 ){

                $stetment = $connection->prepare("DELETE FROM items WHERE Item_ID = ?");
                $stetment ->execute(array($item_ID));
                // Redirect to another page
                echo '<div class="container">' ;
                $page_adress = 'items.php';
                $themesg ='<div class="alert alert-info">The deletion was completed successfully...!</div>';
                redirect_home($themesg,1,$page_adress);
                echo '</div>' ;
            }
            else{
                echo '<div class="container">' ;
                $page_adress = 'items.php';
                $themesg ='<div class="alert alert-danger">This user does not exist...!</div>';
                redirect_home($themesg,1,$page_adress);
                echo '</div>' ;
            }
        }elseif ($do == "Approve"){ //start items activation page


            // Chek if  Get Request is numeric & Get the integer value of it
            $item_ID = isset($_GET['item_id'])&& is_numeric($_GET['item_id']) ? intval($_GET['item_id']) : 0 ;
            //Verify that the item number exists IN database
            $chek = chekitem('Item_ID' , 'items' ,  $item_ID);
            if($chek > 0 ) {
                $stetment = $connection->prepare("UPDATE items SET Approve = 1 WHERE Item_ID = ?");
                $stetment->execute(array($item_ID));
                // Redirect to another page
                echo '<div class="container">';

                $page_adress = 'items.php';

                $themesg = '<div class="alert alert-success">Approve completed successfully...!</div>';

                redirect_home($themesg, 1, $page_adress);

                echo '</div>';
            }

        }else{

            echo '<div class="container">' ;
            $page_adress = 'items.php';
            $themesg ='<div class="alert alert-danger">We do not have this items in our records...!</div>';
            redirect_home($themesg,1,$page_adress);
            echo '</div>' ;
        }
        //End manage page...
        include $temp."footer.php";
    }else{
        header('Location : index.php ');
        exit();
    }