<?php global$temp;?>
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
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pass" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>
			<div class="login">
        <form action="<?php echo 'index.php'  ?>" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="user" placeholder="User name" required="">
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