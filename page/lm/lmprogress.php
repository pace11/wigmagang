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

        $getval = mysqli_query($conn, "SELECT value_wigprogress FROM tbl_wigprogress WHERE id_wig='$_GET[id]'") or die (mysqli_error($conn));
        $hitval = mysqli_num_rows($getval);
        $dataval = mysqli_fetch_array($getval);


    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <h4><i class="fas fa-file-alt"></i> FORM LM PROGRESS</h4>
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
                                                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($data['tanggal'])) ?></a>
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
                                        <?php if($hitval) { ?>
                                        <div class="row">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Tanggal</th>
                                                        <th>Target</th>
                                                        <th>Realisasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $json = json_decode($dataval['value_wigprogress']);
                                                    $no=1;
                                                    foreach($json as $item) {
                                                        echo "<tr>";
                                                        echo "<td>".$no."</td>";
                                                        echo "<td><a href='#' class='btn btn-success btn-sm'><i class='fas fa-calendar-alt'></i> ".date('d M Y',strtotime($item->tanggal))."</a></td>";
                                                        echo "<td><a href='#' class='btn btn-info btn-sm'>".$item->target."</a></td>";
                                                        echo "<td><a href='#' class='btn btn-danger btn-sm'>".$item->realisasi."</a></td>";
                                                        echo "</tr>";
                                                        $no++;
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php } ?>
                                        <hr>
                                        <?php if($hitlm) { ?>
                                        <form action="?page=lmprogress&id=<?= $data['id_wig'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Pilih LM</label>
                                                    <input type="hidden" name="id_wig" value="<?= $data['id_wig'] ?>">
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
                                                    <textarea id="dataarrlm" style="display:none;" name="datarraylm"><?= $dataarrLm ?></textarea>
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
                                                    <input type="hidden" id="selecthis" name="selecthis">
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
                                                        <input type="hidden" id="countout<?= $idtgl.$idtgl ?>" name="countout<?= $idtgl.$idtgl ?>" value="<?= count($lmitems->data) ?>">
                                                        <?php
                                                            $nil = 0;
                                                            foreach($lmitems->data as $lmtglitems){ ?>
                                                                <div id="tgldivout<?= $idtgl.$idtgl.$nil ?>" class="col-md-12" style="background:#dedede;padding:15px;border-radius:5px;margin-bottom:10px">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" name="datetgl<?= $idtgl.$idtgl.$nil ?>" class="datepicker form-control" value="<?= date('d-m-Y', strtotime($lmtglitems->tanggal)) ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <input type="hidden" id="countin<?= $idtgl.$idtgl.$nil ?>" name="countin<?= $idtgl.$idtgl.$nil ?>" value="<?= count($lmtglitems->data) ?>">
                
                                                                        <div class="col-md-4" id="weeks<?= $idtgl.$idtgl.$nil ?>">
                                                                        <?php $nul = 0;foreach($lmtglitems->data as $itemcontent) { ?>
                                                                            <div class="form-group" id="week-item<?= $idtgl.$idtgl.$nil.$nul ?>">
                                                                                <input type="text" name="weekisi<?= $idtgl.$idtgl.$nil.$nul ?>" class="form-control" value="<?= $itemcontent->week ?>" placeholder="masukkan keterangan week ...">
                                                                            </div>
                                                                        <?php $nul++; } ?>
                                                                        </div>
                                                                        <div class="col-md-4" id="targets<?= $idtgl.$idtgl.$nil ?>">
                                                                        <?php $nultwo = 0;foreach($lmtglitems->data as $itemcontent) { ?>
                                                                            <div class="form-group" id="target-item<?= $idtgl.$idtgl.$nil.$nultwo ?>">
                                                                                <input type="text" name="targetisi<?= $idtgl.$idtgl.$nil.$nultwo ?>" class="form-control" value="<?= $itemcontent->target ?>" placeholder="masukkan nilai target ...">
                                                                            </div>
                                                                        <?php $nultwo++;} ?>
                                                                        </div>
                                                                        <div class="col-md-4" id="realisasis<?= $idtgl.$idtgl.$nil ?>">
                                                                        <?php $nulthr = 0;foreach($lmtglitems->data as $itemcontent) { ?>
                                                                            <div class="form-group" id="realisasi-item<?= $idtgl.$idtgl.$nil.$nulthr ?>">
                                                                                <input type="text" name="realisi<?= $idtgl.$idtgl.$nil.$nulthr ?>" class="form-control" value="<?= $itemcontent->realisasi ?>" placeholder="masukkan nilai realisasi ...">
                                                                            </div>
                                                                        <?php $nulthr++; } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input type="button" class="btn btn-info tmbItem" value='+' id="tambahItem<?= $idtgl.$idtgl.$nil ?>">
                                                                                <input type="button" class="btn btn-danger kurItem" value='-' id="kurangItem<?= $idtgl.$idtgl.$nil ?>">
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
                    <div>
                    <?php 
                    
                    if (isset($_POST['submit'])){
                        $select = $_POST['selecthis'];
                        $idwig = $_POST['id_wig'];
                        $int = $_POST["countout".$select.$select.""];
                        $arr = json_decode($_POST['datarraylm']);
                        
                        for($a=0;$a<$int;$a++){
                            $isiout['tanggal'] = date("Y-m-d", strtotime($_POST["datetgl".$select.$select.$a.""]));
                            $nil = $_POST["countin".$select.$select.$a.""];
                            for($b=0;$b<$nil;$b++){
                                $isiin['week'] = $_POST["weekisi".$select.$select.$a.$b.""];
                                $isiin['target'] = (double) $_POST["targetisi".$select.$select.$a.$b.""];
                                $isiin['realisasi'] = (double) $_POST["realisi".$select.$select.$a.$b.""];
                                $lm_in[$b] = $isiin;
                                $isiout['data'] = $lm_in;
                            }
                            $lm_pic[] = $isiout;
                        }
                        foreach($arr as $key => $value){
                            $arr[$select]->data = $lm_pic; 
                        }
                            $hasil = json_encode($arr);

                        $update = mysqli_query($conn, "UPDATE tbl_lm SET
                                                    lm_pic = '$hasil'
                                                    WHERE id_wig = '$idwig'");
                        if($update){
                            echo    '<div class="row">'.
                                        '<div class="col-md-12">'.
                                            '<div class="alert alert-success alert-dismissible">'.
                                            '<h5><i class="icon fa fa-check"></i> Alert!</h5>'.
                                            'Data berhasil disimpan.</div>'.
                                        '</div>'.
                                    '</div>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=lmprogress&id=$idwig'>";
                        }
                       
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
        console.log(this.id);
    });
    $('#lmdata').change(function(){
        nil = $(':selected').val();
        $('.tglitems').each(function(i, val){
            nul = this.id;
            if (nil == nul){
                $("#selecthis").val(i);
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
            
            if(counter > 11){
                alert("Maksimal 12 Textbox untuk 12 Bulan");
                return false;
            }
            var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'tgldivout' +i+i+counter);
            var isi = '<div id="tgldivout'+i+i+counter+'" class="col-md-12" style="background:#dedede;padding:15px;border-radius:5px;margin-bottom:10px">'+
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<input type="date" name="datetgl'+i+i+counter+'" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<input type="hidden" name="countin'+i+i+counter+'" id="countin'+i+i+counter+'" value="'+nil+'">'+
                                '<div class="col-md-4" id="weeks'+i+i+counter+'">'+
                                    '<div class="form-group" id="week-item'+i+i+counter+'0">'+
                                        '<input type="text" class="form-control" name="weekisi'+i+i+counter+'0" placeholder="masukkan keterangan week ...">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4" id="targets'+i+i+counter+'">'+
                                    '<div class="form-group" id="target-item'+i+i+counter+'0">'+
                                        '<input type="text" class="form-control" name="targetisi'+i+i+counter+'0" placeholder="masukkan nilai target ...">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4" id="realisasis'+i+i+counter+'">'+
                                    '<div class="form-group" id="realisasi-item'+i+i+counter+'0">'+
                                        '<input type="text" class="form-control" name="realisi'+i+i+counter+'0" placeholder="masukkan nilai realisasi ...">'+
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
                if(counters > 4){
                    alert("Maksimal 5 Textbox untuk 5 Week");
                    return false;
                }
                var childBoxDiv1 = $(document.createElement('div')).attr("id", 'week-item' +i+i+j+counters),
                    childBoxDiv2 = $(document.createElement('div')).attr("id", 'target-item' +i+i+j+counters),
                    childBoxDiv3 = $(document.createElement('div')).attr("id", 'realisasi-item' +i+i+j+counters);

                    childBoxDiv1.after().html('<div class="form-group" id="week-item'+i+i+j+counters+'"><input type="text" class="form-control" name="weekisi'+i+i+j+counters+'" placeholder="masukkan keterangan week ..."></div>');
                    childBoxDiv2.after().html('<div class="form-group" id="target-item'+i+i+j+counters+'"><input type="text" class="form-control" name="targetisi'+i+i+j+counters+'" placeholder="masukkan nilai target ..."></div>');
                    childBoxDiv3.after().html('<div class="form-group" id="realisasi-item'+i+i+j+counters+'"><input type="text" class="form-control" name="realisi'+i+i+j+counters+'" placeholder="masukkan nilai realisasi ..."></div>');
                
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
                alert("Minimal 1 Textbox untuk 1 Bulan");
                return false;
            }
            counter--;
            $("#countout"+i+i).val(counter);
            $("#tgldivout"+i+i+counter).remove();
        });
        $.each($(".kurItem"), function(j, values){
            $("#kurangItem"+i+i+j).click(function(){
                counters = $("#countin"+i+i+j).val();
                if(counters==1){
                    alert("Minimal 1 Textbox untuk 1 Week");
                    return false;
                }
                counters--;
                $("#countin"+i+i+j).val(counters);
                $("#week-item"+i+i+j+counters).remove();
                $("#target-item"+i+i+j+counters).remove();
                $("#realisasi-item"+i+i+j+counters).remove();
            });
        });
    });
    
});
</script>


 


