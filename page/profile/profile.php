<div class="content-wrapper"> 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">Profile Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php 

        $getdata = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$_GET[id]'") or die (mysqli_error($koneksi));
        $data    = mysqli_fetch_array($getdata);
      
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <h4><i class="fas fa-file-alt"></i> Form Edit Data</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <?php 
                                            if ($data['role'] == 0){
                                                echo "<button class='btn btn-success btn-sm'><i class='fa fa-user'></i> ADMIN</button>";
                                            } elseif ($data['role'] == 1){
                                                echo "<button class='btn btn-success btn-sm'><i class='fa fa-user'></i> MANAGER</button>";
                                            } else {
                                                echo "<button class='btn btn-success btn-sm'><i class='fa fa-user'></i> SUPERVISOR</button>";
                                            }
                                            ?>
                                        </div>
                                        <form action="?page=profileeditpro" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <?php if ($data['role'] == 0) { ?>
                                                <input type="text" class="form-control" name="username" style="text-transform:uppercase;" placeholder="masukkan username ..." value="<?= $data['username'] ?>" required>
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" readonly>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password-field" type="password" class="form-control" name="password" placeholder="masukkan password ..." value="<?= $data['password'] ?>" required>
                                            <span toggle="#password-field" class="fa fa-lg fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-info" value="Simpan">
                            <a href="?page=beranda" class="btn btn-danger">Batal</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Footer -->
<footer class="main-footer">
        <strong>Copyright &copy; 2019</strong> Sistem Informasi Wildly Important Goal | PLN Bulungan
    </footer>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chartjs-old/Chart.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  $(function () {
    $("#datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true, 
      todayHighlight: true
    });
  });
</script>