<?php require_once '../app/init.php';
session_start();
?>
<?php
if (isset($_GET['Set_One'])) {
  // code...
  $params = htmlspecialchars($_GET['Set_One']);
  $cek = mysqli_escape_string($conn, $params);
  $query = "SELECT id_post FROM movie WHERE id_post = '$cek'";
  $sess = mysqli_query($conn, $query);
  $cekk = mysqli_fetch_assoc($sess);
  if (isset($params) == $cekk) {
    // code...
    $qr = "SELECT * FROM movie WHERE id_post = '$cek'";
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

    <title><?= $row['judul']; ?></title>
     <!-- bootstrap.min css -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- custome css -->
     <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/main.css">
 </head>
 <body>
   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark" style="background-color: #1f2833;">
     <a class="navbar-brand my-0 mr-md-auto" href="<?= BASEURL; ?>">
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

<!-- content penuh -->
<div class="container-fluid">
  <div class="row content1">
    <dt class="col mt-3 garis-new"><hr class="horizontal" size="20" width="85%" align="left" ></dt>
      <dd class="col"><h1 class="new-title"><?= $row['judul']; ?></h1></dd>
    </div>
    <div class="row mt-5">
      <div class="container-fluid">
        <div class="col-lg-6 img-new float-left">
          <img src="<?= BASEURL; ?>app/core/view_image.php?id_M=<?= $row['id_post']; ?>" class="img-fluid ml-5" alt="Responsive image">
            </div>
              <div class="row">
                <div class="col hr-sub-new">
                  <hr class="horizontal" size="20" width="100%" align="right" >
                    </div>
                      </div>
                    <div class="col-lg-6 narasi float-right">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>PRODUSER : </strong><?= $row['produser']; ?></li>
                    <li class="list-group-item"><strong>SUTRADARA : </strong><?= $row['sutradara']; ?></li>
                    <li class="list-group-item"><strong>GENTRE : </strong><?= $row['gendre']; ?></li>
                    <li class="list-group-item"><strong>REALESED : </strong><?= $row['realised']; ?></li>
                    <li class="list-group-item"><strong>PEMAIN : </strong><?= $row['cast']; ?></li>
                    <li class="list-group-item">
                      <figure class="figure">
                        <a class="btn btn-primary" href="<?= $row['linkYT']; ?>" role="button" target="_blank"><i class="fas fa-play"></i></a>
                          <figcaption class="figure-caption">Trailer Sumber On Youtube</figcaption>
                      </figure>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="narasi content1">
                <h3>Sinopsis</h3>
              <p><?= $row['sinopsis']; ?></p>
            </div>
            </div>
          </div>
<?php require_once '../app/views/templates/footer.php'; ?>
