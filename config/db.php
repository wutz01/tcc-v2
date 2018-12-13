<?php
  session_start();
  date_default_timezone_set('Asia/Manila');

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'tanauaud_tcc';

  $conn = mysqli_connect($host, $user, $pass, $db);

  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    die();
  }
?>
