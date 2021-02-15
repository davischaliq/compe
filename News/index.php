<?php
session_start();
require_once '../app/init.php';
 ?>
 <?php
if (isset($_POST['submit'])) {
  if ($_POST['key'] != null) {
    // code...
    $key = htmlspecialchars($_POST['key']);
    // $key = $key);
    $key = mysqli_escape_string($conn, $key);
    $qr = "SELECT * FROM news WHERE judul LIKE '%$key%' OR content LIKE '%$key%'";
    $Oncoming = mysqli_query($conn, $qr);
  }
}else {
  $jumlahperhalaman = 2;
  $result = mysqli_query($conn, "SELECT * FROM news");
  $jumlahdata = mysqli_num_rows($result);

  $halaman = ceil($jumlahdata / $jumlahperhalaman);
  if (isset($_GET['P_'])) {
    // code...
    if ($_GET['P_'] == null) {
      // code...
      require_once '../app/errorpage.php';
      return false;
    }else {
      $halamanaktif = htmlspecialchars($_GET['P_']);
    }
  }else {
    // code...
    $halamanaktif = 1;
  }
  $awaldata = ( $jumlahperhalaman * $halamanaktif ) - $jumlahperhalaman;
  $jumlahperhalaman = mysqli_escape_string($conn, $jumlahperhalaman);
  $awaldata = mysqli_escape_string($conn, $awaldata);

  $qrOncoming = "SELECT * FROM news ORDER BY id DESC LIMIT $awaldata, $jumlahperhalaman";
  $Oncoming = mysqli_query($conn, $qrOncoming);
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
     <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/about.css">
     <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/responsive.css">
     <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/custome-logo.png">
     <title>News</title>
   </head>
   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark" style="background-color: #1f2833;">
     <a class="navbar-brand my-0 mr-md-auto" href="#">
       <img src="<?= BASEURL; ?>assets/img/custome-logo.png" width="120" height="65" class="d-inline-block align-top" alt="" loading="lazy">
           </a>
           <nav class="my-2 my-md-0 mr-md-3">
             <a class="p-2 text-white" href="<?= BASEURL; ?>">Home</a>
             <a class="p-2 text-white" href="<?= BASEURL; ?>Movie/index.php">Movie</a>
             <a class="p-2 text-white" href="<?= BASEURL; ?>News/index.php">News</a>
           </nav>
       <?php if (isset($_SESSION['user'])){ ?>
     <?php if (!is_null($_SESSION['user'])): ?>
   <div class="dropdown dropleft">
 <button type="button" class="btn btn-outline-info rounded-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class="fas fa-user"></i>
     </button>
       <div class="dropdown-menu">
         <a class="dropdown-item" href="<?= BASEURL; ?>Dashboard/index.php">My Account</a>
       </div>
     </div>
   <?php endif; ?>
 <?php }else{ ?>
   <a class="btn btn-outline-info regist" href="<?= BASEURL; ?>regist/Signin.php">SignUp / SignIn</a>
     <?php } ?>
   </div>
     <!--MAIN BANNER AREA START -->
   <div class="card bg-dark text-white text-center">
     <img src="<?= BASEURL; ?>assets/img/banner1.jpg" class="img-fluid" alt="Responsive image" style="opacity: 0.7;">
     <div class="card-img-overlay mt-5">
       <h1 class="card-title text-white mt-5">News</h1>
       <p class="card-text" style="font-size: 15px;">Selamat Datang, Untuk anda yang ingin mengetahui event dan berita terbaru di DavDc Production anda bisa cek di halaman ini.</p>
     </div>
   </div>
   <!--MAIN HEADER AREA END -->

<!-- Search bar -->
  <div class="container mt-5">
     <form class="form-row" method="post">
       <div class="col-md-11">
          <input type="text" name="key" class="form-control" id="inputPassword2" placeholder="Search Here">
        </div>
        <div class="col-md-1">
        <button type="submit" name="submit" class="btn btn-outline-info mt-1"><i class="fas fa-search" style="font-size: 25px;"></i></button>
      </div>
  </form>
</div>
    <!-- search bar end -->
<div class="container mt-5 mb-5">
<div class="overflow-wrapper">
<div class="col-sm-12">
<h2 class="page-heading"><span class="mr-2"><i class="fas fa-globe"></i></span>News</h2>
<?php while ($a = mysqli_fetch_assoc($Oncoming)) {?>
  <!-- News post article-->
    <div class="card mt-5">
      <img src="<?= BASEURL; ?>app/core/view_image.php?id_N=<?= $a['id_post']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><a href="<?= BASEURL; ?>News/Details_N.php?Set_One=<?= $a['id_post']; ?>" class="text-dark"><?= $a['judul']; ?></a></h5>
            </div>
          <div class="card-footer">
        <small class="text-muted"><?= $a['tgl']; ?></small>
        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
      </div>
    </div>
  <?php }?>
  </div>
</div>
<br>
<br>
<?php if (isset($_POST['submit'])): ?>

<?php else: ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-left ml-2">
      <?php if ( $halamanaktif > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?P_=<?= $halamanaktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
              <?php else: ?>
            <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
      <?php endif; ?>

      <?php for ($i=1; $i <= $halaman ; $i++) : ?>
        <?php if ($i == $halamanaktif): ?>
          <li class="page-item active"><a class="page-link" href="?P_=<?= $i; ?>"><?= $i; ?></a></li>
            <?php else: ?>
              <li class="page-item"><a class="page-link" href="?P_=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>

        <?php if ($halamanaktif < $halaman): ?>
          <li class="page-item">
            <a class="page-link" href="?P_=<?= $halamanaktif + 1; ?>">Next</a>
              </li>
            <?php else: ?>
          <li class="page-item disabled">
        <a class="page-link">Next</a>
      </li>
    <?php endif; ?>
  </ul>
    </nav>
<?php endif; ?>
    </div>
<?php require_once '../app/views/templates/footer.php'; ?>
