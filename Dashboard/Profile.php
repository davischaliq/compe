 <!-- untuk bagian head -->
<?php include_once ('head-admin.php'); ?>
<?php
if ($_SESSION['user'] != null) {
  // code...
  $user = $_SESSION['user'];
  $cek = mysqli_escape_string($conn, $user);
  $qr = "SELECT * FROM user_details WHERE user = '$cek'";
  $ex = mysqli_query($conn, $qr);
  $result = mysqli_fetch_assoc($ex);
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

      <!-- menu samping -->
      <?php include_once ('header-admin.php'); ?>

      <!-- awal isi halaman -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Profile</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Your Profile</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row">
                    <figure class="figure">
                      <?php if ($result['img'] == null): ?>
                        <img src="<?= BASEURL; ?>assets/img/user.png" class="figure-img rounded" width="300px" height="300px" alt="...">
                        <?php else: ?>
                          <img src="<?= BASEURL; ?>app/core/view_image.php?pp=<?= $result['id']; ?>" class="figure-img rounded" width="300px" height="300px" alt="...">
                      <?php endif; ?>
                    </figure>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-lg-5">
                      <ul class="list-group">
                        <li class="list-group-item">Nama Anda : <?= $result['nama']; ?></li>
                        <li class="list-group-item">Email : <?= $result['email']; ?></li>
                        <li class="list-group-item">Perusahaan : <?= $result['perusahaan'] ?></li>
                        <li class="list-group-item">Alamat : <?= $result['alamat']; ?>, <?= $result['city']; ?>, <?= $result['zip']; ?>, <?= $result['state']; ?></li>
                        <li class="list-group-item">Jabatan : <?= $result['jabatan']; ?></li>
                    </ul>
                  </div>
                  </div>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Edit
                  </button>
                <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <h6>Silahkan isi salah satu field sesuai data yang ingin anda ubah</h6>
                <form method="post" action="<?= BASEURL; ?>app/core/admin/Profile_Ubah.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Your Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?= $result['nama']; ?>"aria-describedby="emailHelp" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?= $result['email']; ?>"aria-describedby="emailHelp" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Name</label>
                    <input type="text" name="company" class="form-control" value="<?= $result['perusahaan'] ?>"id="exampleInputPassword1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Position</label>
                    <input type="text" name="jabatan" class="form-control" value="<?= $result['jabatan']; ?>" id="exampleInputPassword1" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Company Address</label>
                    <input type="text" name="alamat" class="form-control" id="inputAddress" value="<?= $result['alamat']; ?>" placeholder="1234 Main St" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity">City</label>
                      <input type="text" name="city" class="form-control" value="<?= $result['city']; ?>"id="inputCity" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">State</label>
                    <input type="text" name="state"class="form-control" value="<?= $result['state']; ?>"id="inputCity" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Zip</label>
                      <input type="text" name="postal" class="form-control" value="<?= $result['zip']; ?>"id="inputZip" required>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">Upload Your Photo Profile</label>
                      <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                      <small id="emailHelp" class="form-text text-muted">Photo ukuran 300 x 300px ukuran maksimal 1MB</small>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>

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

<!-- untuk bagian foot -->
<?php include_once ('foot-admin.php'); ?>
