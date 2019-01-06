<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h2 class="text-center">LOGIN</h2>
      <div class="text-center">
        <img class="text-center" src="dist/img/PLN.png" width="50%">
      </div>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="username ..." name="username" required="" oninvalid="this.setCustomValidity('Masukkan username anda')" oninput="setCustomValidity('')">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="password ..." name="password" required="" oninvalid="this.setCustomValidity('Masukkan password anda')" oninput="setCustomValidity('')">
        </div>
        <div class="input-group mb-3">
          <input class="btn-block btn btn-primary" type="submit" name="submit" value="LOGIN">
        </div>
        <div class="row">
          <div class="col-md-12">
          <?php 
            if (isset($_POST['submit'])){
              session_start();
              
              include "lib/koneksi.php";

              $u  = $_POST['username'];
              $p  = $_POST['password'];

              $ceklogin = mysqli_query($conn, "SELECT * FROM tbl_user WHERE BINARY username='$u' AND password='$p'");
              $data     = mysqli_fetch_array($ceklogin);
              $hit      = mysqli_num_rows($ceklogin);

              if ($hit>0){
                echo '<div class="alert alert-success alert-dismissible">Login Berhasil</div>';
                echo "<meta http-equiv='refresh' content='1;
                url=index.php?page=beranda'>";
                $_SESSION['username']  = $data['username'];
                $_SESSION['password']  = $data['password'];
              }
            }
          ?>
          </div>
        </div>
        
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>
