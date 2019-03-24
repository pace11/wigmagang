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
    <?php 
        $count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_wig WHERE username='$user'"));
    ?>
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
                            <?php if($count) { ?>
                            <form action="?page=report" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4 bulan" id="<?= $data['id_wig'] ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label>Pilih Bulan</label>
                                                        <select name="pilihbulan<?= $no ?>" class="form-control">
                                                            <option style="display:none;">-- pilih salah satu --</option>
                                                        <?php
                                                            $datalma = mysqli_query($conn, "SELECT * FROM tbl_wigprogress WHERE id_wig='$data[id_wig]'");
                                                            $lma = mysqli_fetch_array($datalma);
                                                            $valuea = json_decode($lma['value_wigprogress']);
                                                            foreach($valuea as $values){
                                                                echo "<option value='".$values->tanggal."'>".date('F', strtotime($values->tanggal))."</option>" ;
                                                            }
                                                            $datalm = mysqli_query($conn, "SELECT * FROM tbl_lm WHERE id_wig='$data[id_wig]'");
                                                            $lm = mysqli_fetch_array($datalm);
                                                            $value = json_decode($lm['lm_pic']);
                                                        ?>
                                                        </select>
                                                        <textarea style="display:none;" id="arrNil<?= $no ?>" name="arrNil<?= $no ?>"><?= json_encode($value) ?></textarea>
                                                        <textarea style="display:none;" name="arrwigNil<?= $no ?>"><?= json_encode($value) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++; } ?>
                                    </div>
                                </div> 
                                <div class="col-md-2" id="btnproses">
                                    <div class="form-group">
                                        <label>Cek</label><br>
                                        <input type="submit" name="submit" class="btn btn-info" value="Proses">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fa fa-info"></i> Informasi!</h5>
                                        Anda belum memiliki/membuat WIG. Segera buat WIG pada menu WIG.
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                    
                                    if (isset($_POST['submit'])){
                                        $idwig = $_POST['pilihwig'];
                                        $role  = $_POST['role'];
                                        $bulan = $_POST["pilihbulan".$role.""];
                                        $isiarray = json_decode($_POST["arrNil".$role.""]);
                                        $isiwigarray = json_decode($_POST["arrwigNil".$role.""]);
                                        
                                        $tabel = '<table class="table table-bordered"><thead><tr><th>LM-PIC/WIG</th><th>PENCAPAIAN</th><th>EMOTICON</th></tr></thead>';
                                        $tabel .= '<tbody>';
                                        $i = 0;
                                        $nilR = [];
                                        $nilT = [];
                                        foreach($isiarray as $isiarrayitems){
                                            $nilR[$i] = 0;
                                            $nilT[$i] = 0;
                                            $hasil[$i] = 0;
                                            $tabel .= '<tr>';
                                            $tabel .= '<td><a class="btn btn-info" href="#">'.$isiarrayitems->lm.' - <b>'.$isiarrayitems->pic.'</b></a></td>';
                                            foreach($isiarrayitems->data as $valueitems){
                                                if($valueitems->tanggal == $bulan){
                                                    foreach($valueitems->data as $isirtp){
                                                        if ($isiarrayitems->polaritas == 'positif' && $isiarrayitems->tipe == 'komulatif' || $isiarrayitems->polaritas == 'negatif' && $isiarrayitems->tipe == 'komulatif'){
                                                            $nilR[$i] += $isirtp->target;
                                                            $nilT[$i] += $isirtp->realisasi;
                                                        } else if ($isiarrayitems->polaritas == 'positif' && $isiarrayitems->tipe == 'nonkomulatif' || $isiarrayitems->polaritas == 'negatif' && $isiarrayitems->tipe == 'nonkomulatif'){
                                                            $nilR[$i] = $isirtp->target;
                                                            $nilT[$i] = $isirtp->realisasi;
                                                        }
                                                    }
                                                }
                                                if ($isiarrayitems->polaritas == 'positif' && $isiarrayitems->tipe == 'komulatif' || $isiarrayitems->polaritas == 'negatif' && $isiarrayitems->tipe == 'komulatif'){
                                                    $hasil[$i] = @(($nilR[$i]/$nilT[$i])*100);    
                                                } else if ($isiarrayitems->polaritas == 'positif' && $isiarrayitems->tipe == 'nonkomulatif' || $isiarrayitems->polaritas == 'negatif' && $isiarrayitems->tipe == 'nonkomulatif'){
                                                    $hasil[$i] = @((2-($nilR[$i]/$nilT[$i]))*100);
                                                }
                                            }
                                            $tabel .= '<td><a href="#" class="btn btn-success">'.round($hasil[$i],2).' %</a></td>';
                                            if (round($hasil[$i],2) >= 100){
                                                $tabel .= '<td><span class="far fa-smile-beam fa-2x"></span></td>';
                                            } else if (round($hasil[$i],2) >= 70 && round($hasil[$i],2) < 100){
                                                $tabel .= '<td><span class="far fa-frown fa-2x"></span></td>';
                                            } else if (round($hasil[$i],2) < 70){
                                                $tabel .= '<td><span class="far fa-sad-cry fa-2x"></span></td>';
                                            }
                                            
                                            $tabel .= '</tr>';
                                            $i++;
                                        }

                                        $sql = mysqli_query($conn, "SELECT * FROM tbl_wig WHERE id_wig='$idwig'");
                                        $getdata = mysqli_fetch_array($sql);
                                        $sql1 = mysqli_query($conn, "SELECT * FROM tbl_wigprogress WHERE id_wig='$idwig'");
                                        $sqlArr = mysqli_fetch_array($sql1);
                                        $nilRwig = 0;
                                        $nilTwig = 0;
                                        $hasilwig = 0;
                                        foreach(json_decode($sqlArr['value_wigprogress']) as $isisqlArr){
                                            if($isisqlArr->tanggal == $bulan){
                                                $tabel .= '<tr>';
                                                $tabel .= '<td><a href="#" class="btn btn-info">'.$idwig.'</a></td>';
                                                $nilRwig += $isisqlArr->realisasi;
                                                $nilTwig += $isisqlArr->target; 
                                                if ($getdata['polaritas'] == 'positif' && $getdata['tipe'] == 'komulatif' || $getdata['polaritas'] == 'negatif' && $getdata['tipe'] == 'komulatif'){
                                                    $hasilwig = @(($nilRwig/$nilTwig)*100);    
                                                } else if ($getdata['polaritas'] == 'positif' && $getdata['tipe'] == 'nonkomulatif' || $getdata['polaritas'] == 'negatif' && $getdata['tipe'] == 'nonkomulatif'){
                                                    $hasilwig = @((2-($nilRwig/$nilTwig))*100);
                                                }
                                                $tabel .= '<td><a href="#" class="btn btn-success">'.round($hasilwig,2).' %</a></td>';
                                                if (round($hasilwig,2) >= 100){
                                                    $tabel .= '<td><span class="far fa-smile-beam fa-2x"></span></td>';
                                                } else if (round($hasilwig,2) >= 70 && round($hasilwig,2) < 100){
                                                    $tabel .= '<td><span class="far fa-frown fa-2x"></span></td>';
                                                } else if (round($hasilwig,2) < 70){
                                                    $tabel .= '<td><span class="far fa-sad-cry fa-2x"></span></td>';
                                                }
                                                $tabel .= '</tr>';
                                            }
                                        }

                                        $tabel .= '</table>';
                                        echo $tabel;

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