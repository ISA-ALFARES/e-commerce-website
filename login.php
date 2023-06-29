<?php
global $connection;
session_start();
global $temp;
include  "init.php";
$no_navbar =''; //On the login (index.php) page, the navbar should not appear;
$page_title = 'LOGIN';

    if (isset($_SESSION['user'])){

        header('Location: index.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $hashedpass = sha1($password);

        $statement=$connection->prepare("SELECT Username , Password 
                                               FROM 
                                                   users 
                                               WHERE 
                                                   Username = ? 
                                               AND Password = ?");
        $statement->execute(array($username,$hashedpass));

        $statement->fetch();

        $count = $statement->rowCount();

        if ($count > 0){

            $_SESSION['user'] = $username ;
            header("Location: index.php");
            exit();
        }else{
            header('Location: login.php');
            exit();
        }

    }

?>
<div class="main-body">
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pass" placeholder="Password" required="">
                <button class="login-button" >Sign up</button>
            </form>
        </div>
        <div class="login">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="user" placeholder="User name" required="">
                <input type="password" name="pass"  placeholder="Password" required="">
                <button class="login-button">Login</button>
            </form>
            <div class="social-login">
                <h3>log in via</h3>
                <div class="social-icons">
                    <a href="#" class="social-login__icon fab fa-instagram"></a>
                    <a href="#" class="social-login__icon fab fa-facebook"></a>
                    <a href="#" class="social-login__icon fab fa-twitter"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<?php include $temp."footer.php"; ?>