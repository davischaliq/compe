<?php
  session_start();
  require '../db.php';

  $user = $_SESSION['user'];
  $Nama = htmlspecialchars($_POST['name']);
  $Email = htmlspecialchars($_POST['email']);
  $company = htmlspecialchars($_POST['company']);
  $jabatan = htmlspecialchars($_POST['jabatan']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $city = htmlspecialchars($_POST['city']);
  $state = htmlspecialchars($_POST['state']);
  $postal = htmlspecialchars($_POST['postal']);
  $satuN = $_FILES['file']['name'];
  $satuE = $_FILES['file']['error'];
  $satuT = $_FILES['file']['tmp_name'];
  $satuS = $_FILES['file']['size'];

  $valid = ['png', 'jpeg', 'jpg'];

  $Nama = mysqli_escape_string($conn, $Nama);
  $Email = mysqli_escape_string($conn, $Email);
  $company = mysqli_escape_string($conn, $company);
  $jabatan = mysqli_escape_string($conn, $jabatan);
  $alamat = mysqli_escape_string($conn, $alamat);
  $city = mysqli_escape_string($conn, $city);
  $state = mysqli_escape_string($conn, $state);
  $postal = mysqli_escape_string($conn, $postal);

  if ($satuE == 0) {
    if ($satuS > 1000000) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('File Yang Anda Upload terlalu besar');
          window.location.href='".BASEURL."Dashboard/Profile.php';
           </script>");
            return false;
        }else {
          $ekstensi = strtolower(pathinfo($satuN,PATHINFO_EXTENSION));
            if (in_array($ekstensi, $valid)) {

              $fp   = fopen($satuT, 'r');
              $data = fread($fp, filesize($satuT));
              $data = addslashes($data);
              fclose($fp);

              $qr  = "UPDATE user_details SET nama = '$Nama', email = '$Email', perusahaan = '$company', alamat = '$alamat',
              city = '$city', state = '$state', zip = '$postal', jabatan = '$jabatan', img ='$data' WHERE user = '$user'";
              $result = mysqli_query($conn, $qr);

              if ($result) {
              echo ("<script LANGUAGE='JavaScript'>
	               window.alert('Informasi Anda Berhasil Di Update');
	                window.location.href='".BASEURL."Dashboard/Profile.php';
	                 </script>");
              } else {
              echo "Gagal Update Data. " . mysqli_error($conn);
              return false;
            }
            }else {
              echo ("<script LANGUAGE='JavaScript'>
                 window.alert('Permintaan di tolak, file yang anda upload bukan gambar');
                  window.location.href='".BASEURL."Dashboard/Profile.php';
                   </script>");
              return false;
            }
        }
  }

  if ($satuE == 4) {
    // code...
    $qr  = "UPDATE user_details SET nama = '$Nama', email = '$Email', perusahaan = '$company', alamat = '$alamat',
    city = '$city', state = '$state', zip = '$postal', jabatan = '$jabatan' WHERE user = '$user'";
    $result = mysqli_query($conn, $qr);
    if ($result) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('Informasi Anda Berhasil Di Update');
          window.location.href='".BASEURL."Dashboard/Profile.php';
           </script>");
    // header("location:" . BASEURL . 'Dashboard/index?status=success');
    } else {
    echo "Gagal Update Data. " . mysqli_error($conn);
    return false;
    }
  }



 ?>
