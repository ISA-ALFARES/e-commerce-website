<?php
global $temp, $connection;
session_start();
    $no_navbar ='';//Giriş (index.php) sayfasında gezinme çubuğu görünmemeli
    $page_title = 'LOGIN';
    //Kullanıcı zaten oturum açmışsa, onları uygun sayfaya yönlendirin
    if (isset($_SESSION['username'])) {
      header('Location: dashboard.php');
      exit;
  }
    include    "init.php"; 
  ?>
  <?php
        //Kullanıcının http gönderi isteğinden gelip gelmediğini kontrol edin...
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $hashedpass = sha1($password); //Şifre şifreleme

         //kullanıcının veritabanlarında var olup olmadığını kontrol edin
        $stetment =  $connection->prepare("SELECT
                          UserID , 
                          Username,
                          Email,
                          Password 
                          FROM users 
                          WHERE Username = ? 
                          AND Password = ?
                          or Email = ?
                          AND GroubID = 1 
                          ");
        //kullanıcı tarafından girilen verileri çalıştır
        $stetment ->execute(array($username,$hashedpass,$username));
        //Girilen veriler varsa $row saklanacaktır.
        $row = $stetment->fetch();
        $count = $stetment->rowcount();                              
        

        if($count > 0 ){ //eğer say > 0 ise veritabanı bununla ilgili kayıt yapıyor demektir

          $_SESSION['Username'] =$username ;//oturum adını kaydet...

          $_SESSION['ID'] =$row['UserID'] ;//oturum adını kaydet...

          header('Location: dashbord.php');//dashbord sayfasına yönlendir...

          exit(); //finish the programme...
        }
        //else Kullanıcı adı veya şifre yanlış
        else{
            echo  $php_errormsg = "The username or password is incorrect";
        }
      }
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="layout/css/login.css" >
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                <label for="chk" aria-hidden="true"><?php echo lang('Login') ?></label>
                <input type="text"      name="user"      placeholder="<?php echo lang('User name') ?>" required="">
                <input type="password" name="pass"  placeholder="<?php echo lang('Password') ?>" required="">
                <button><?php echo lang('Login') ?></button>
            </form>
            <div class="social-login">
                <h3><?php echo lang('log in via') ?></h3>
                <div class="social-icons">
                    <a href="#" class="social-login__icon fab fa-instagram"></a>
                    <a href="#" class="social-login__icon fab fa-facebook"></a>
                    <a href="#" class="social-login__icon fab fa-twitter"></a>
                </div>
            </div>
        </div>

	</div>
<!-- partial -->
 <?php include $temp."footer.php"; ?>
