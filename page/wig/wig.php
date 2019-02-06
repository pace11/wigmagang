<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">WIG</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">WIG</li>
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
                            <?php if ($page == 'wig') { ?>
                                <a href="?page=wigtambah" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                            <?php } else { ?>
                                <h4>INPUT PROGRESS WIG</h4>
                            <?php } ?>
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
                                                <th>Tanggal</th>
                                                <?php if ($page == 'wig') { ?>
                                                <th>Target</th>
                                                <th>Satuan</th>
                                                <th>LM & PIC</th>
                                                <?php } ?>
                                                <th><?= ($page == 'wig') ? "Aksi" : "Input Progress" ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = mysqli_query($conn,"SELECT * FROM tbl_wig WHERE username='$userdata[username]'") or die (mysqli_error($conn));
                                            while($data = mysqli_fetch_array($sql)){ ?>
                                                <tr>    
                                                    <td><?= $no ?></td>
                                                    <td><a class="btn btn-success btn-sm" href="#"><i class="fas fa-user"></i> <?= $data['id_wig'] ?></a></td>
                                                    <td><?= $data['judul'] ?></td>
                                                    <td><?= $data['tanggal'] ?></td>
                                                    <?php if ($page == 'wig') { ?>
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
                                                    <?php } ?>
                                                    <td>
                                                        <?php if ($page == 'wig') { ?>
                                                        <a class="btn btn-warning btn-sm" href="?page=wigview&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-eye"></i> view</a>
                                                        <a class="btn btn-primary btn-sm" href="?page=wigedit&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-edit"></i> edit</a>
                                                        <a class="btn btn-danger btn-sm" href="?page=wighapus&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-trash"></i> hapus</a>
                                                        <?php } ?>
                                                        <?php if ($page == 'progress') { ?>
                                                        <a class="btn btn-info btn-sm" href="?page=wigprogress&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-pencil-alt"></i> Progress WIG</a>
                                                        <a class="btn btn-success btn-sm" href="?page=lmprogress&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-pencil-alt"></i> Progress LM</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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