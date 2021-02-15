<?php require_once '../app/init.php';
session_start();
?>
<?php
if (isset($_SESSION['user'])) {
  // CEK SESSION USER JIKA ADA LANJUT CEK ISI SESSION USER
  if (!is_null($_SESSION['user'])) {
    // CEK SESSION USER TIDAKKOSONG JIKA TIDAK KOSONG LANJUT CEK PARAMETER SET_ONE
    if (isset($_GET['Set_One'])) {
      // CEK ADA APA GAK Set_One JIKA ADA LANJUT CEK KESAMAAN PARAMETER DENGAN DATABASE
      $params = htmlspecialchars($_GET['Set_One']);
      $cek = mysqli_escape_string($conn, $params);
      $qrOncoming = "SELECT id FROM movieoncoming WHERE id = '$cek'";
      $ex = mysqli_query($conn, $qrOncoming);
      $result = mysqli_fetch_assoc($ex);
      // MENCOCOKAN PARAMETER Set_One DENGAN DATABASE JIKA COCOK LANJUTKAN PROSESS TAMPIL DATA
      if (isset($params) == $result) {
        $qrOncoming = "SELECT id_film, total, status FROM transaksi WHERE id_film = '$cek' AND status = 'settlement'";
        $ex = mysqli_query($conn, $qrOncoming);
        $total = 0;
        while ($result = mysqli_fetch_assoc($ex)) {
          $total += $result['total'];
        }
        mysqli_query($conn, "UPDATE movieoncoming SET anggaran_T = '$total' WHERE id = '$cek'");

        $cekk = mysqli_query($conn, "SELECT * FROM movieoncoming WHERE id = '$params'");
      }else {
        // KONDISI SALAH JIKA SET_ONE TIDAK SAMA
        require_once '../app/errorpage.php';
        return false;
        // END CEK PENCOCOKAN SET_ONE
      }
      // END CEK GET_ONE
    }else {
      // KONDISI SALAH JIKA SET_ONE TIDAK ADA
      require_once '../app/errorpage.php';
      return false;
    }
    // end condisi cek sess user tidak kosong
  }
}else {
  // KONDISI SALAH JIKA SESSION USER TIDAK ADA
  header('Location:' . BASEURL . 'regist/Signin.php');
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
      <?php while ($result = mysqli_fetch_assoc($cekk)) {?>
   <title><?= $result['judul']; ?></title>
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
          <dd class="col"><h1 class="new-title"><?= $result['judul'] ?></h1></dd>
        </div>
        <div class="row mt-5">
          <div class="container-fluid">
            <div class="col-lg-6 img-new float-left">
              <img src="<?= BASEURL; ?>app/core/view_image.php?id_MO=<?= $result['id']; ?>" class="img-fluid ml-5" alt="Responsive image">
                </div>
                  <div class="row">
                    <div class="col hr-sub-new">
                      <hr class="horizontal" size="20" width="100%" align="right" >
                        </div>
                          </div>
                        <div class="col-lg-6 narasi float-right">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>PEMILIK IDE : </strong><?= $result['pemilik']; ?></li>
                        <li class="list-group-item"><strong>CATEGORY FILM : </strong><?= $result['category']; ?></li>
                        <li class="list-group-item"><strong>PENONTON : </strong> <?= $result['penonton']; ?></li>
                        <li class="list-group-item"><strong>TOTAL ANGGARAN : </strong>Rp. <?= number_format($result['T_anggaran'], 0, ",", "."); ?></li>
                        <li class="list-group-item"><strong>ANGGARAN TERKUMPUL : </strong>Rp. <?= number_format($result['anggaran_T'], 0, ",", "."); ?></li>
                        <li class="list-group-item">
                          <?php if ($result['T_anggaran'] == $result['anggaran_T']): ?>
                            <button type="button" class="btn btn-info" style="width: 200px; height: 50px; font-size: 13px; padding: 0px; margin: 0px;" data-toggle="modal" data-target="#staticBackdrop" disabled>
                              Quota Terpenuhi
                            </button>
                          <?php else: ?>
                        <!-- Button trigger modal -->
                      <button type="button" class="btn btn-info" style="width: 200px; height: 50px; font-size: 13px; padding: 0px; margin: 0px;" data-toggle="modal" data-target="#staticBackdrop">
                        Pengajuan Dana
                  </button>
                <?php endif; ?>
              </li>
            </ul>
          </div>
            </div>
              </div>
                    <div class="row mt-5">
                      <div class="narasi">
                    <h3>Sinopsis</h3>
                  <p><?= $result['sinopsis']; ?></p>
                </div>
                </div>

              </div>
              <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
          <ul class="list-group list-group-flush">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Pricing</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
          </div>
        <div class="card-deck">
          <?php
          $dua5 = ($result['T_anggaran'] * 25) / 100;
          $lima10 = ($result['T_anggaran'] * 50) / 100;
           ?>
      <div class="card">
        <div class="card-body">
          <h1 class="card-title pricing-card-title">Rp. <?= number_format($dua5, 0, ",", "."); ?> <small class="text-muted">/ 25%</small></h1>
          <a class="btn btn-lg btn-block btn-outline-info" href="<?= BASEURL; ?>CheckOut/checkout-process.php?Set_One=<?= $result['id']; ?>&Set_P=<?= $dua5;?>" role="button">Pilih</a>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h1 class="card-title pricing-card-title">Rp. <?= number_format($lima10, 0, ",", "."); ?> <small class="text-muted">/ 50%</small></h1>
          <?php if ($result['anggaran_T'] > $lima10): ?>
            <a class="btn btn-lg btn-block btn-outline-info disabled" href="<?= BASEURL; ?>CheckOut/checkout-process.php?Set_One=<?= $result['id']; ?>&Set_P=<?= $lima10;?>" role="button">Pilih</a>
            <?php else: ?>
              <a class="btn btn-lg btn-block btn-outline-info" href="<?= BASEURL; ?>CheckOut/checkout-process.php?Set_One=<?= $result['id']; ?>&Set_P=<?= $lima10;?>" role="button">Pilih</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h1 class="card-title pricing-card-title">Rp. <?= number_format($result['T_anggaran'], 0, ",", "."); ?><small class="text-muted">/ 100%</small></h1>
          <?php if ($result['anggaran_T'] >= $dua5 OR $result['anggaran_T'] >= $lima10): ?>
            <a class="btn btn-lg btn-block btn-outline-info disabled" href="<?= BASEURL; ?>CheckOut/checkout-process.php?Set_One=<?= $result['id']; ?>&Set_P=<?= $result['T_anggaran'];?>" role="button">Pilih</a>
            <?php else: ?>
              <a class="btn btn-lg btn-block btn-outline-info" href="<?= BASEURL; ?>CheckOut/checkout-process.php?Set_One=<?= $result['id']; ?>&Set_P=<?= $result['T_anggaran'];?>" role="button">Pilih</a>
          <?php endif; ?>
      </div>
    </div>
  </div>
    </ul>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
              </div>
                </div>
                  </div>
                    <?php } ?>
<?php require_once '../app/views/templates/footer.php'; ?>
