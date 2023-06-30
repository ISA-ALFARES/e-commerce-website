<?php
global $connection, $count;
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



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['login'])) {

                $username = $_POST['user'];
                $password = $_POST['pass'];
                $hashedpass = sha1($password);

                $statement = $connection->prepare("SELECT Username , Password 
                                                       FROM 
                                                           users 
                                                       WHERE 
                                                           Username = ? 
                                                       AND Password = ?");
                $statement->execute(array($username, $hashedpass));

                $statement->fetch();

                $count = $statement->rowCount();

                if ($count > 0) {

                    $_SESSION['user'] = $username;
                    header("Location: index.php");
                    exit();
                } else {
                    header('Location: login.php');
                    exit();
                }
            } else {

                $username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
                $password = $_POST['pass'];
                $password2 = $_POST['pass2'];
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $formErrors = array();
                if ($password !== $password2) {

                    $formErrors[] = "Sorry  password is not match...!";

                }
                if (strlen($username) < 3 or empty($username)) {

                    $formErrors[] = "Please fill in this field...!";

                }
                if (isset($password) && isset($password2)) {

                    $pass1 = sha1($password);
                    $pass2 = sha1($password2);

                }
                if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {

                    $formErrors[] = "This Email Is Not valid..!!";
                }
                chekNewUser('Username', 'users', '$username');
                if ($count == 0 && isset($_POST['SignUp'])) {

                    $newUSerstetment = $connection->prepare("INSERT INTO  users ( Username , Email , Password ,RegStatus, Date) VALUES( :insert_user , :insert_email  , :insert_pass ,RegStatus = 0 , NOW() ) ");
                    $newUSerstetment->execute(array(
                        'insert_user' => $username, // add to array key and value...
                        'insert_email' => $email,
                        'insert_pass' => $pass1

                    ));
                    $newUSercount = $newUSerstetment->rowCount();

                    if ($newUSercount > 0) {

                        $newUserMsg = "Congrats You  Now Registerd User";
                    } else {
                        $formErrors[] = "Sorry An unexpected error occurred..!!";
                    }
                } else {

                    $formErrors[] = "Sorry This User Exist..!!";

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
                        class="inputs"
                        pattern=".{3,}"
                        title="The name of the user must be more than 4 Chars"
                        type="text"
                        name="user"
                        placeholder="User name"
                        required="">
                <input
                        class="inputs"
                        type="email"
                        name="email"
                        placeholder="Email"
                        required="">
                <input

                        class="inputs"
                        pattern=".{4,16}"
                        title="The password must be between 4 and 16  Chars"
                        type="password"
                        name="pass"
                        placeholder="Password"
                        required="">
                <input
                        class="inputs"
                        pattern=".{4,16}"
                        title="The password must be between 4 and 16  Chars"
                        type="password"
                        name="pass2"
                        placeholder="Type password again"
                        required="">
                <button class="login-button" name="SignUp" >Sign up</button>
            </form>
        </div>
        <div class="login">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input  class="inputs" type="text" name="user" placeholder="User name" required="">
                <input  class="inputs" type="password" name="pass"  placeholder="Password" required="">
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
                echo  '<div class="error-msg text-center container ">'.$error.'</div>';
            }
        }
        if (isset($newUserMsg)){
            echo  '<div class="succes-msg text-center  container ">'.$newUserMsg.'</div>';

        }
    echo  '</div>';
include $temp."footer.php"; ?>