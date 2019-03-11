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
                                        <form action="?page=lmprogressenter&id=<?= $data['id_wig'] ?>" method="post" enctype="multipart/form-data">
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
                                                    <select name="lmdata" class="form-control" id="lmdata">
                                                    <option style="display:none;">-- pilih salah satu --</option>
                                                    <?php
                                                        $no = 0;
                                                        $datalm = json_decode($getlm['lm_pic']);
                                                        foreach($datalm as $lmitems){
                                                            $isvalue = "tgl ".$lmitems->lm." ".$lmitems->pic;
                                                            echo "<option value='".str_replace(' ','_', $isvalue)."'>LM : ".$lmitems->lm." - PIC : ".$lmitems->pic."</option>";
                                                            $no++;
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        $idtgl = 0;
                                        foreach($datalm as $lmitems){
                                        $isvalue = "tgl ".$lmitems->lm." ".$lmitems->pic;
                                        $idvalue = str_replace(' ','_', $isvalue);?>
                                        <div class="row tglitems" id="<?= $idvalue ?>">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Tanggal</label>
                                                    </div>
                                                    <div class="col-md-10" style="background:#f5f5f5;padding:20px;border-radius:5px;">
                                                        <div class="row" id="tgl-div-out<?= $idtgl.$idtgl ?>">
                                                        <input type="hidden" id="countout<?= $idtgl.$idtgl ?>" value="<?= count($lmitems->data) ?>">
                                                        <?php
                                                            $nil = 0;
                                                            foreach($lmitems->data as $lmtglitems){ ?>
                                                                <div id="tgldivout<?= $idtgl.$idtgl.$nil ?>" class="col-md-12" style="background:#dedede;padding:15px;border-radius:5px;margin-bottom:10px">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" class="datepicker form-control" value="<?= date('d-m-Y', strtotime($lmtglitems->tanggal)) ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <?php 
                                                                        $nul = 0;
                                                                        foreach($lmtglitems->data as $itemcontent) { ?>
                                                                        <input type="hidden" id="countin<?= $idtgl.$idtgl.$nil ?>" value="<?= count($lmtglitems->data) ?>">
                                                                        <div class="col-md-4" id="weeks<?= $idtgl.$idtgl.$nil ?>">
                                                                            <div class="form-group" id="week-item<?= $idtgl.$idtgl.$nil.$nul ?>">
                                                                                <input type="text" class="form-control" value="<?= $itemcontent->week ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4" id="targets<?= $idtgl.$idtgl.$nil ?>">
                                                                            <div class="form-group" id="target-item<?= $idtgl.$idtgl.$nil.$nul ?>">
                                                                                <input type="text" class="form-control" value="<?= $itemcontent->target ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4" id="realisasis<?= $idtgl.$idtgl.$nil ?>">
                                                                            <div class="form-group" id="realisasi-item<?= $idtgl.$idtgl.$nil.$nul ?>">
                                                                                <input type="text" class="form-control" value="<?= $itemcontent->realisasi ?>">
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input type='button' class="btn btn-info tmbItem" value='+' id="tambahItem<?= $idtgl.$idtgl.$nil ?>">
                                                                                <input type='button' class="btn btn-danger kurItem" value='-' id="kurangItem<?= $idtgl.$idtgl.$nil ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php $nil++; ?>
                                                                </div>
                                                        <?php    
                                                            }
                                                        ?>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="button" class="btn btn-info addButton" value="tambah tanggal" id="buttonTambah<?= $idtgl.$idtgl ?>">
                                                                    <input type="button" class="btn btn-danger removeButton" value="hapus tanggal" id="buttonHapus<?= $idtgl.$idtgl ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <?php $idtgl++; }} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-info" value="Proses">
                            <a href="?page=progress" class="btn btn-danger">Batal</a>
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
    $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true, 
      todayHighlight: true
    });
  });
