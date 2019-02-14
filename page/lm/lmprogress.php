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
                                                    <input type="text" id="counter">
                                                </div>
                                                <div class="form-group" id="week-div"></div>
                                                <div class="form-group" id="target-div"></div>
                                                <div class="form-group" id="real-div"></div>
                                            </div>
                                        </div>
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
                            $tanggal = date("Y-m-d", strtotime($_POST['tanggal']));
                            $realisasi = (!empty($_POST['realisasi'])) ? $_POST['realisasi'] : "0";
                            $target = $_POST['target'];
                            $idwig = $_POST['idwig'];
                            $hitval = $_POST['hitval'];
                            if ($hitval > 0){
                                $arr = json_decode($_POST['DataArray']);
                            }

                            $isi['tanggal'] = $tanggal;
                            $isi['target'] = $target;
                            $isi['realisasi'] = $realisasi;
                            $value[] = $isi;
                            $nilValue1 = json_encode($value);
                            $result = $nilValue1;
                            
                            if ($hitval == 0) 
                            {
                                $query = mysqli_query($conn, "INSERT INTO tbl_wigprogress SET
                                                        id_wig = '$idwig',
                                                        value_wigprogress = '$result'
                                                        ") or die (mysqli_error($conn));
                            }
                            else if ($hitval > 0)
                            {
                                $nilValue2 = json_decode($nilValue1);
                                $merge = array_merge($arr,$nilValue2);
                                $result = json_encode($merge);

                                $query = mysqli_query($conn, "UPDATE tbl_wigprogress SET
                                                        value_wigprogress = '$result'
                                                        WHERE id_wig = '$idwig'
                                                        ") or die (mysqli_error($conn));
                            }

                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=wigprogress&id=".$idwig."'>";
                        }

                        if (isset($_POST['edit'])){
                            $counter = $_POST['counter'];
                            $idwig = $_POST['idwig'];

                            for ($a=0;$a<$counter;$a++) {
                                $isi['tanggal']     = date('Y-m-d',strtotime($_POST["tgl".$a.""]));
                                $isi['target']   = $_POST["target".$a.""];
                                $isi['realisasi']   = $_POST["real".$a.""];
                                $value_wig[] = $isi;
                            }
                            $valueWig = json_encode($value_wig);
                            
                            $input = mysqli_query($conn,"UPDATE tbl_wigprogress SET
                                    value_wigprogress   = '$valueWig'
                                    WHERE id_wig        = '$idwig'
                                    ") or die (mysqli_error($conn));
                                    
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=wigprogress&id=".$idwig."'>";
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
    var nil = 1,
        count = "",
        arrdatalmkey = "",
        newTextBoxDiv1 = "",
        newTextBoxDiv2 = "",
        newTextBoxDiv3 = "";

    $('#lmdata').change(function(){
        nil = $(':selected').val();
        var arrdatalm = JSON.parse($('#dataarrlm').val());
        // console.log(arrdatalm);
        $.each(arrdatalm, function(i, val){
            if (nil == i) {
                count = arrdatalm[i].data.length;
                arrdatalmkey = arrdatalm[i].data;
                $('#counter').val(count);
                $.each(arrdatalmkey, function(j,key){
                    newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'TextBoxDiv1' + j);
                    newTextBoxDiv2 = $(document.createElement('div')).attr("id", 'TextBoxDiv2' + j);
                    newTextBoxDiv3 = $(document.createElement('div')).attr("id", 'TextBoxDiv3' + j);
                    newTextBoxDiv1.after().html('<input type="text" style="margin-top:10px;" class="form-control" name="week'+j+'" value="'+arrdatalmkey[j].week+'" required>');
                    newTextBoxDiv2.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan nilai target ..." name="target'+j+'" value="'+arrdatalmkey[j].target+'" required>');
                    newTextBoxDiv3.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan nilai realisasi ..." name="real'+j+'" value="'+arrdatalmkey[j].realisasi+'" required>');
                    newTextBoxDiv1.appendTo("#week-div");
                    newTextBoxDiv2.appendTo("#target-div");
                    newTextBoxDiv3.appendTo("#real-div");
                });
            }
        });
    });
  });
</script>
<script>
$(function(){
    var counter = $('#counter').val();
    $('#counter').val(counter);
    $("#addButton").click(function(){		

        var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'TextBoxDiv1' + counter),
            newTextBoxDiv2 = $(document.createElement('div')).attr("id", 'TextBoxDiv2' + counter),
            newTextBoxDiv3 = $(document.createElement('div')).attr("id", 'TextBoxDiv3' + counter);
        newTextBoxDiv1.after().html('<input type="date" style="margin-top:10px;" class="form-control" name="week'+counter+'" value="week'+counter+'" required>');
        newTextBoxDiv2.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan nilai target ..." name="target'+counter+'" required>');
        newTextBoxDiv3.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan nilai realisasi ..." name="real'+counter+'" required>');
        newTextBoxDiv1.appendTo("#week-div");
        newTextBoxDiv2.appendTo("#target-div");
        newTextBoxDiv3.appendTo("#real-div");		
        counter++;
        $('#counter').val(counter);
    });

    $("#removeButton").click(function () {
	    if(counter==1){
            alert("Minimal 1 Textbox");
            return false;
        }
	      counter--;
        $('#counter').val(counter);
        $("#TextBoxDiv1" + counter).remove();
        $("#TextBoxDiv2" + counter).remove();
        $("#TextBoxDiv3" + counter).remove();
    });
  });
</script> 


