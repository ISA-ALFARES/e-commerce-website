<?php
global $tpl, $connection, $items, $temp, $do;
ob_start();
session_start();
if (isset($_SESSION['user'])){
    $userIDs = $_SESSION['usrID'];
    $username = $_SESSION['user'];

    $pageTitle = 'Ödeme Sayfasi';
    include 'init.php';?>

    <body>
    <div class="container-order mt-3">
        <h1 class="text-center">Ödeme Sayfası</h1>
        <div class="row">
            <div class="col">
                <form action="process_payment.php" method="post">
                    <div class="form-group">
                        <label for="name">Tam İsim:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="card-number">Kredi Kartı Numarası:</label>
                        <input type="text" id="card-number" name="card-number" required>
                    </div>
                </form>
            </div>
            <div class="col">
                <form action="process_payment.php" method="post">
                    <div class="form-group">
                        <label for="expiry-date">Son Kullanma Tarihi:</label>
                        <input type="text" id="expiry-date" name="expiry-date" required>
                    </div>

                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Ödemeyi Onayla">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
}else{
    echo "giriş yapmalisiniz...!!";
}
//print_r($_SESSION);
include $temp."footer.php";
ob_end_flush();