</script>
<script>
  $(document).ready(function(){
    var nil = '',
        nul = '';
    $('.tglitems').each(function(){
        $('#'+this.id).hide();
    });
    $('#lmdata').change(function(){
        nil = $(':selected').val();
        $('.tglitems').each(function(){
            nul = this.id;
            if (nil == nul){
                $('#'+nul).show();
            } else {
                $('#'+nul).hide();
            }
        });
    });
  });
</script>
<script>
$(function(){

    var counter = '',
        counters = '';

    $.each($('.addButton'), function(i,val){
        $("#buttonTambah"+i+i).click(function(){
            counter = $("#countout"+i+i).val();
            var nil = 1;
            	
            var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'tgldivout' +i+i+counter);
            var isi = '<div id="tgldivout'+i+i+counter+'" class="col-md-12" style="background:#dedede;padding:15px;border-radius:5px;margin-bottom:10px">'+
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<input type="date" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<input type="hidden" id="countin'+i+i+counter+'" value="'+nil+'">'+
                                '<div class="col-md-4" id="weeks'+i+i+counter+'">'+
                                    '<div class="form-group" id="week-item'+i+i+counter+'0">'+
                                        '<input type="text" class="form-control" name="week" placeholder="masukkan keterangan week ...">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4" id="targets'+i+i+counter+'">'+
                                    '<div class="form-group" id="target-item'+i+i+counter+'0">'+
                                        '<input type="text" class="form-control" name="target" placeholder="masukkan nilai target ...">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4" id="realisasis'+i+i+counter+'">'+
                                    '<div class="form-group" id="realisasi-item'+i+i+counter+'0">'+
                                        '<input type="text" class="form-control" name="realisasi" placeholder="masukkan nilai realisasi ...">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        '<input type="button" class="btn btn-info tmbItem" value="+" id="tambahItem'+i+i+counter+'">'+
                                        '<input type="button" class="btn btn-danger" value="-"id="kurangItem'+i+i+counter+'">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
            $("#tgl-div-out"+i+i).append(isi);
            counter++;
            $("#countout"+i+i).val(counter);
        });
        $.each($('.tmbItem'), function(j,values){
            $("#tambahItem"+i+i+j).click(function(){
                counters = $("#countin"+i+i+j).val();
            
                var childBoxDiv1 = $(document.createElement('div')).attr("id", 'week-item' +i+i+j+counters),
                    childBoxDiv2 = $(document.createElement('div')).attr("id", 'target-item' +i+i+j+counters),
                    childBoxDiv3 = $(document.createElement('div')).attr("id", 'realisasi-item' +i+i+j+counters);

                    childBoxDiv1.after().html('<div class="form-group" id="week-item'+i+i+j+counters+'"><input type="text" class="form-control" name="week'+counters+'" placeholder="masukkan keterangan week ..."></div>');
                    childBoxDiv2.after().html('<div class="form-group" id="target-item'+i+i+j+counters+'"><input type="text" class="form-control" placeholder="masukkan nilai target ..." required></div>');
                    childBoxDiv3.after().html('<div class="form-group" id="realisasi-item'+i+i+j+counters+'"><input type="text" class="form-control" placeholder="masukkan nilai realisasi ..." required></div>');
                
                    childBoxDiv1.appendTo("#weeks"+i+i+j);
                    childBoxDiv2.appendTo("#targets"+i+i+j);
                    childBoxDiv3.appendTo("#realisasis"+i+i+j);
                
                counters++;
                $("#countin"+i+i+j).val(counters);
            });
        });
    });

    $.each($('.removeButton'), function(i,val){
        $("#buttonHapus"+i+i).click(function () {
            counter = $("#countout"+i+i).val();
            if(counter==1){
                alert("Minimal 1 Textbox");
                return false;
            }
            counter--;
            $("#countout"+i+i).val(counter);
            $("#tgldivout"+i+i+counter).remove();
        });
    });
    
});
</script>


 


