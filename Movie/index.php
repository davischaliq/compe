<?php require_once '../app/init.php';
session_start();
?>
<?php
$qrOncoming = "SELECT * FROM movieoncoming";
$Oncoming = mysqli_query($conn, $qrOncoming);
$qrMovie = "SELECT * FROM movie ORDER by id DESC";
$MovieL = mysqli_query($conn, $qrMovie);
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

   <title>Movie</title>
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

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= BASEURL; ?>assets/img/endgame.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= BASEURL; ?>assets/img/Jumanji2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= BASEURL; ?>assets/img/The-counjuring.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container-fluid">
  <div class="row content1">
    <dt class="col mt-3 garis-new"><hr class="horizontal" size="20" width="85%" align="left" ></dt>
      <dd class="col"><h1 class="new-title">ON COMING</h1></dd>
      </div>
      <?php while ($O = mysqli_fetch_assoc($Oncoming)) {?>
    <div class="row mt-5">
      <div class="container-fluid">
        <div class="col-lg-6 img-new float-left">
          <img src="<?= BASEURL; ?>app/core/view_image.php?id_MO=<?= $O['id']; ?>" class="img-fluid ml-5" alt="Responsive image">
            </div>
              <div class="row">
                <div class="col hr-sub-new">
                  <hr class="horizontal" size="20" width="100%" align="right" >
                    </div>
                      </div>
                    <div class="col-lg-6 narasi float-right">
                  <h3><?= $O['judul']; ?></h3>
                <p><?= $O['sinopsis']; ?></p>
              <a class="btn btn-outline-info" href="<?= BASEURL; ?>Movie/D_Oncoming.php?Set_One=<?= $O['id']; ?>" role="button">See More</a>
            </div>
          </div>
      </div>
    <?php } ?>
      <!-- content dipisahkan oleh quotes -->
      <div class="card content1 border-info" style="background-color: #45a29e; height: 200px">
        <div class="card-body">
          <blockquote class="blockquote mt-5 text-center text-white">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote>
        </div>
      </div>

      <div class="row content1">
        <dt class="col mt-3 garis-new"><hr class="horizontal" size="20" width="85%" align="left" ></dt>
          <dd class="col"><h1 class="new-title">MOVIE LIST</h1></dd>
          </div>
          <?php while ($L = mysqli_fetch_assoc($MovieL)) {?>
        <div class="row mt-5">
          <div class="container-fluid">
            <div class="col-lg-6 img-new float-left">
              <img src="<?= BASEURL; ?>app/core/view_image.php?id_M=<?= $L['id_post']; ?>" class="img-fluid ml-5" alt="Responsive image">
                </div>
                  <div class="row">
                    <div class="col hr-sub-new">
                      <hr class="horizontal" size="20" width="100%" align="right" >
                        </div>
                          </div>
                        <div class="col-lg-6 narasi float-right">
                      <h3><?= $L['judul']; ?></h3>
                    <p><?= $L['sinopsis']; ?></p>
                  <a class="btn btn-outline-info" href="<?= BASEURL; ?>Movie/M_Details.php?Set_One=<?= $L['id_post']; ?>" role="button">See More</a>
                </div>
              </div>
            </div>
          <?php }?>
          </div>
<?php require_once '../app/views/templates/footer.php'; ?>
