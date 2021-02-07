<?php
session_start();
require_once '../app/init.php';
require_once '../app/core/vendor/vendor/autoload.php';
if (is_null($_SESSION['user'])) {
  header("Location: " . BASEURL);
  return false;
}else {
  // code...
  $user = $_SESSION['user'];
}
$Set_One = htmlspecialchars($_GET['Set_One']);
$Price = htmlspecialchars($_GET['Set_P']);
$order_id = rand();

$qr = "SELECT * FROM movieoncoming WHERE id = '$Set_One'";
$cek = mysqli_query($conn, $qr);
$result = mysqli_fetch_assoc($cek);

$qr2 = "SELECT * FROM user_details WHERE user = '$user'";
$ex = mysqli_query($conn, $qr2);
$result_user = mysqli_fetch_assoc($ex);

//Set Your server key
Veritrans_Config::$serverKey = "SB-Mid-server-TnZ9q_MQ7mjOg0Im1GGg6WZc";
// Veritrans_Config::$serverKey = "Mid-server-IZslTraRTveWW3Hi6v9TXZmO";

// Uncomment for production environment
// Veritrans_Config::$isProduction = true;

//Uncomment to enable sanitization
Veritrans_Config::$isSanitized = true;

//Uncomment to enable 3D-Secure
Veritrans_Config::$is3ds = true;

// Required
$transaction_details = array(
  'order_id' => $order_id,
  'gross_amount' => $Price);

// Optional
$item1_details = array(
  'id' => 'Film' . rand(),
  'price' => $Price,
  'quantity' => '1',
  'name' => 'Film ' . $result['judul']);

// Optional
$item_details = array ($item1_details);

// Optional
$billing_address = array(
  'first_name' => $result_user['nama'],
  'last_name' => '',
  'address' => $result_user['alamat'],
  'city' => $result_user['city'],
  'postal' => $result_user['zip'],
  'phone' => $result_user['hp'],
  'country_code' => 'IND');

// Optional
$customer_details = array(
  'first_name'    => $result_user['nama'],
  'last_name'     => '',
  'email'         => $result_user['email'],
  'phone'         => $result_user['hp'],
  'billing_address'  => $billing_address);

$enable_payments = array('bank_transfer');

// Fill SNAP API parameter
$params = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
    );

try {
    //insert transaksi ke dalam database
    $Price;
    $Set_One;
    mysqli_query($conn,"insert into transaksi (order_id,id_film,payment,bank,va,currency,total,username,status) values ('$order_id','$Set_One', '', '', '','', '$Price','$user','Not Found')");

  // Get Snap Payment Page URL
  $paymentUrl = Veritrans_Snap::createTransaction($params)->redirect_url;

  // Redirect to Snap Payment Page
  header('Location: ' . $paymentUrl);
}
catch (Exception $e) {
  echo $e->getMessage();
}
