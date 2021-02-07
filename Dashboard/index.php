<!-- index admin -->
<?php include_once ('head-admin.php') ?>
<?php
if ($_SESSION['user'] != null) {
  // code...
  $params = $_SESSION['user'];
  $cek = mysqli_escape_string($conn, $params);
}else {
  // code...
  header('Location:'.BASEURL);
  return false;
}
 ?>
<body class="nav-md">
  <!-- awal container -->
  <div class="container body">
    <div class="main_container">

      <!-- menu samping -->
      <?php include_once ('header-admin.php'); ?>

      <!-- awal isi halaman -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dashboard</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="">
                <div class="x_content">
                  <div class="row">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fas fa-file-invoice"></i></i>
                            </div>
                              <?php
                                $qrOncoming = "SELECT status FROM transaksi WHERE username = '$cek' AND status != 'Not Found'";
                                $ex = mysqli_query($conn, $qrOncoming);
                                $result = mysqli_num_rows($ex);
                              ?>
                            <div class="count"><?= $result; ?></div>
                          <h3>Total Transaksi</h3>
                        </div>
                      </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fas fa-coins"></i>
                        </div>
                        <?php
                        $qrOncoming = "SELECT status FROM transaksi WHERE username = '$cek' AND status='settlement'";
                        $ex = mysqli_query($conn, $qrOncoming);
                        $result = mysqli_num_rows($ex);
                         ?>
                        <div class="count"><?= $result; ?></div>
                        <h3>Transaksi Selesai</h3>
                      </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="far fa-clock"></i>
                        </div>
                        <?php
                        $qrOncoming = "SELECT status FROM transaksi WHERE username = '$cek' AND status = 'pending'";
                        $ex = mysqli_query($conn, $qrOncoming);
                        $result = mysqli_num_rows($ex);
                         ?>
                        <div class="count"><?= $result; ?></div>
                        <h3>Pending Transaksi</h3>
                      </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fas fa-exclamation"></i>
                        </div>
                        <?php
                        $qrOncoming = "SELECT status FROM transaksi WHERE username = '$cek' AND status='expire'";
                        $ex = mysqli_query($conn, $qrOncoming);
                        $result = mysqli_num_rows($ex);
                         ?>
                        <div class="count"><?= $result; ?></div>
                        <h3>Transaksi Gagal</h3>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir isi halaman -->

      <!-- footer -->
      <?php include_once ('footer-admin.php'); ?>

    </div>
  </div>
  <!-- akhir container -->

<?php include_once ('foot-admin.php'); ?>
