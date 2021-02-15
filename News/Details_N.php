<?php require_once '../app/init.php';?>
<?php
session_start();
if (isset($_GET['Set_One'])) {
  // code...
  $params = $_GET['Set_One'];
  $cek = mysqli_escape_string($conn, $params);
  $query = "SELECT id_post FROM news WHERE id_post = '$cek'";
  $sess = mysqli_query($conn, $query);
  $cekk = mysqli_fetch_assoc($sess);
  if (isset($params) == $cekk) {
    // code...
    $qr = "SELECT * FROM news WHERE id_post = '$cek'";
    $row = mysqli_query($conn, $qr);
    $row = mysqli_fetch_assoc($row);
  }else {
    require_once '../app/errorpage.php';
    return false;
  }
}else {
  // code...
  require_once '../app/errorpage.php';
  return false;
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="seo & digital marketing">
     <meta name="keywords" content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company">
     <meta name="author" content="Themefisher.com">
     <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/custome-logo.png">
    <title>Perum Produksi Film Negara</title>
     <!-- bootstrap.min css -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- custome css -->
     <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/main.css">
 </head>
 <body>
   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark" style="background-color: #1f2833;">
     <a class="navbar-brand my-0 mr-md-auto" href="#">
       <img src="<?= BASEURL; ?>assets/img/custome-logo.png" width="120" height="65" class="d-inline-block align-top" alt="" loading="lazy">
           </a>
         <nav class="my-2 my-md-0 mr-md-3">
           <a class="p-2 text-white" href="<?= BASEURL; ?>">Home</a>
           <a class="p-2 text-white" href="<?= BASEURL; ?>Movie/index.php">Movie</a>
           <a class="p-2 text-white" href="<?= BASEURL; ?>News/index.php">News</a>
         </nav>
       <?php if (isset($_SESSION['user'])) { ?>
   <div class="dropdown dropleft">
 <button type="button" class="btn btn-outline-info rounded-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class="fas fa-user"></i>
     </button>
       <div class="dropdown-menu">
     <a class="dropdown-item" href="<?= BASEURL; ?>Dashboard/index.php">My Account</a>
   </div>
 </div>
   <?php }else{ ?>
   <a class="btn btn-outline-info regist" href="<?= BASEURL; ?>regist/Signin.php">SignUp / SignIn</a>
 <?php } ?>
     </div>

  <div class="container">
    <div class="row content1">
      <h1><?= $row['judul']; ?></h1>
        <hr class="horizontal" size="20" width="100%" align="left" >
      </div>
      <div class="row mt-5">
        <img src="<?= BASEURL; ?>app/core/view_image.php?id_N=<?= $row['id_post']; ?>" class="rounded w-100 float-left" alt="...">
          <div class="text-left mt-5">
          <p><?= $row['content']; ?></p>
      </div>
    </div>
  </div>

<?php require_once '../app/views/templates/footer.php'; ?>
