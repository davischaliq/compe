<?php
require_once '../app/init.php';
session_start();
?>
<?php
if (isset($_POST['submit'])) {
  // code...
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $cek = mysqli_escape_string($conn, $username);
  $qr = "SELECT * FROM users WHERE user = '$cek'";
  $ex = mysqli_query($conn, $qr);
  $result = mysqli_fetch_assoc($ex);
  if (sha1($pass) === $result['pass']) {
    // code...
    $_SESSION['user'] = $username;
    // var_dump($_SESSION['user']);
    header('Location:' . BASEURL);

  }else {
    header('Location:'.BASEURL.'regist/Signin.php?status=denied');
  }
}
 ?>
<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/custome-logo.png">
  <title>Sign In</title>
</head>
  <body class="text-center">
    <section class="form_popup">
  		<div class="login_form" id="login_form">
  		 	<div class="hd-lg">
  		 		<img class="mb-4" src="../assets/img/custome-logo-log.png" width="160" height="100">
  		 		  <span>Log into your account</span>
  		 	      </div><!--hd-lg end-->
  			        <div class="user-account-pr">
                  <?php if (isset($_GET['status']) && $_GET['status'] == 'denied'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Username Atau Password Anda Salah</strong> Mohon Untuk Masukan Username Dan Password yang valid.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>
  				     <form method="post">
  					<div class="input-sec">
  				<input type="text" name="username" placeholder="Username">
  			</div>
  		<div class="input-sec">
  			<input type="Password" name="password" placeholder="Password">
  				</div>
  					      <div class="input-sec mb-0">
  						  <button type="submit" name="submit">Login</button>
  					  </div><!--input-sec end-->
  				  </form>
  			</div><!--user-account end--->
  			<div class="fr-ps">
  				<h1>Don’t have an account? <a href="Signup.php" title="" class="show_signup">Signup here.</a></h1>
  			</div><!--fr-ps end-->
  		</div><!--login end--->

  	</section><!--form_popup end-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
