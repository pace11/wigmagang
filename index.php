<?php
    session_start();
    if (!empty($_SESSION['username']) && !empty($_SESSION['password']))
    {
      include "lib/koneksi.php";
      date_default_timezone_set('Asia/Jakarta');
      // Report all errors except E_NOTICE   
      error_reporting(E_ALL ^ E_NOTICE);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Administrator | WIG</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .field-icon {
    float: right;
    margin-right: 8px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
    cursor:pointer;
  }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <?php include("header.php"); ?>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include("sidebar.php"); ?>
  </aside>
  <?php include("content.php"); ?>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
<?php
}
else { ?>
<div class="col-md-12" align="center">
  <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
</div>


<?php echo"<meta http-equiv='refresh' content='1;
url=login.php'>";
} ?>
