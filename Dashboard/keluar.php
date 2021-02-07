<?php
// untuk proses keluar
session_start();
require_once '../app/init.php';
session_unset();
session_destroy();
header("location:" . BASEURL);

 ?>
