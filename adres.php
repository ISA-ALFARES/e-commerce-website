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
    global $userID;
    $userID=$_SESSION['usrID'];

    $page_title = 'Address'; // The page name

    include 'init.php';     //Bu dosyada, projedeki gerekli tüm dosyaları dahil ediyoruz ve bunları bir kez çağırıyoruz, örneğin başlık dosyası
    print_r($_SESSION)  ;
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
                            name="ad"
                            placeholder="ad ve soyadınız giriniz.."
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
                            name="telefon"
                            placeholder="Telefon "
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
                            name="ilce"
                            placeholder="ilçe!"
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
                            name="mahalle"
                            placeholder="Mahalle!"
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
                        name="sokak"
                        placeholder="Sokak "
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
                        name="posta"
                        placeholder="Posta Code"
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

            $ad             = filter_var($_POST ['ad'],     FILTER_SANITIZE_STRING);
            $telefon        = filter_var($_POST ['telefon'],FILTER_SANITIZE_NUMBER_INT);
            $il             = filter_var($_POST ['il'],     FILTER_SANITIZE_STRING);
            $ilce           = filter_var($_POST ['ilce'],   FILTER_SANITIZE_STRING);
            $mahalle        = filter_var($_POST ['mahalle'],FILTER_SANITIZE_STRING);
            $sokak          = filter_var($_POST ['sokak']  );
            $posta          = filter_var($_POST ['posta'],  FILTER_SANITIZE_NUMBER_INT);


            $formNameError  = array() ;


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
                    $stetment = $connection->prepare("INSERT INTO  addresses ( Street,District,City,State,Posta_code	,RecipientPhone,RecipientName,User_id ) 
                                                            VALUES( :insert_sokak , :insert_mahalle  , :insert_il , :insert_ilce , :insert_posta, :insert_telefon, :insert_ad,:insert_user) ");
                    $stetment->execute(array(
                        'insert_sokak'           => $sokak,
                        'insert_mahalle'         => $mahalle,
                        'insert_il'              => $il,
                        'insert_ilce'            => $ilce,
                        'insert_posta'           => $posta,
                        'insert_telefon'         => $telefon,
                        'insert_ad'              => $ad,
                        'insert_user'            => $userID
                    ));
                    //End Update the  database with This Information
                    //When the Update operation succeeds, this sentence will be printed

                    echo '<div class="container">' ;
                    echo '<div class=" alert alert-info">'.$stetment->rowCount() .'Başarli bir şekılde adres eklenmişrit...</div>' ;
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