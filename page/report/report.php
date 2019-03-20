<div class="content-wrapper">    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">Report</li>
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
                            <h4>Report</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="?page=report" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pilih WIG</label>
                                                <select name="pilihwig" id="selectwig" class="form-control">
                                                    <option style="display:none;">-- pilih salah satu --</option>
                                                    <?php 
                                                    $q = mysqli_query($conn, "SELECT * FROM tbl_wig WHERE username='$userdata[username]'");
                                                    while($data = mysqli_fetch_array($q)){
                                                        echo "<option value='".$data['id_wig']."'>".$data['id_wig']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <input id="role" type="hidden" name="role">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $no = 0; 
                                $q = mysqli_query($conn, "SELECT * FROM tbl_wig WHERE username='$userdata[username]'");
                                    while($data = mysqli_fetch_array($q)){
                                ?>
                                <div class="col-md-5 bulan" id="<?= $data['id_wig'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label>Pilih Bulan</label>
                                                <select name="pilihbulan<?= $no ?>" class="form-control">
                                                    <option style="display:none;">-- pilih salah satu --</option>
                                                <?php
                                                    $datalm = mysqli_query($conn, "SELECT * FROM tbl_lm WHERE id_wig='$data[id_wig]'");
                                                    $lm = mysqli_fetch_array($datalm);
                                                    $value = json_decode($lm['lm_pic']);
                                                    foreach($value[0]->data as $values){
                                                        echo "<option value='".$values->tanggal."'>".date('F', strtotime($values->tanggal))."</option>" ;
                                                    }
                                                ?>
                                                </select>
                                                <textarea id="arrIsi<?= $no ?>" name="arrIsi<?= $no ?>"><?= json_encode($value) ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++; } ?>
                                <div class="col-md-2" id="btnproses">
                                    <div class="form-group">
                                    <label>Cek</label><br>
                                    <input type="submit" name="submit" class="btn btn-info" value="Proses">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                    
                                    if (isset($_POST['submit'])){
                                        $idwig  = $_POST['pilihwig'];
                                        $role   = $_POST['role'];
                                        $bulan  = $_POST["pilihbulan".$role.""];
                                        $arrisi = $_POST["arrIsi".$role.""]; 

                                        echo "<pre>";
                                        print_r($arrisi);
                                        echo "</pre>";

                                    }
                                    
                                    ?>
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
<script>
$(document).ready(function(){

    $("#btnproses").hide();
    $('.bulan').each(function(){
        $('#'+this.id).hide();
    });

    $('#selectwig').change(function(){
        nil = $(':selected').val();
        $('.bulan').each(function(i, val){
            nul = this.id;
            if (nil == nul){
                $("#role").val(i);
                $("#btnproses").show();
                $('#'+nul).show();
            } else {
                $('#'+nul).hide();
            }
        });
    });
});
</script>