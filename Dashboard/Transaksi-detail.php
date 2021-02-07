<!-- untuk bagian head -->
<?php include_once ('head-admin.php'); ?>
<?php
if ($_SESSION['user'] != null) {
  // code...
if (isset($_GET['order_id']) && !is_null($_GET['order_id'])) {
  $order_id = htmlspecialchars($_GET['order_id']);
  $paramorder = mysqli_escape_string($conn, $order_id);
  $cektransaksi = mysqli_query($conn, "SELECT status FROM transaksi WHERE order_id = '$paramorder'");
  $result = mysqli_fetch_assoc($cektransaksi);

  if ($result['status'] === 'expire') {
    $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE order_id = '$paramorder'");
    $resultT = mysqli_fetch_assoc($cek);
  }

  if ($result['status'] === 'pending') {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/".$order_id."/status",
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_RETURNTRANSFER => "TRUE",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Basic U0ItTWlkLXNlcnZlci1Ublo5cV9NUTdtak9nMEltMUdHZzZXWmM6"
      ),
    ));

    $response = curl_exec($curl);
    $data = json_decode($response, TRUE);
    $status = $data['transaction_status'];
    $settlement_time = $data['settlement_time'];

    $result = mysqli_query($conn, "UPDATE transaksi SET status = '$status', paid = '$settlement_time' WHERE order_id = '$paramorder'");

    if ($result) {
      $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE order_id = '$paramorder'");
      $resultT = mysqli_fetch_assoc($cek);
    }
  }


  if ($result['status'] === 'settlement') {
    $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE order_id = '$paramorder'");
    $resultT = mysqli_fetch_assoc($cek);
  }


}else {
  require_once '../app/errorpage.php';
  return false;
}
}else {
  header('Location: ' . BASEURL);
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
              <h3>Transaksi</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Your Details Transaction</h2>
                  <div class="clearfix"></div>
                </div>
              <div class="x_content">

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id Transaksi</th>
                  <th scope="col">Payment Type</th>
                  <th scope="col">Bank</th>
                  <?php if ($resultT['bank'] === "Mandiri"): ?>
                  <th scope="col">Biller Code</th>
                  <th scope="col">Kode Pembayaran</th>
                  <?php else: ?>
                    <th scope="col">Virtual Account</th>
                  <?php endif; ?>
                  <th scope="col">Currency</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Transaction Status</th>
                  <th scope="col">Paid Time</th>
                </tr>
              </thead>
            <tbody>
              <tr>
                <td><?= $resultT['order_id']; ?></td>
                <td><?= $resultT['payment']; ?></td>
                <td><?= $resultT['bank']; ?></td>
                <?php if ($resultT['bank'] === "Mandiri"): ?>
                <td><?= $resultT['biller_code']; ?></td>
                <?php endif; ?>
                <td><?= $resultT['va']; ?></td>
                <td><?= $resultT['currency']; ?></td>
                <td>Rp . <?= number_format($resultT['total'], 0, ",", "."); ?></td>
                <?php if ($resultT['status'] == 'settlement'){
                  $statusT = 'succes';
                  $settlement_time = $resultT['paid'];
                }else {
                  $statusT = $resultT['status'];
                  $settlement_time = '';
                } ?>
                <td><?= $statusT; ?></td>
                <td><?= $settlement_time; ?></td>
              </tr>
             </tbody>

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

<!-- untuk bagian foot -->
<?php include_once ('foot-admin.php'); ?>
