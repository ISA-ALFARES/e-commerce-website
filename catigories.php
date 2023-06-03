<?php
    /*
    ============================================================
    ========Manage memper page
    ======== This page you Can Add/Edit.Delete Member From here=
    =============================================================
    */
global $connection, $do;
session_start();
     if(isset($_SESSION['Username'])){

        $page_title = "CATIGORIES"; // The Page Title...;

         include  'init.php';       // include files

         if (isset($_GET['do'])) {

             $do = $_GET['do'];
         } else {
             $do = 'Manage';
         }
         if ($do == 'Manage'){

             $sort = 'ASC';

             $sort_array = array('ASC','DESC');


             if(isset($_GET['sort']) && in_array($_GET['sort'] ,$sort_array)){

                  $sort = $_GET['sort'];

                 }

             $statement=$connection->prepare("SELECT * FROM categories ORDER BY Ordering $sort");

             $statement->execute();

             $cats = $statement->fetchAll();


            echo  '<h1 class="text-center">'.lang("CATIGORIES").'</h1>'; ?>
             <div class="container categories ">
                 <div class="card">
                     <div class="card-header">
                         <i class="fa fa-edit"></i> Manage Categories
                         <div class="option float-right text-right">
                             <i class="fa fa-sort"></i> Ordering: [
                             <a class="<?php if ($sort == 'ASC') { echo 'active'; } ?>" href="?sort=ASC">asc</a> |
                             <a class="<?php if ($sort == 'DESC') { echo 'active'; } ?>" href="?sort=DESC">desc</a> ]
<!--                             <i class="fa fa-eye"></i> View: [-->
<!--                             <span class="active" data-view="full">Full</span> |-->
<!--                             <span data-view="classic">Classic</span> ]-->
                         </div>
                     </div>
                     <div class="card-body">
                         <?php
                            foreach($cats as $cat){

                                echo "<div class='cat'>";
                                echo "<div class='hidden-buttons'>";
                                echo "<a href='catigories.php?do=Edit&catid=".$cat['ID']."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i> Edit</a>";
                                echo "<a href='catigories.php?do=Delete&catid=" . $cat['ID'] . "' class='confirm btn btn-xs btn-danger'><i class='fa fa-close'></i> Delete</a>";
                                echo "</div>";
                                echo "<h3>" . $cat['Name'] . '</h3>';
                                echo "<div class='full-view'>";
                                echo "<p>"; if($cat['Description'] == '') { echo 'This category has no description'; } else { echo $cat['Description']; } echo "</p>";
                                if($cat['Visibility'] == 1) { echo '<span class="visibility cat-span"><i class="fa fa-eye"></i> Hidden</span>'; }
                                if($cat['Allow_Comment'] == 1) { echo '<span class="commenting cat-span"><i class="fa fa-close"></i> Comment Disabled</span>'; }
                                if($cat['Allow_Ads'] == 1) { echo '<span class="advertises cat-span"><i class="fa fa-close"></i> Ads Disabled</span>'; }
                                echo "</div>";
                                echo "</div>";
                                echo '<hr>';

                            }
                         ?>
                     </div>
                 </div>
             </div>


         <?php
         }elseif ($do == 'Add'){
             ?>
             <h1 class="text-center">Add New Category</h1>

             <div class="container">
                 <div class="row">
                 </div>
                 <div class="row">
                     <div class="col-md-6 offset-md-3">
                         <form class="form-horizontal" action="?do=Insert" method="POST">
                             <div class="form-group">
                                 <label for="name" class="col-sm-2 control-label">Name</label>
                                 <div class="col-sm-10">
                                     <input type="text" id="name" name="name" class="form-control" placeholder="Category name">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="description" class="col-sm-2 control-label">Description</label>
                                 <div class="col-sm-10">
                                     <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="ordering" class="col-sm-2 control-label">Ordering</label>
                                 <div class="col-sm-10">
                                     <input type="number" id="ordering" name="ordering" class="form-control" placeholder="Ordering number">
                                 </div>
                             </div>
                             <!--
                                             <div class="form-group">
                                                 <label for="parent" class="col-sm-2 control-label">Parent</label>
                                                 <div class="col-sm-10">
                                                     <select id="parent" name="parent">
                                                         <option value="0">None</option>
                                                         <option value="1">Category 1</option>
                                                         <option value="2">Category 2</option>
                                                     </select>
                                                 </div>
                                             </div>
                             -->
                             <div class="form-group">
                                 <label for="visibility" class="col-sm-2 control-label">Visibility</label>
                                 <div class="col-sm-10">
                                     <input type="radio" id="visibility-yes" name="visibility" value="1" checked />
                                     <label for="visibility-yes">Yes</label>
                                     <input type="radio" id="visibility-no" name="visibility" value="0" />
                                     <label for="visibility-no">No</label>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="commenting" class="col-sm-2 control-label">Allow Commenting</label>
                                 <div class="col-sm-10">
                                     <input type="radio" id="commenting-yes" name="commenting" value="1" checked />
                                     <label for="commenting-yes">Yes</label>
                                     <input type="radio" id="commenting-no" name="commenting" value="0" />
                                     <label for="commenting-no">No</label>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="ads" class="col-sm-2 control-label">Allow Ads</label>
                                 <div class="col-sm-10">
                                     <input type="radio" id="ads-yes" name="ads" value="1" checked />
                                     <label for="ads-yes">Yes</label>
                                     <input type="radio" id="ads-no" name="ads" value="0" />
                                     <label for="ads-no">No</label>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="col-sm-offset-2 col-sm-10">
                                     <input type="submit" value="Add Category" class="btn btn-primary">
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>

             <?php

         }elseif ($do == 'Insert'){

             echo  '<h1 class="text-center">'.lang("INSERTMEMBER").'</h1>';//Page name

             if($_SERVER['REQUEST_METHOD'] == "POST"){
                 //Check the category name
                 $name            = $_POST['name'];
                 $description     = $_POST['description'];
//                 $parent          = $_POST['parent'];
                 $ordering        = $_POST['ordering'];
                 $visibility      = $_POST['visibility'];
                 $commenting      = $_POST['commenting'];
                 $ads             = $_POST['ads'];
                 //Check the category name
                 $check = chekitem( "Name" , "categories" , $name );
                 if($check  == 0 ){

                     //Update the  database with This Information
                     $statement=$connection->prepare(
                             "INSERT INTO categories (Name , Description  ,Ordering, Visibility , Allow_Comment , Allow_Ads ) 
                                    VALUES(:the_name , :the_describe  ,:the_order , :the_visible , :the_comment , :the_ads)");
                     $statement->execute(array(

                         // add to array key and value...
                        'the_name'      =>    $name ,
                        'the_describe'  =>    $description ,
//                        'the_parent'    =>    $parent ,
                        'the_order'     =>    $ordering ,
                        'the_visible'   =>    $visibility ,
                        'the_comment'   =>    $commenting ,
                        'the_ads'       =>    $ads));

                     //End Update the  database with This Information
                     echo '<div class="container">' ;
                     $themesg     ='<div class=" alert alert-info">'.$statement->rowCount().'Record updated...</div>' ;
                     $page_adress = 'catigories.php';

                 }else{

                     echo '<div class="container">' ;
                     $page_adress = 'catigories.php?do=Add';
                     $themesg ='<div class="alert alert-danger">Sorry This  Categoris Name already exists...!</div>';

                 }
                 redirect_home($themesg,2,$page_adress);
                 echo '</div>';
             }else{ // error page
                 header('Location:members.php');
                 exit();
             }
         }elseif ($do == 'Edit' ){//Edit page

             echo  '<h1 class="text-center">'.lang("EditMemper").'</h1>';
             // Check if  Get Request is numaric & Get the integer value of it

             $cat_id = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0 ;

             //Select all data Depend On this ID
             $statement = $connection->prepare("SELECT * FROM categories WHERE ID = ? ");

             //Execute query
             $statement->execute(array($cat_id));

             //If the entered data exists, it will be stored here/ Fetch the data
             $cat = $statement->fetch();

             //The Row Count
             $count = $statement ->rowCount();

             if ($count == 1 ){

                ?>
                 <!--start Edit Form-->
                  <div class="container">
                     <div class="row">
                     </div>
                     <div class="row">
                         <div class="col-md-6 offset-md-3">
                             <form class="form-horizontal" action="?do=Insert" method="POST">

                                 <!-- Start cat name field -->
                                 <div class="form-group">
                                     <label for="name" class="col-sm-2 control-label">Name</label>
                                     <div class="col-sm-10">
                                         <input type="hidden" name="cat_id" value="<?php echo $cat_id ; ?>">
                                         <input type="text" id="name" name="name" class="form-control" value="<?php echo $cat['Name'];  ?>" placeholder="Category name">
                                     </div>
                                 </div>
                                 <!-- End cat name field -->

                                 <!-- Start  Description field -->
                                 <div class="form-group">
                                     <label for="description" class="col-sm-2 control-label">Description</label>
                                     <div class="col-sm-10">
                                         <textarea id="description" name="description"  class="form-control"   rows="3"><?php echo $cat['Description'];  ?></textarea>
                                     </div>
                                 </div>
                                 <!-- End  Description field -->

                                 <!-- Start  Ordering field -->
                                 <div class="form-group">
                                     <label for="ordering" class="col-sm-2 control-label">Ordering</label>
                                     <div class="col-sm-10">
                                         <input type="number" id="ordering" name="ordering" class="form-control" value="<?php echo $cat["Ordering"];  ?>" placeholder="Ordering number">
                                     </div>
                                 </div>
                                 <!-- End  Ordering field -->

                              <!--
                                    <div class="form-group">
                                     <label for="parent" class="col-sm-2 control-label">Parent</label>
                                     <div class="col-sm-10">
                                         <select id="parent" name="parent">
                                             <option value="0">None</option>
                                             <option value="1">Category 1</option>
                                             <option value="2">Category 2</option>
                                         </select>
                                     </div>
                                 </div>
                              -->
                                 <!-- Start  Visibility field -->
                                 <div class="form-group">
                                     <label for="visibility" class="col-sm-2 control-label">Visibility</label>
                                     <div class="col-sm-10">
                                         <input type="radio" id="visibility-yes" name="visibility" value="1"  <?php if( $cat['Visibility']  == 1 ) echo 'checked';  ?> />
                                         <label for="visibility-yes">Yes</label>
                                         <input type="radio" id="visibility-no" name="visibility" value="0"   <?php if( $cat['Visibility']  == 0 ) echo 'checked';  ?> />
                                         <label for="visibility-no">No</label>
                                     </div>
                                 </div>
                                 <!-- End  Visibility field -->

                                 <!-- Start  Commenting field -->
                                 <div class="form-group">
                                     <label for="commenting" class="col-sm-2 control-label">Allow Commenting</label>
                                     <div class="col-sm-10">
                                         <input type="radio" id="commenting-yes" name="commenting" value="1" <?php if( $cat['Visibility']  == 1 ) echo 'checked';  ?>  />
                                         <label for="commenting-yes">Yes</label>
                                         <input type="radio" id="commenting-no" name="commenting" value="0"  <?php if( $cat['Visibility']  == 0 ) echo 'checked';  ?>  />
                                         <label for="commenting-no">No</label>
                                     </div>
                                 </div>
                                 <!-- End  Commenting field -->

                                 <!-- Start  Ads field -->
                                 <div class="form-group">
                                     <label for="ads" class="col-sm-2 control-label">Allow Ads</label>
                                     <div class="col-sm-10">
                                         <input type="radio" id="ads-yes" name="ads" value="1"  <?php if( $cat['Visibility']  == 1 ) echo 'checked';  ?> />
                                         <label for="ads-yes">Yes</label>
                                         <input type="radio" id="ads-no" name="ads" value="0"  <?php if( $cat['Visibility']  == 0 ) echo 'checked';  ?> />
                                         <label for="ads-no">No</label>
                                     </div>
                                 </div>
                                 <!-- end  Ads field -->

                                 <!-- Start  Save field -->
                                 <div class="form-group">
                                     <div class="col-sm-offset-2 col-sm-10">
                                         <input type="submit" value="Save Category" class="btn btn-primary">
                                     </div>
                                 </div>
                                 <!-- End  Ads field -->
                             </form>
                         </div>
                     </div>
                 </div>
                 <!--start Edit Form-->
             <?php
             }else{ //Enter a user ID that does not exist...
                 $errormsg ='<div class="alert alert-danger">This user ID does not exist...!</div>';
                 redirect_home($errormsg);
             }

         }elseif ($do == 'Update'){

             echo  '<h1 class="text-center">'.lang("INSERTMEMBER").'</h1>';


         }elseif ($do == 'Delete'){

             echo  '<h1 class="text-center">'.lang("DELETEMEMBER").'</h1>';

         }else{

             header('Location:index.php'); // This page does not exist. Invalid login
             exit();

         }

    }else{
        header('Location:index.php'); // user is not admin  Around the index.php page
        exit();
    }