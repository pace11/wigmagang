<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">BERANDA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">BERANDA</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php if ($userdata['role'] == 1 || $userdata['role'] == 2) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <h4>LIST DATA WIG</h4>
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
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>User</th>
                                                <th>Tanggal</th>
                                                <th>Target</th>
                                                <th>Satuan</th>
                                                <th>LM & PIC</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = mysqli_query($conn,"SELECT * FROM tbl_wig
                                                                       JOIN tbl_user WHERE tbl_wig.username=tbl_user.username") or die (mysqli_error($conn));
                                            while($data = mysqli_fetch_array($sql)){ ?>
                                                <tr>    
                                                    <td><?= $no ?></td>
                                                    <td><a class="btn btn-success btn-sm" href="#"><i class="fas fa-user"></i> <?= $data['id_wig'] ?></a></td>
                                                    <td><?= $data['judul'] ?></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><?= $data['username'] ?></a></td>
                                                    <td><?= $data['tanggal'] ?></td>
                                                    <td><?= $data['target'] ?></td>
                                                    <td><?= $data['satuan'] ?></td>
                                                    <td>
                                                    
                                                    <div class="card card-success">
                                                        <div class="card-header">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $data['id_wig']?>" class="collapsed" aria-expanded="false">
                                                            tampilkan
                                                            </a>
                                                        </div>
                                                        <div id="collapse_<?= $data['id_wig']?>" class="panel-collapse in collapse" style="">
                                                        <div class="card-body">
                                                            <?= GetLM($data['id_wig']) ?>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    </td>
                                                    <td>
                                                    <?php if ($userdata['username'] == $data['username']) { ?>
                                                        <a class="btn btn-warning btn-sm" href="?page=wigview&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-eye"></i> view</a>
                                                        <a class="btn btn-primary btn-sm" href="?page=wigedit&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger btn-sm" href="?page=wighapus&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-trash"></i> hapus</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-warning btn-sm" href="?page=wigview&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-eye"></i> view</a>
                                                    <?php } ?>
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
            <?php } else { 
            
            $hitusers  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_user WHERE role <> 0"));
            
            ?>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Users</span>
                            <span class="info-box-number">
                            <?= $hitusers ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2018</strong> Sistem Informasi Week Important Goal | PLN Bulungan
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