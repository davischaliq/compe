<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title">
      <a href="admin.php" class="site_title"><i class="fa fa-user"></i><span>Admin</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu samping -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li>
            <!-- di isi untuk menampilkan transaksi jumlah transaksi selesai dan transaksi belum selesai -->
            <a href="<?= BASEURL; ?>Dashboard/index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>Dashboard/Transaksi.php"><i class="fas fa-film"></i> Daftar Transaksi</a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>Dashboard/Profile.php"><i class="fas fa-user"></i> Akun Anda</a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>"><i class="fa fa-sign-out"></i> Website Utama</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- menu samping -->

  </div>
</div>

<!-- awal navigation atas -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle">
          <i class="fa fa-bars"></i>
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['user']; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li>
              <a href="keluar.php"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- akhir navigation bawah -->
