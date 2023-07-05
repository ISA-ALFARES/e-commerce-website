<?php
/*
============================================================
========Manage memper page
======== This page you Can Add/Edit.Delete Member From here=
=============================================================
*/
global $connection, $temp, $do;
session_start();

if(isset($_SESSION['user'])  ){

    $page_title = 'Address'; // The page name

    include 'init.php';     //Bu dosyada, projedeki gerekli tüm dosyaları dahil ediyoruz ve bunları bir kez çağırıyoruz, örneğin başlık dosyası

    $do = isset($_GET['do']) ? $_GET['do']  : 'Mangae';   //başla manage sayfasi...
    if($do== "Mangae"){


    }elseif($do== "Add"){?>
        <!--Form Ekleme sayfası Başlat-->
        <div class="continyer">
            <h1 class="text-center"><?php echo lang("ADDADDRESS")?></h1> <!--//sayfa adi-->
            <form class="contact-form" action="<?php echo "?do=Insert" ?>" method="POST"  enctype="multipart/form-data">
                <!-- Start    -->
                <div class="form-group">
                    <input
                        class="form-control"
                        type="text"
                        name="Sokak"
                        placeholder="Sokak no "
                        value=""
                        required="required">
                    <span class="axstrisx">*</span>
                </div>
                <!-- End    -->
                <!-- Start    -->
                <div class="form-group">
                    <input
                        class="form-control"
                        type="text"
                        name="ilçe"
                        placeholder="'ilçe!"
                        value=""
                        required="required">
                    <span class="axstrisx">*</span>
                </div>
                <!-- End    -->
                <!-- Start    -->
                <div class="form-group">
                    <input
                        class="form-control"
                        type="text"
                        name="il"
                        placeholder="il"
                        value=""
                        required="required">
                    <span class="axstrisx">*</span>
                </div>
                <!-- End    -->
                <!-- Start    -->
                <div class="form-group">
                    <input
                        class="form-control"
                        type="text"
                        name="Posta"
                        placeholder="Posta Code"
                        value=""
                        required="required">
                    <span class="axstrisx">*</span>
                </div>
                <!-- End    -->
                <!-- Start    -->
                <div class="form-group">
                    <input
                        class="form-control"
                        type="text"
                        name="Telefon"
                        placeholder="Telefon"
                        value=""
                        required="required">
                    <span class="axstrisx">*</span>
                </div>
                <!-- End    -->
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
        <h1 class="text-center"><?php echo lang("INSERTADDRES")?></h1>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){




            //Get  Variables from the from....

            $sokak = filter_var($_POST ['Sokak'],FILTER_SANITIZE_STRING);
            $ilce  = filter_var($_POST['ilçe'],FILTER_SANITIZE_STRING);
            $il  = filter_var($_POST['il'],FILTER_SANITIZE_STRING);
            $posta  = filter_var($_POST['Posta'],FILTER_SANITIZE_STRING);
            $telefon  = filter_var($_POST['Telefon'],FILTER_SANITIZE_STRING);
            $formNameError = array() ;


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

                //Checking whether the entered name exists in the database or not for funcation

                    //Update the  database with This Information
                    $stetment = $connection->prepare("INSERT INTO  addresses ( Street , City , Country, Posta_code ,Phone ) VALUES( :insert_sokak , :insert_ilce  , :insert_il , :insert_posta , :insert_telefon ) ");
                    $stetment->execute(array(
                        'insert_sokak'      => $sokak,
                        'insert_ilce'       => $ilce,
                        'insert_il'         => $il,
                        'insert_posta'      => $posta,
                        'insert_telefon'    => $telefon

                    ));
                    //End Update the  database with This Information
                    //When the Update operation succeeds, this sentence will be printed

                    echo '<div class="container">' ;
                    echo '<div class=" alert alert-info">'.$stetment->rowCount() .'Record updated...</div>' ;
                    echo '</div>';

            }
        }else{ // error page
            header('Location:members.php');
            exit();
        }
    }
    //End Insert page.


    //Son Kullanıcı aktivasyon sayfası
    //Silme sayfasını sonlandır...
    //Yönetim sayfasını sonlandırın...
    include $temp."footer.php";

} else{
    header('Location:index.php'); // kullanıcı admin değil index.php sayfası etrafında
    exit();
}
?>