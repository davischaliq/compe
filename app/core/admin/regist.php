<?php
require_once '../db.php';

$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$hp = htmlspecialchars($_POST['hp']);
$company = htmlspecialchars($_POST['company']);
$address = htmlspecialchars($_POST['address']);
$contry = htmlspecialchars($_POST['country']);
$state   = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$password = htmlspecialchars($_POST['password']);
$konfirmpass = htmlspecialchars($_POST['confirm-password']);

if ($konfirmpass != $password) {
  // code...
  header('Location:' . BASEURL . 'regist/Signup.php?status=err');
  return false;
}else {
  $password = sha1($_POST['password']);
  mysqli_query($conn, "INSERT INTO users (user, pass) VALUES ('$username','$password')");

  mysqli_query($conn, "INSERT INTO user_details (id,user,nama,email,hp,perusahaan,alamat,city,state,zip,jabatan,img)
  VALUES ('','$username','$nama','$email','$hp','$company','$address','$contry','$state','$zip','','')");

  header('Location:' . BASEURL . 'regist/Signup.php?status=success');
}

 ?>
