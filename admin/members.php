<?php
/* 
============================================================
========Manage memper page
======== This page you Can Add/Edit.Delete Member From here=
=============================================================
*/
global $connection, $temp, $do;
session_start();

if(isset($_SESSION['Username'])){
  
  $page_title = 'MEMBERS'; // The page name
  
  include 'init.php';     //In this file, we include all the necessary files in the project and call them once, such as the header file
  
  $do = isset($_GET['do']) ? $_GET['do']  : 'Mangae';   //Start manage page...
  if($do== "Mangae"){

                 $query = '';
                if (isset($_GET['page']) && $_GET['page'] == 'pending'){

                    $query  = ' AND RegStatus =  0';
                }
             //chek if the user exist in databases and select all users except admin
            $stetment=$connection->prepare("SELECT * FROM users WHERE GroubID != 1  $query");

            //execute the data entered by the user
            $stetment->execute();

            //Assign to variable...
            $rows = $stetment->fetchAll();
            echo   '<h1 class="text-center">'. lang("MANAGEMEMBER").'</h1>';
            if (! empty($rows)){
                ?>
                <div class="container">
                    <div class="table-responsive">
                        <table class="main-table text-center table text-white table-bordered border-danger avatar-table ">
                            <tr>
                                <td><?php echo lang('ID')?></td>
                                <td><?php echo lang('Photo')?></td>
                                <td><?php echo lang('Username')?></td>
                                <td><?php echo lang('Email')?></td>
                                <td><?php echo lang('Fullname')?></td>
                                <td><?php echo lang('Control')?></td>
                                <td><?php echo lang('Date')?></td>

                            </tr>
                            <tr>
                                <?php
                                foreach($rows as $row){
                                    echo "<tr>";
                                    echo "<td>" . $row['UserID'] . "</td>";
                                    echo "<td>";
                                    if (empty($row['avatar'])){

                                        echo  '<img  src="uploads/avatars/b5.jpg" alt=""/>';
                                    }else{
                                        echo  '<img  src="uploads/avatars/'.$row['avatar'].'" alt=""/>';
                                    }
                                    echo "</td>";
                                    echo "<td>" . $row['Username'] . "</td>";
                                    echo "<td>" . $row['Email'] . "</td>";
                                    echo "<td>" . $row['Fullname'] . "</td>";
                                    echo "<td>" . $row['Date']."</td>";
                                    echo "<td>";

                               echo  '<a  role="button" class="btn btn-success" href="members.php?do=Edit&ID='.$row['UserID'].'"><i class="fa-regular fa-edit"></i>  '.lang('Edit').'</a>';
                               echo '       ';
                               echo  '<a  role="button" class="btn btn-danger confirm"  href="members.php?do=Delete&ID='.$row['UserID'].'"><i class="fa-regular fa-trash-can"> </i>     '.lang('Delete').'</a>';
                                    if($row['RegStatus'] == 0 ){

                                        echo "<a  href='members.php?do=activate&ID=".$row['UserID']."' role='button' class='btn btn-info confirm Activate' ><i class='fa-solid fa-circle-check'></i>"  .lang('Activate')."</a>";
                                    }
                                    echo  "</td>";
                                    echo "<tr>";
                                }
                                ?>
                            </tr>
                        </table>
                        <a class="btn btn-primary btn-lg" href="?do=Add" role="button"><i class="fa-solid fa-plus"></i>     <?php echo lang('Add Member')?>    </a>
                    </div>
                </div>
                <?php
            }else{
                echo '<div class="container">';
                    echo  '<div class="alert alert-danger">'.lang('Sorry This page is empty, there is nothing to display...!').'</div>';
                    echo  '<a class="btn btn-primary btn-lg add_null " href="?do=Add" role="button"><i class="fa-solid fa-plus"></i>      '. lang('Add Member') .'    </a>';
                echo '<div>';

            }

    }elseif($do== "Add"){?>
          <!--start Add Form-->
          <div class="continyer">
                <h1 class="text-center"><?php echo lang("ADDMEMBER")?></h1>
                <form class="contact-form" action="<?php echo "?do=Insert" ?>" method="POST"  enctype="multipart/form-data">
                      <!-- Start user name field -->
                    <i class="fa-solid fa-user icons"></i>
                      <div class="form-group">
                          <input

                                  class="form-control"
                                  type="text"
                                  name="username"
                                  placeholder="<?php echo lang('    Enter the username...! ') ?>"
                                  value=""
                                  required="required">
                          <span class="axstrisx">*</span>
                      </div>
                      <!-- End username field -->
                      <!-- Start Password  field -->
                    <i class="fa-solid fa-lock icons"></i>
                      <div class="form-group">
                        <input
                          class="form-control"
                          type="password"
                          name="newpassword"
                          placeholder="<?php echo lang('    Type Your a Password... ') ?>"
                          value=""
                          required="required">
                          <span class="axstrisx">*</span>
                      </div>
                      <!-- End Password  field -->
                      <!-- Start mail name field -->
                    <i class="fa-solid fa-envelope icons"></i>
                      <div class="form-group">
                        <input
                              class="form-control"
                              type="email"
                              name="email"
                              placeholder="<?php echo lang('      Please Type a valid email') ?>"
                              value=""
                              required="required">
                              <span class="axstrisx">*</span>
                      </div>
                      <!-- End mail name field -->
                      <!-- Start Fullname  field -->
                    <i class="fa-solid fa-user-group icons"></i>
                      <div class="form-group">
                        <input
                          class="form-control"
                          type="text"
                          name="fullname"
                          placeholder="<?php echo lang('      Type your fullname... ') ?>"
                          value=""
                          required="required">
                          <span class="axstrisx">*</span>
                      </div>
                      <!-- End avatar  field -->
                    <i class="fa-solid fa-photo icons"></i>
                    <div class="form-group">
                        <input
                                class="form-control"
                                type="file"
                                name="avatar"
                                placeholder=""
                                value=""
                                required="required"
                        <span class="axstrisx">*</span>
                    </div>
                    <!-- End avatar  field -->
                      <!-- Start Save  field -->
                      <input
                      class="btn btn-success btn-block"
                      type="submit"
                      value="<?php echo lang('Save') ?>">
                      <!-- End Save  field -->
                    </form>
              </div><!--End Add Form-->
          <?php }
    elseif($do == "Insert"){//Start Insert page... ?>
          <h1 class="text-center"><?php echo lang("INSERTMEMBER")?></h1>
            <?php
              if($_SERVER['REQUEST_METHOD'] == 'POST'){


                  $avatarName = $_FILES['avatar']['name'] ;
                  $avatarSize = $_FILES['avatar']['size'] ;
                  $avatarType = $_FILES['avatar']['type'] ;
                  $avatarTmp = $_FILES['avatar']['tmp_name'] ;

                  $avatarAllowdExtension =   array('jpeg' , 'jpg' , 'png' , 'gif');

                  $array = explode('.', $avatarName);
                  $avatarExtension = strtolower(end($array));

                  //Get  Variables from the from....

                    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);

                    $email = filter_var($_POST ['email'],FILTER_SANITIZE_EMAIL);

                    $full  = filter_var($_POST['fullname'],FILTER_SANITIZE_STRING);

                    $pass = sha1($_POST['newpassword']);

                //Start Check the data sent....
                //Creatinh Array of errors
                $formNameError = array() ;
                if(empty($user)){
                $formNameError[] =  lang('Username Cant Be <strong>Empty</strong>..!');
                }
                    if(strlen($user) < 3 ){
                $formNameError[] = lang('Username Nust  be Lareger Than <strong>3</strong> Characters..!');
                }
                 if(strlen($pass) < 2  ){
                $formNameError[] = lang('cellnumper Nust be Larger Then <strong>2</strong> Numper..!');
                }
                if(empty($pass)){
                   $formNameError[] = lang('Password Cant Be <strong>Empty</strong>..!');
                 }
                if(empty($full) ){
                  $formNameError[] = lang('Fullname Cant Be <strong>Empty</strong>..!');
                }
                if(strlen($full) <= 1 ){
                  $formNameError[] = lang('Message Nust be Lareger Then  <strong> 1</strong> Characters..!');
                }
                if (!empty($avatarName) && ! in_array($avatarExtension , $avatarAllowdExtension)){
                    $formNameError[] = lang('The image format is invalid');
                }
                if (empty($avatarName)){
                   $formNameError[] = lang('Avatar Cant Be <strong>Empty</strong>..!');//1  (MB) = 1024  (KB)  1  (MB) = 1024  (KB)
                }
                if($avatarSize >= ((4*1024)*1024)){

                    $formNameError[] = lang('Image size cannot be greater than <strong>4MB </strong>..!');
                }


                if( ! empty($formNameError)) {

                  echo  '<div class="alert alert-danger" role="alert">';
                      foreach($formNameError as $errors){
                          echo $errors. '<br>';
                      }
                  echo '</div>';
                 }
                    //End Error checking the data sent...!
                    //If there are no errors, perform the Insert process
                else{
                    $avatar = rand(0 , 1000000) . '_' . $avatarName ;
                    // mkdir("uploads/avatars" ,0777);

                    move_uploaded_file($avatarTmp , "uploads\avatars\\".$avatar);


                //Checking whether the entered name exists in the database or not for funcation
                  $check = chekitem("Username" ,"users", $user );
                  if( $check == 1 ){
                        echo '<div class="container">' ;
                              $page_adress = 'members.php?do=Add';
                              $themesg ='<div class="alert alert-danger">Sorry This username already exists...!</div>';
                              redirect_home($themesg, 2,$page_adress);
                        echo '</div>' ;
                    }
                  else{
                    //Update the  database with This Information
                    $stetment = $connection->prepare("INSERT INTO  users ( Username , Email  , Fullname , Password , Date ,avatar ) VALUES( :insert_user , :insert_email  , :insert_full , :insert_pass , NOW() ,:insert_avatar ) ");
                    $stetment->execute(array(
                      'insert_user'    =>  $user, // add to array key and value...
                      'insert_email'   => $email,
                      'insert_full'    => $full,
                      'insert_pass'    => $pass,
                      'insert_avatar'    => $avatar

                    ));
                    //End Update the  database with This Information
                    //When the Update operation succeeds, this sentence will be printed

                        echo '<div class="container">' ;
                          $themesg     ='<div class=" alert alert-info">'.$stetment->rowCount() . lang('Record updated...').'</div>' ;
                          $page_adress = 'members.php';
                          redirect_home($themesg,2,$page_adress);
                        echo '</div>';
                  }
                }
            }else{ // error page
              header('Location:members.php');
              exit();
            }
        }//End Insert page.
    elseif($do == "Edit"){  //Edit page

          // Chek if  Get Request is numaric & Get the integer value of it

          $userid = isset($_GET['ID'])&& is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0 ;

          //Select all data Depend On this ID

          $stetment = $connection->prepare("SELECT *  FROM users  WHERE UserID = ?");

          //Execute query

          $stetment ->execute(array($userid));

          //If the entered data exists, it will be stored here/ Fetch the data

          $row = $stetment->fetch();

          //The Row Count
          $count = $stetment->rowcount();

          if($count > 0) { ?>

              <!--start Edit Form-->
              <div class="continyer">
                  <h1 class="text-center"><?php echo lang("EditMemper")?></h1>
                  <form class="contact-form" action="<?php echo "?do=Update" ?>" method="POST">
                        <!-- Start user name field -->
                        <i class="fa-solid fa-user icons"></i>
                        <input type="hidden" name="userid" value="<?php echo $userid ; ?>">
                        <div class="form-group">
                          <input
                            class="form-control"
                            type="text"
                            name="username"
                            placeholder="Type your iser name "
                            value="<?php echo '     '.$row['Username'] ; ?>">
                            <span class="axstrisx">*</span>
                        </div>
                        <!-- End username field -->
                        <!-- Start Password  field -->
                        <i class="fa-solid fa-lock icons"></i>
                        <div class="form-group">
                        <input
                            class="form-control"
                            type="hidden"
                            name="oldpassword"
                            value="<?php echo '     '.$row["Password"] ;?>">
                          <input
                            class="form-control"
                            type="password"
                            name="newpassword"
                            placeholder="<?php echo lang('   Type Your New Password... ') ?>"
                            value="">
                        </div>
                        <!-- End Password  field -->
                        <!-- Start mail name field -->
                        <i class="fa-solid fa-envelope icons"></i>
                        <div class="form-group">
                          <input
                                class="form-control"
                                type="email"
                                name="email"
                                placeholder="      Please Type a valid email"
                                value="<?php echo $row['Email'];?>">
                                <span class="axstrisx">*</span>
                        </div>
                        <!-- End mail name field -->
                        <!-- Start Fullname  field -->
                        <i class="fa-solid fa-user-group icons"></i>
                        <div class="form-group">
                          <input
                            class="form-control"
                            type="text"
                            name="fullname"
                            placeholder="      Type your fullname... "
                            value="<?php echo '     '.$row['Fullname'] ; ?>">
                            <span class="axstrisx">*</span>
                        </div>
                        <!-- End Fullname  field -->
                        <!-- Start Save  field -->
                        <input
                        class="btn btn-success btn-block"
                        type="submit"
                        value="Save">
                        <!-- End Save  field -->
                      </form>
              </div>
          <!--End Form-->
          <?php }
          else{//Enter a user ID that does not exist
                $errormsg = "Sorry You Enter a user ID that does not exist";
                redirect_home($errormsg);
              }
    }elseif($do == "Update"){// Start The Update page....

        echo      "<h1 class='text-center'>". lang("EditMemper")."</h1>";

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

          //Get  Variabels from the from....
          $userid     = $_POST['userid'];

          $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);

          $email = filter_var($_POST ['email'],FILTER_SANITIZE_EMAIL);

          $full  = filter_var($_POST['fullname'],FILTER_SANITIZE_STRING);

          //The password Trik....
          // if condition....
          $pass = empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : sha1($_POST['newpassword']);

          //Start Check the data sent....
              //Creatinh Array of errors
              $formNameError = array() ;

              if(empty($user)){

                $formNameError[] = "Username Cant Be Empty..!";

              }
              if(strlen($user) < 3 ){

                $formNameError[] = "Username Nust  be Lareger Than <strong>5</strong> Characters..!";

              }
              if(strlen($pass) < 2  ){

                $formNameError[] = "cellnumper Nust be Larger Then <strong>8</strong> Numper..!";

              }
              if(empty($full) ){

                $formNameError[] = "Fullname Cant Be Empty..!";

              }
              if(strlen($full) <= 1 ){

                $formNameError[] = "Message Nust be Lareger Then  <strong> 10</strong> Characters..!";

              }
              if( ! empty($formNameError)) { ?>

                  <div class="alert alert-danger" role="alert">

                    <?php
                          // header('Location:members.php?do=Edit&ID=?');
                          foreach($formNameError as $errors){
                            echo $errors. '<br>';
                          }
                      ?>
                  </div>
            <?php }
          //End Error checking the data sent...!
          //If there are no errors, perform the update process
            else{
                $stetment = $connection->prepare("SELECT  *
                                                        FROM users
                                                        WHERE Username = ?
                                                        AND UserID != ?");
                $stetment->execute(array($user ,$userid));
                $count = $stetment->rowCount();
                if ($count > 0){
                    $themesg='<div class="alert alert-danger">Sorry Invalid username...!</div>';
                    $page_adress = 'members.php';
                    redirect_home($themesg,2,$page_adress);
                    echo '</div>';
                }else{

                    //Update the  database with This Information
                    $stetment = $connection->prepare("UPDATE users SET Username = ? , Email = ? , Fullname = ? , Password = ? WHERE UserID = ?");
                    $stetment->execute(array($user,$email,$full,$pass,$userid));
                    echo '<div class="container">' ;
                    $themesg     ='<div class=" alert alert-info">'.$stetment->rowCount() . lang('Record updated...').'</div>' ;
                    $page_adress = 'members.php';
                    redirect_home($themesg,2,$page_adress);
                    echo '</div>';
                }
            }
        }else{ // error page
          $errormsg = "Sorry You Cant Browse Tihs Page Directry";
          redirect_home($errormsg);
        }
        //End Update page
    }elseif ($do == 'Delete'){
            // Chek if  Get Request is numeric & Get the integer value of it
            $userid = isset($_GET['ID'])&& is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0 ;

            $chek = chekitem('UserID' , 'users' , $userid);

              if($chek > 0 ){

                $stetment = $connection->prepare("DELETE FROM users WHERE UserID = ?");
                $stetment ->execute(array($userid));
                // Redirect to another page
                  echo '<div class="container">' ;
                    $page_adress = 'members.php';
                    $themesg ='<div class="alert alert-info">'.lang('The deletion was completed successfully...!').'</div>';
                    redirect_home($themesg,1,$page_adress);
                  echo '</div>' ;
              }
              else{
                echo '<div class="container">' ;
                  $page_adress = 'members.php';
                  $themesg ='<div class="alert alert-danger">This user does not exist...!</div>';
                  redirect_home($themesg,1,$page_adress);
                echo '</div>' ;
              }
    }elseif ($do == "activate"){ //start User activation page

      // Chek if  Get Request is numeric & Get the integer value of it
      $userid = isset($_GET['ID'])&& is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0 ;
      //Verify that the user number exists IN database
      $chek =chekitem('UserID' , 'users' ,  $userid);
      if($chek > 0 ){
          $stetment=$connection->prepare("UPDATE users SET RegStatus = 1 WHERE UserID = ?");
          $stetment->execute(array($userid));
          // Redirect to another page
          echo '<div class="container">' ;

          $page_adress = 'members.php';

          $themesg ='<div class="alert alert-success">'.lang('Activation completed successfully...!').'</div>';

          redirect_home($themesg,1,$page_adress);

          echo '</div>' ;
      }else{

          echo '<div class="container">' ;
          $page_adress = 'members.php';
          $themesg ='<div class="alert alert-danger">'.lang('We do not have this user in our records...!').'</div>';
          redirect_home($themesg,1,$page_adress);
          echo '</div>' ;
      }

    }//End User activation page

      //End Delete  page...
      //End manage page...
     include $temp."footer.php";

  } else{
    header('Location:index.php'); // user is not admin  Around the index.php page 
    exit();
    }
  ?>