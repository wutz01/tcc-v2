<?php
  require('../config/db.php');
  $request = array_merge($_POST, $_GET);

  print_r($request);
  die();
?>
