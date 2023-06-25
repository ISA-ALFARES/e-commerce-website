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

    $page_title = 'COMMENTS'; // The page name

    include 'init.php';     //In this file, we include all the necessary files in the project and call them once, such as the header file

    $do = isset($_GET['do']) ? $_GET['do']  : 'Mangae';   //Start manage page...
    if($do== "Mangae"){

        $stetment=$connection->prepare("SELECT comments.* ,items.Name AS Item_Name , users.Username AS username
                                              FROM comments
                                              INNER JOIN items
                                              ON items.Item_ID  = comments.item_id
                                              INNER JOIN users
                                              ON users.UserID  = comments.user_id 

                                              ");

        //execute the data entered by the user
        $stetment->execute();

        //Assign to variable...
        $comments = $stetment->fetchAll();
        ?>
        <div class="container">
            <div class="table-responsive">
                <h1 class="text-center"><?php echo lang("MANAGEMEMBER")?></h1>
                <table class="main-table text-center table text-white table-bordered border-danger ">
                    <tr>
                        <td>ID</td>
                        <td>Comment</td>
                        <td>Item Name</td>
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
                            echo "<td>" . $comment['Item_Name']   .  "</td>";
                            echo "<td>" . $comment['username']   . "</td>";
                            echo "<td>" . $comment['Comment_data']."</td>";
                            echo "<td>
                              <a class='btn btn-success' href='commetns.php?do=Edit&comment_id=".$comment['comment_ID']."' role='button'><i class='fa-solid fa-pen-to-square'> </i> Edit </a>
                              <a  href='commetns.php?do=Delete&comment_id=".$comment['comment_ID']."' role='button' class='btn btn-danger confirm' ><i class='fa-regular fa-trash-can'> </i> Delete </a>";
                            if($comment['Status'] == 0 ){

                                echo "<a  href='members.php?do=activate&ID=".$comment['comment_ID']."' role='button' class='btn btn-info confirm Activate' ><i class='fa-solid fa-circle-check''></i> Activate </a>";
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
    }//End Insert page.
    elseif($do == "Edit"){  //Edit page

        // Chek if  Get Request is numaric & Get the integer value of it

        $commentid = isset($_GET['comment_ID'])&& is_numeric($_GET['comment_ID']) ? intval($_GET['comment_ID']) : 0 ;

        //Select all data Depend On this ID

        $stetment = $connection->prepare("SELECT *  FROM comments  WHERE UserID = ?");

        //Execute query

        $stetment ->execute(array($commentid));

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
                    <input type="hidden" name="userid" value="<?php echo $commentid ; ?>">
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
                            placeholder="   Type Your New Password... "
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
                            value="<?php echo '&nbsp &nbsp &nbsp '.$row['Email'] ; ?>">
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
                //Update the  database with This Information
                $stetment = $connection->prepare("UPDATE users SET Username = ? , Email = ? , Fullname = ? , Password = ? WHERE UserID = ?");
                $stetment->execute(array($user,$email,$full,$pass,$userid));
                echo $stetment->rowCount()." Record updated...";
            }
        }else{ // error page
            $errormsg = "Sorry You Cant Browse Tihs Page Directry";
            redirect_home($errormsg);
        }
        //End Update page
    }elseif ($do == 'Delete'){
        // Chek if  Get Request is numeric & Get the integer value of it
        $commentid = isset($_GET['comment_id'])&& is_numeric($_GET['comment_id']) ? intval($_GET['comment_id']) : 0 ;

        $chek = chekitem('comment_Id' , 'commetns' , $commentid);

        if($chek > 0 ){

            $stetment = $connection->prepare("DELETE FROM commetns WHERE comment_ID = ?");
            $stetment ->execute(array($commentid));
            // Redirect to another page
            echo '<div class="container">' ;
            $page_adress = 'comments.php';
            $themesg ='<div class="alert alert-info">The deletion was completed successfully...!</div>';
            redirect_home($themesg,1,$page_adress);
            echo '</div>' ;
        }
        else{
            echo '<div class="container">' ;
            $page_adress = 'comments.php';
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

            $themesg ='<div class="alert alert-success">Activation completed successfully...!</div>';

            redirect_home($themesg,1,$page_adress);

            echo '</div>' ;
        }else{

            echo '<div class="container">' ;
            $page_adress = 'members.php';
            $themesg ='<div class="alert alert-danger">We do not have this user in our records...!</div>';
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