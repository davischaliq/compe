<?php
require_once 'config.php';
$servername = DB_HOST;
$database = DB_NAME;
$username = DB_USER;
$pass = DB_PASS;

  // Create connection
  $conn = mysqli_connect($servername, $username, $pass, $database);
  // Check connection

  if (!$conn) {
      die("<script>

        alert('Connection failed');

          </script>" . mysqli_connect_error());
  }else {

  }
