<?php
require_once 'db.php';
if(isset($_GET['id_N']))
{
    $id = $_GET['id_N'];
    // var_dump($id);
    $id = mysqli_escape_string($conn, $id);
    $qr = "SELECT img FROM news WHERE id_post = '$id'";
    $result = mysqli_query($conn, $qr);
    $row = mysqli_fetch_assoc($result);
    // var_dump($row['img']);
    header("Content-Type: image/jpg");
    echo $row["img"];
}
if (isset($_GET['id_M'])) {
  // code...
  $id = $_GET['id_M'];
  // var_dump($id);
  $id = mysqli_escape_string($conn, $id);
  $qr = "SELECT img FROM movie WHERE id_post = '$id'";
  $result = mysqli_query($conn, $qr);
  $row = mysqli_fetch_assoc($result);
  // var_dump($row['img']);
  header("Content-Type: image/jpg, image/jpeg, image/png");
  echo $row["img"];
}
if (isset($_GET['id_MO'])) {
  // code...
  $id = $_GET['id_MO'];
  // var_dump($id);
  $id = mysqli_escape_string($conn, $id);
  $qr = "SELECT img FROM movieoncoming WHERE id = '$id'";
  $result = mysqli_query($conn, $qr);
  $row = mysqli_fetch_assoc($result);
  // var_dump($row['img']);
  header("Content-Type: image/jpg, image/jpeg, image/png");
  echo $row["img"];
}
if (isset($_GET['pp'])) {
  // code...
  $id = $_GET['pp'];
  $id = mysqli_escape_string($conn, $id);
  $qr = "SELECT img FROM user_details WHERE id = '$id'";
  $result = mysqli_query($conn, $qr);
  $row = mysqli_fetch_assoc($result);
  header("Content-Type: image/jpg, image/jpeg, image/png");
  echo $row["img"];
}
?>
