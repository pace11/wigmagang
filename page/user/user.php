<div class="content-wrapper">    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <a href="?page=usertambah" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE role <> 0") or die (mysqli_error($conn));
                                            while($data = mysqli_fetch_array($sql)){ ?>
                                                <tr>    
                                                    <td><?= $no ?></td>
                                                    <td><a class="btn btn-success btn-sm" href="#"><i class="fas fa-user"></i> <?= $data['username'] ?></a></td>
                                                    <td>*****</td>
                                                    <td>
                                                    <?php 
                                                    if ($data['role'] == 1) {
                                                        echo "<a class='btn btn-info btn-sm' href='#'>MANAGER</a>";
                                                    } else {
                                                        echo "<a class='btn btn-info btn-sm' href='#'>SUPERVISOR</a>";
                                                    }
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="?page=useredit&id=<?php echo $data['username']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger btn-sm" href="?page=userhapus&id=<?php echo $data['username']; ?>"><i class="fas fa-trash"></i> hapus</a>
                                                    </td>
                                                </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                
                        <div class="card-footer">
                        </div>

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