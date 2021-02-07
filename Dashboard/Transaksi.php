<!-- untuk bagian head -->
<?php include_once ('head-admin.php'); ?>
<?php

if ($_SESSION['user'] != null) {
  $user = $_SESSION['user'];
  $cek = mysqli_escape_string($conn, $user);
  $qr = "SELECT transaksi.id_film, transaksi.order_id, movieoncoming.id, movieoncoming.judul, movieoncoming.img FROM transaksi INNER JOIN movieoncoming ON transaksi.id_film=movieoncoming.id WHERE transaksi.username = '$user' AND transaksi.status != 'Not Found'";
  $ex = mysqli_query($conn, $qr);
}else {
  // code...
  header('Location:' . BASEURL);
  return false;
}
 ?>
<body class="nav-md">
  <!-- awal container -->
  <div class="container body">
    <div class="main_container">

      <!-- menu samp ing -->
      <?php include_once ('header-admin.php'); ?>

      <!-- awal isi halaman -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Transaksi</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Your Transaction</h2>
                  <div class="clearfix"></div>
                </div>
              <div class="x_content">

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Id Transaksi</th>
                  <th scope="col">Judul Film</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <?php
              $no = 0;
              while ($result = mysqli_fetch_assoc($ex)) {
                $no++;
                ?>
            <tbody>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $result['order_id']; ?></td>
                <td><?= $result['judul']; ?><br><img src="<?= BASEURL; ?>app/core/view_image.php?id_MO=<?= $result['id']; ?>" width="460px"></td>
                <td>
                  <a class="btn btn-success" id="btn" href="Transaksi-detail.php?order_id=<?= $result['order_id']?>" target="_blank"><i class="far fa-eye"></i></a>
                </td>
              </tr>
             </tbody>
           <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
          <!-- akhir row tabel -->

        </div>
      </div>
      <!-- akhir isi halaman -->

      <!-- footer -->
      <?php include_once ('footer-admin.php'); ?>

    </div>
  </div>
  <!-- akhir container -->
id
<!-- untuk bagian foot -->
<?php include_once ('foot-admin.php'); ?>
