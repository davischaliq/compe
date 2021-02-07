<?php
session_start();
require_once '../app/init.php';
// if (isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
  if (isset($_GET['order_id']) && !is_null($_GET['order_id'])) {
    // code...
    $user = $_SESSION['user'];
    $order_id = $_GET['order_id'];
    $status = $_GET['trasaction_status'];

    // var_dump($order_id);
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
// var_dump($data);
// die;
switch ($data['payment_type']) {
  case $data['payment_type'] = 'echannel':
    $va = $data['bill_key'];
    $biller = $data['biller_code'];
    $status = $data['transaction_status'];
    $jenis = $data['payment_type'];
    $harga = $data['gross_amount'];
    $currency = $data['currency'];
    $namabank = 'Mandiri';
    break;

  case $data['payment_type'] = 'bank_transfer':
    $status = $data['transaction_status'];
    $jenis = $data['payment_type'];
    $namabank = $data['va_numbers'][0]['bank'];

    if (isset($data['permata_va_number'])) {
      $va = $data['permata_va_number'];
      $namabank = 'Permata';
    }else {
      $va = $data['va_numbers'][0]['va_number'];
    }
      $harga = $data['gross_amount'];
      $currency = $data['currency'];

    break;
}
  if (isset($data['settlement_time'])) {
    $settlement_time = $data['settlement_time'];
  }else {
    $settlement_time = '';
  }

  $resultupdate = mysqli_query($conn,"UPDATE transaksi SET order_id = '$order_id', payment = '$jenis', bank = '$namabank', biller_code = '$biller', va = '$va', currency = '$currency', total = '$harga',status = '$status', paid = '$settlement_time' WHERE order_id = '$order_id'");
  if ($resultupdate) {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Transaksi anda berhasil di prosess');
        window.location.href='".BASEURL."Dashboard/Transaksi.php';
        </script>");
  }else {
    echo "gagal" . mysqli_error($conn);
    return false;
  }
  // header('location:' . BASEURL . 'Dashboard/Transaksi');

  }else {
    header('location:' . BASEURL);
    return false;
  }
// }else {
//   header('location:' . BASEURL);
//   return false;
// }
 ?>
