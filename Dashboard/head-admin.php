<?php
// untuk koneksi
session_start();
require_once '../app/init.php';
if (isset($_SESSION['user'])) {
  // code...
  if (is_null($_SESSION['user'])) {
    echo '<script>
    window.alert("Anda Harus Masuk Dahulu !");
    </script>';
    header('Location:' . BASEURL);
    return false;
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <!-- Pemanggilan Bootstrap -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

    <!-- Pemanggilan Icon dan Gambar -->
    <!-- <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/d8b23fe4ca.js" crossorigin="anonymous"></script>

    <!-- Pemanggilan DataTables -->
    <link rel="stylesheet" href="../assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css">

    <!-- Tema CSS -->
    <link rel="stylesheet" href="../assets/css/admin/custom.min.css">
  </head>
