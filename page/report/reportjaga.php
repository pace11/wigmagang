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
                                                        <label>Pilih Supervisor</label>
                                                        <select name="pilihspv" id="selectspv" class="form-control">
                                                            <option style="display:none;">-- pilih salah satu --</option>
                                                            <?php 
                                                            $q = mysqli_query($conn, "SELECT * FROM tbl_wig GROUP BY username");
                                                            while($data = mysqli_fetch_array($q)){
                                                                echo "<option value='".$data['username']."'>".$data['username']."</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <input id="role" type="hidden" name="role">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_wig GROUP BY username");
                                            while($data = mysqli_fetch_array($q)){
                                        ?>
                                        <div class="col-md-4 wig" id="<?= $data['username'] ?>">
                                            <div class="form-group">
                                            <label>Pilih WIG</label>
                                                <select name="pilihwig<?= $data['username'] ?>" id="selectwig<?= $data['username'] ?>" class="form-control optwig">
                                                    <option>-- pilih salah satu --</option>
                                                <?php
                                                    $datawig = mysqli_query($conn, "SELECT * FROM tbl_wig WHERE username='$data[username]'");
                                                    while($listdatawig = mysqli_fetch_array($datawig)){
                                                        echo "<option value=$listdatawig[id_wig]>$listdatawig[id_wig]</option>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php 
                                        $q2 = mysqli_query($conn, "SELECT * FROM tbl_wig");
                                        while($data2 = mysqli_fetch_array($q2)){
                                        ?>
                                        <div class="col-md-4 bulan" id="<?= $data2['id_wig'] ?>">
                                            <div class="form-group">
                                                <label>Pilih Bulan</label>
                                                <select name="pilihbulan<?= $data2['id_wig'] ?>" class="form-control">
                                                    <option style="display:none;">-- pilih salah satu --</option>
                                                <?php 
                                                
                                                $databulan = mysqli_query($conn, "SELECT * FROM tbl_wigprogress WHERE id_wig='$data2[id_wig]'");
                                                $arrdatabulan = mysqli_fetch_array($databulan);
                                                $valuedatabulan = json_decode($arrdatabulan['value_wigprogress']);
                                                    foreach($valuedatabulan as $listdatabulan){
                                                        echo "<option value=$listdatabulan->tanggal>".date('F', strtotime($listdatabulan->tanggal))."</option>";
                                                    }

                                                    $arrbulan = mysqli_query($conn, "SELECT * FROM tbl_lm WHERE id_wig='$data2[id_wig]'");
                                                    $isiarrbulan = mysqli_fetch_array($arrbulan);
                                                    $jsonarrbulan = json_decode($isiarrbulan['lm_pic']);
                                                ?>
                                                </select>
                                                <textarea style="display:none;" name="nilaijson<?= $data2['id_wig'] ?>"><?= json_encode($jsonarrbulan) ?></textarea>
                                            </div>
                                        </div>
                                        <?php } ?>
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
                                        $idspv = $_POST['pilihspv'];
                                        $idwig = $_POST["pilihwig".$idspv.""];
                                        $bulan = $_POST["pilihbulan".$idwig.""];
                                        $isiarray = json_decode($_POST["nilaijson".$idwig.""]);
                                        
                                        $tabel = '<div class="alert alert-info alert-dismissible">';
                                        $tabel .= '<h5><i class="icon fa fa-file-alt"></i> Report</h5>';
                                        $tabel .= 'supervisor : <span class="fas fa-user"></span> <b>'.$idspv.'</b> , tgl/bulan : <span class="fas fa-calendar-alt"></span> <b>'.date('d-M-Y', strtotime($bulan)).'</b></div>';
                                        
                                        $tabel .= '<table class="table table-bordered"><thead><tr><th>LM-PIC/WIG</th><th>PENCAPAIAN</th><th>EMOTICON</th></tr></thead>';
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

                                            $tabel .= '<td><a href="#" class="btn btn-success">';
                                            $tabel .= ''.(is_nan($hasil[$i])) ? '0' : round($hasil[$i],2).'%';
                                            $tabel .= '</a></td>';
                                            if (is_nan($hasil[$i])){
                                                $tabel .= '<td>-- data belum ada --</td>';
                                            } else {
                                                if (round($hasil[$i],2) >= 100){
                                                    $tabel .= '<td><span class="far fa-smile-beam fa-2x"></span></td>';
                                                } else if (round($hasil[$i],2) >= 70 && round($hasil[$i],2) < 100){
                                                    $tabel .= '<td><span class="far fa-frown fa-2x"></span></td>';
                                                } else if (round($hasil[$i],2) < 70){
                                                    $tabel .= '<td><span class="far fa-sad-cry fa-2x"></span></td>';
                                                }
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
                                                $tabel .= '<td><a href="#" class="btn btn-success">';
                                                $tabel .= ''.(is_nan($hasilwig)) ? '0' : round($hasilwig,2).'%';
                                                $tabel .= '</a></td>';for($a=0;$a<count($isiarray);$a++){
                                            
                                                }
                                                if(is_nan($hasilwig)){
                                                    $tabel .= '<td>-- data belum ada --</td>';
                                                } else {
                                                    if (round($hasilwig,2) >= 100){
                                                        $tabel .= '<td><span class="far fa-smile-beam fa-2x"></span></td>';
                                                    } else if (round($hasilwig,2) >= 70 && round($hasilwig,2) < 100){
                                                        $tabel .= '<td><span class="far fa-frown fa-2x"></span></td>';
                                                    } else if (round($hasilwig,2) < 70){
                                                        $tabel .= '<td><span class="far fa-sad-cry fa-2x"></span></td>';
                                                    }
                                                }
                                                $tabel .= '</tr>';
                                            }
                                        }

                                        $tabel .= '</table>';
                                        echo $tabel;
                                        
                                        $j = 0;
                                        foreach($isiarray as $listisiarray){
                                            foreach($listisiarray->data as $listisibulan){
                                                if ($listisibulan->tanggal == $bulan){
                                                    $k = 0;
                                                    foreach($listisibulan->data as $listisian){
                                                        $isian[$j] = [
                                                                "target" => $listisian->target,
                                                                "realisasi" => $listisian->realisasi,
                                                            ];
                                                            $isi[$j] = [
                                                                "data" => [
                                                                    $isian[$j],
                                                                ],
                                                            ];
                                                    $k++;
                                                    }
                                                    
                                                }                                    
                                            }
                                        $j++;
                                        }
                                        $jsonaja = json_encode($isi);

                                        echo $jsonaja;

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

    $('.wig').each(function(){
       $('#'+this.id).hide();
    });
    $('.bulan').each(function(){
       $('#'+this.id).hide();
    });
    $("#btnproses").hide();

    var nil = "",
        nul = "",
        nal = "",
        nel = "";

    $('#selectspv').change(function(){
        nil = $(':selected').val();
        $('.wig').each(function(i, val){
            nul = this.id;
            if (nil == nul){
                $('#'+nul).show();
            } else {
                $('#'+nul).hide();
            }
        });
    });

    $('.optwig').each(function(){
        $('#'+this.id).change(function(){
            nal = $('#'+this.id).find(':selected').val();
            $('.bulan').each(function(){
                nel = this.id;
                if (nal == nel){
                    $("#btnproses").show();
                    $('#'+nel).show();
                } else {
                    $('#'+nel).hide();
                }
            });
        });
    });
});

</script>
