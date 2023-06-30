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
    else{

    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['login'])){

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
        }else{

            $username =  filter_var($_POST['user'] ,FILTER_SANITIZE_STRING);
            $password = $_POST['pass'];
            $password2 = $_POST['pass2'];
            $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
            $formErrors  =  array();
            if ($password !== $password2){

                $formErrors[] = "Sorry  password is not match...!";

            }
            if (strlen($username) < 3 or empty($username)){

                $formErrors[] = "Please fill in this field...!";

            }
            if (isset($password) && isset($password2)){

                $pass1 = sha1($password);
                $pass2 = sha1($password2);

            }if (filter_var($email,FILTER_VALIDATE_EMAIL) != true){

                $formErrors[] = "This Email Is Not valid..!!";
            }

        }
    }



?>
<div class="main-body">
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input
                        pattern=".{3,}"
                        title="The name of the user must be more than 4 Chars"
                        type="text"
                        name="user"
                        placeholder="User name"
                        required="">
                <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        required="">
                <input

                        pattern=".{8,16}"
                        title="The password must be between 8 and 16  Chars"
                        type="password"
                        name="pass"
                        placeholder="Password"
                        required="">
                <input
                        pattern=".{8,16}"
                        title="The password must be between 8 and 16  Chars"
                        type="password"
                        name="pass2"
                        placeholder="Type password again"
                        required="">
                <button class="login-button" name="Sign-up" >Sign up</button>
            </form>
        </div>
        <div class="login">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="user" placeholder="User name" required="">
                <input type="password" name="pass"  placeholder="Password" required="">
                <button class="login-button" name="login">Login</button>
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
<?php
    echo  '<div class="text-center tge-errors  ">';
        if (!empty($formErrors)){
            foreach ($formErrors as $error){
                echo   $error .'<br';
            }
        }
    echo  '</div>';
include $temp."footer.php"; ?>