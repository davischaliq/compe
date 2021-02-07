<?php require_once '../app/init.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Sign Up</title>
  </head>
  <body class="text-center">
    <section class="form_popup">
  		<div class="signup_form" id="signup_form">
  		 	<div class="hd-lg">
          <img class="mb-4" src="../assets/img/custome-logo-log.png" width="160" height="100">
  		 	</div><!--hd-lg end-->
  			<div class="user-account-pr">
          <?php if (isset($_GET['status']) && $_GET['status'] == 'err'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Pasword yang anda masukan tidak sama</strong> Mohon Untuk Masukan Password yang valid.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Anda Telah Terdaftar</strong> Silahkan Anda Login.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
  				<form action="<?= BASEURL; ?>app/core/admin/regist.php" method="post">
            <div class="input-sec mgb25">
  						<input type="text" name="nama" placeholder="Your Full Name" required>
  					  </div>
  					<div class="input-sec mgb25">
  						<input type="text" name="username" placeholder="Username" required>
  						  <label>Letters A-Z or a-z , Numbers 0-9 and Underscores _</label>
  					      </div>
  					        <div class="input-sec">
  						     <input type="email" name="email" placeholder="Email address" required>
  					     </div>
                 <div class="input-sec">
                <input type="text" name="hp" placeholder="Phone Number" required>
              </div>
              <div class="input-sec">
             <input type="text" name="company" placeholder="Your Company" required>
           </div>
           <div class="input-sec">
          <input type="text" name="address" placeholder="Company Address" required>
        </div>
          <div class="row">
            <div class="col-md-5 mb-3 input-sec">
              <input type="text" class="form-control" name="country" placeholder="Negara" required>
                </div>
              <div class="col-md-4 mb-3 input-sec">
            <input type="text" class="form-control" name="state" placeholder="Kota/Kabupaten" required>
          </div>
        <div class="col-md-3 mb-3 input-sec">
          <input type="text" class="form-control" name="zip" placeholder="Kode Pos" required>
            </div>
              </div>
  					<div class="input-sec">
  				<input type="Password" name="password" placeholder="Password" required>
  			</div>
  		<div class="input-sec">
  	<input type="password" name="confirm-password" placeholder="Re-enter password" required>
  	 </div>
  		<div class="input-sec mb-0">
  			<button type="submit" name="submit" >Signup</button>
  				</div><!--input-sec end-->
  				</form>
  			<div class="form-text">
  		<p>By sIgning up you agree to Oren’s <a href="#" title="">Terms of Service</a> and <a href="#" title="">Privacy Policy</a> </p>
  	</div>
  		</div><!--user-account end--->
  			<div class="fr-ps">
  				<h1>Already have an account?<a href="Signin.php" title="" class="show_signup"> Login here.</a></h1>
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
