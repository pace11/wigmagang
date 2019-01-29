<div class="content-wrapper">    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Objek Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">Objek Wisata</li>
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
                            <h4><i class="fas fa-file-alt"></i> Form Edit Data</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <?php

                            if (isset($_POST['submit'])){
                                
                                $idkategori     = $_POST['idkategori'];
                                $iduser         = $_POST['iduser'];
                                $judul          = $_POST['judul'];
                                $tanggal        = date("Y-m-d", strtotime($_POST['tanggal']));
                                $target         = $_POST['target'];
                                $satuan         = $_POST['satuan'];
                                $counter        = $_POST['counter'];

                                    $input = mysqli_query($conn,"UPDATE tbl_wig SET
                                            username        = '$iduser',
                                            judul           = '$judul',
                                            tanggal         = '$tanggal',
                                            target          = '$target',
                                            satuan          = '$satuan'
                                            WHERE id_wig    = '$idkategori'
                                            ") or die (mysqli_error($conn));
                                    
                                    for ($a=0;$a<$counter;$a++) {
                                        $isi['lm'] = $_POST["lm".$a.""];
                                        $isi['pic'] = $_POST["pic".$a.""];
                                        $lm_pic[] = $isi;
                                    }
                                    $valueLM = json_encode($lm_pic);
                                    
                                    $input = mysqli_query($conn,"UPDATE tbl_lm SET
                                            lm_pic          = '$valueLM'
                                            WHERE id_wig    = '$idkategori'
                                            ") or die (mysqli_error($conn));
                                                                
                                    if ($input){
                                        echo    '<div class="row">'.
                                                    '<div class="col-md-12">'.
                                                        '<div class="alert alert-success alert-dismissible">'.
                                                        '<h5><i class="icon fa fa-check"></i> Alert!</h5>'.
                                                        'Data berhasil disimpan.</div>'.
                                                    '</div>'.
                                                '</div>';
                                        echo "<meta http-equiv='refresh' content='1;
                                        url=?page=wig'>";
                                    }
                                } 
                            ?>
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