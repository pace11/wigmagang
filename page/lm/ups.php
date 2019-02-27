<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">LM PROGRESS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">LM PROGRESS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $getdata = mysqli_query($conn, "SELECT * FROM tbl_lm 
                                        JOIN tbl_wig ON tbl_lm.id_wig=tbl_wig.id_wig
                                        WHERE tbl_lm.id_wig='$_GET[id]'") or die (mysqli_error($conn));
        $data    = mysqli_fetch_array($getdata);

        $lm = mysqli_query($conn, "SELECT lm_pic FROM tbl_lm WHERE id_wig='$_GET[id]'") or die (mysqli_error($conn));
        $hitlm = mysqli_num_rows($lm);
        $getlm = mysqli_fetch_array($lm);


    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <h4><i class="fas fa-file-alt"></i> FORM WIG PROGRESS</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <div class="form-group">
                                                    <button class="btn btn-success"><i class="fas fa-map-marker"></i> <?= $data['id_wig'] ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <a href="#" class="btn btn-success btn-sm"><?= $data['judul'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <a href="#" class="btn btn-success btn-sm"><?= $data['username'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-calendar-alt"></i> <?= date('d-m-Y', strtotime($data['tanggal'])) ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Target WIG</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="#" class="btn btn-success btn-sm"><?= $data['target'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Satuan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="#" class="btn btn-success btn-sm"><?= $data['satuan'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <?php if($hitlm) { ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Pilih LM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php 
                                                        $datalm = json_decode($getlm['lm_pic']);
                                                        foreach($datalm as $lmitems){
                                                            $isi['lm']  = $lmitems->lm;
                                                            $isi['pic'] = $lmitems->pic;
                                                            $isi['polaritas'] = $lmitems->polaritas;
                                                            $isi['tipe'] = $lmitems->tipe;
                                                            $isi['data'] = $lmitems->data;
                                                            $dataarrLm[] = $isi;
                                                        }
                                                            $dataarrLm = json_encode($dataarrLm);
                                                    ?>
                                                    <textarea style="display:none;" id="dataarrlm"><?= $dataarrLm ?></textarea>
                                                    <select name="" class="form-control" id="lmdata">
                                                    <?php
                                                        $no = 0;
                                                        $datalm = json_decode($getlm['lm_pic']);
                                                        foreach($datalm as $lmitems){
                                                            echo "<option value='$no'>LM : ".$lmitems->lm." - PIC : ".$lmitems->pic."</option>";
                                                            $no++;
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="tgl-row">
                                            <div class="col-md-2">
                                                <label>Tanggal</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group tgl-content">
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-info" value="Simpan">
                            <a href="?page=progress" class="btn btn-danger">Batal</a>
                        </div>
                        </form>
                        <?php 
                        
                        if (isset($_POST['submit'])) {
                    
                        }

                        ?>
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
    $('#tgl-row').hide();
    $('#lmdata').change(function(){
        nil = $(':selected').val();
        var arrdatalm = JSON.parse($('#dataarrlm').val());
        $.each(arrdatalm, function(i, val){
            if (nil == i) {
                $('#tgl-row').show();
                var isi = "";
                    isi += '<select id="pace" class="form-control">';
                    $.each(arrdatalm[i].data, function(j,key){
                        isi += '<option value="'+arrdatalm[i].data[j].tanggal+'">'+arrdatalm[i].data[j].tanggal+'</option>';
                    });
                    isi += '</select>';
                    $('.tgl-content').html(isi);
                    $( "#pace option:selected").change(function(){
                        console,log(this.val());
                    });
            }
        });
    });
  });
</script>


