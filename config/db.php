<?php
  session_start();
  date_default_timezone_set('Asia/Manila');
  require('../environment.php');
  $host = 'localhost';
  if ($env === 'production') {
    $user = 'u984568706_admin';
    $pass = 'RxV6QRBmVVam';
    $db = 'u984568706_tcc';
  } else {
    $user = 'root';
    $pass = '';
    $db = 'tanauaud_tcc';
  }

  $conn = mysqli_connect($host, $user, $pass, $db);

  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    die();
  }
?>
