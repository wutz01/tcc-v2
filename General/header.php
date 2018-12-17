<?php session_start(); 
  if (!isset($_SESSION['firstName'])) {
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>TCC</title>

  <link rel="apple-touch-icon" href="../assets/images/TCC.png">
  <link rel="shortcut icon" href="../assets/images/TCC.png">

  <!-- Stylesheets -->
  <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../assets/css/site.min.css">

  <link rel="stylesheet" href="../assets/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../assets/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../assets/vendor/icheck/icheck.css">
  <link rel="stylesheet" href="../assets/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../assets/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../assets/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../assets/vendor/flag-icon-css/flag-icon.css">

  <link rel="stylesheet" href="../assets/vendor/datatables-bootstrap/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
  <link rel="stylesheet" href="../assets/vendor/datatables-responsive/dataTables.responsive.css">

  <link rel="stylesheet" href="../assets/vendor/select2/select2.css">
  <link rel="stylesheet" href="../assets/vendor/bootstrap-select/bootstrap-select.css">
  <link rel="stylesheet" href="../assets/vendor/multi-select/multi-select.css">

<!-- Plugin -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap-sweetalert/sweet-alert.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../assets/css/../fonts/glyphicons/glyphicons.css">
  <link rel="stylesheet" href="../assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../assets/fonts/brand-icons/brand-icons.min.css">
  <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->

  
  <!-- <link href="../assets/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
  <link href="../assets/css/dataTables/dataTables.responsive.css" rel="stylesheet">
  <script src="../assets/js/dataTables/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables/dataTables.bootstrap.min.js"></script> -->
  <!-- <script src="../assets/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="../assets/js/dataTables.js"></script> -->
<!--   <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script> -->
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.min.css"> -->

  <!-- Inline -->
  <style>
    @media (min-width: 768px) and (max-width: 992px) {
      .form-inline .control-label {
        display: block;
      }
      .form-inline .form-group {
        margin-bottom: 20px;
        vertical-align: baseline;
      }
    }
  </style>

  <!--[if lt IE 9]>
    <script src="../assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../assets/vendor/modernizr/modernizr.js"></script>
  <script src="../assets/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<style type="text/css">
  .button1 {font-size: 7px;}
  .listApply {font-size: 11px;}
</style>