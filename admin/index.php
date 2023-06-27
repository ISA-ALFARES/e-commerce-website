<?php
global $temp, $connection;
session_start();
    $no_navbar =''; //On the login (index.php) page, the navbar should not appear
    $page_title = 'LOGIN';
    //If the user is already logged in, direct them to the appropriate page
    if (isset($_SESSION['username'])) {
      header('Location: dashboard.php');
      exit;
  }
    include    "init.php"; 
  ?>
  <?php
      //Check if user coming from http post request... 
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $hashedpass = sha1($password);

        //chek if the user exist in databases
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
        //execute the data entered by the user
        $stetment ->execute(array($username,$hashedpass,$username)); 
        //If the entered data exists, it will be stored here
        $row = $stetment->fetch();
        $count = $stetment->rowcount();                              
        
        //if count > 0 This mean the database record about this
        if($count > 0 ){

          $_SESSION['Username'] =$username ;  //Register Session name...

          $_SESSION['ID'] =$row['UserID'] ;   //Register Session ID...

          header('Location: dashbord.php');   //redirect to dashbord page...

          exit(); //finish the programme...
        }
        //else The username or password is incorrect
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
				<form>
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name"  required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>
			<div class="login">
        <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text"      name="user"      placeholder="User name" required="">
					<input type="password" name="pass"  placeholder="Password" required="">
					<button>Login</button>
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
<!-- partial -->
 <?php include $temp."footer.php"; ?>
