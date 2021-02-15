<?php require_once 'app/init.php';?>
<?php
session_start();
// $qrNews = "SELECT id, judul, tgl FROM news ORDER BY tgl LIMIT 3";
$qrNews = "SELECT id, id_post, judul, tgl FROM news ORDER BY id DESC LIMIT 3";
$NewsR = mysqli_query($conn, $qrNews);
$qrMovie = "SELECT id, id_post, judul, sinopsis FROM movie ORDER BY id DESC LIMIT 1";
$MovieR = mysqli_query($conn, $qrMovie);
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
    <title>DavDc Production</title>
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
     <a class="dropdown-item" href="Dashboard/index.php">My Account</a>
   </div>
 </div>

   <?php }else{ ?>
   <a class="btn btn-outline-info regist" href="<?= BASEURL; ?>regist/Signin.php">SignUp / SignIn</a>
 <?php } ?>

     </div>

  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= BASEURL; ?>assets/img/endgame.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>DavDc Production</h5>
            <p>Selamat Datang Di Website Kami</p>
            <p>Kami Hadir Untuk Mewujudkan Ide Creative Anda Menjadi Sebuah Film.</p>
          </div>
        </div>
      <div class="carousel-item">
    <img src="<?= BASEURL; ?>assets/img/Jumanji2.jpg" class="d-block w-100" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div> -->
    </div>
      <div class="carousel-item">
        <img src="<?= BASEURL; ?>assets/img/The-counjuring.jpg" class="d-block w-100" alt="...">
          <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div> -->
      </div>
    </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container-fluid">

    <div class="row content1 mb-4 ml-2">
      <h3>NEWS</h3>
    </div>
    <div class="row">
      <?php $ID = "Html";
        $no = 1;
      ?>
      <?php
      while ($news = mysqli_fetch_assoc($NewsR)):
        ?>
        <?php
          $no++;
         ?>
      <div class="col-lg-4">
        <dt class="news" style="margin: 5px;">
          <div class="row content-news">
          <img src="<?= BASEURL; ?>app/core/view_image.php?id_N=<?= $news['id_post']; ?>" class="img-fluid" data-toggle="collapse" href="#<?= $ID . $no; ?>" alt="Responsive image">
          <div class="card mb-3 collapse" id="<?= $ID . $no; ?>" style="width: 560px;">
            <div class="row no-gutters">
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title"><a href="<?= BASEURL; ?>News/Details_N.php?Set_One=<?= $news['id_post']; ?>" class="text-dark"><?= $news['judul']; ?></a></h5>
                  <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                  <p class="card-text"><small class="text-muted"><?=$news['tgl'];?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </dt>
    </div>
  <?php
 endwhile;
   ?>
  </div>
<div class="row mt-5 ml-2">
  <a class="btn btn-outline-info" href="<?= BASEURL; ?>News">See more</a>
  <!-- <button type="button" class="btn btn-outline-info">See more</button> -->
    </div>
  </div>

    <div class="container-fluid">
      <div class="row content1">
        <dt class="col mt-3 garis-new"><hr class="horizontal" size="20" width="85%" align="left" ></dt>
          <dd class="col"><h1 class="new-title">New Movie Realised</h1></dd>
          </div>
          <?php while ($movieRealised = mysqli_fetch_assoc($MovieR)): ?>
        <div class="row mt-5">
          <div class="container-fluid">
            <div class="col-lg-6 img-new float-left">
              <img src="<?= BASEURL; ?>app/core/view_image.php?id_M=<?= $movieRealised['id_post']; ?>" class="img-fluid ml-5" alt="Responsive image">
                </div>
                  <div class="row">
                    <div class="col hr-sub-new">
                      <hr class="horizontal" size="20" width="100%" align="right" >
                        </div>
                          </div>
                        <div class="col-lg-6 narasi float-right">
                      <h3><?= $movieRealised['judul']; ?></h3>
                    <p><?= $movieRealised['sinopsis']; ?></p>
                <a class="btn btn-outline-info" href="<?= BASEURL; ?>Movie/M_Details.php?Set_One=<?= $movieRealised['id_post']; ?>" role="button">See More</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

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
            <dd class="col"><h1 class="new-title">Film Funding</h1></dd>
              </div>
                <div class="row mt-5">
                  <div class="container-fluid">
                <div class="col-lg-6 img-new float-left">
              <img src="<?= BASEURL; ?>assets/img/Film Funding/poster.jpg" class="img-fluid ml-5" alt="Responsive image">
            </div>
          <div class="row">
        <div class="col hr-sub-new">
      <hr class="horizontal" size="20" width="100%" align="right" >
    </div>
      </div>
        <div class="col-lg-6 narasi float-right">
          <h3>Punya Ide tapi gak punya biaya bikin film ?</h3>
            <p>Untuk Kalian yang mempunyai ide creative untuk membuat film bisa coba untuk mengajukan ide anda di kepada kami jika ide anda bagus dan layak untuk di jadikan sebuah film kami akan membantu anda untuk mewujudkan ide anda menjadi sebuah film dengan berkerja sama dengan kami dan juga dengan company lain yang dapat mewujudkan ide anda menjadi sebuah dilm yang dapat mendidik dan menghibur masyarakat semua.</p>
        <!-- <button type="button" class="btn btn-outline-info">See more</button> -->
        </div>
      </div>
    </div>
        </div>
<?php require_once 'app/views/templates/footer.php'; ?>
