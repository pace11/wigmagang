<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">WIG PROGRESS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                        <li class="breadcrumb-item active">WIG PROGRESS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $getdata = mysqli_query($conn, "SELECT * FROM tbl_wig 
                                        JOIN tbl_wigprogress ON tbl_wig.id_wig=tbl_wigprogress.id_wig
                                        WHERE tbl_wig.id_wig='$_GET[id]'") or die (mysqli_error($conn));
        $data    = mysqli_fetch_array($getdata);

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
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Terakhir Diupdate</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="<?= date('d-M-Y H:i:s', strtotime($data['update_at'])) ?> - oleh USER ini"readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($hitval) { 
                                            $datgraf = json_decode($dataval['value_wigprogress']);
                                                foreach($datgraf as $datas) {
                                                    $isitanggal[] = date("M",strtotime($datas->tanggal));
                                                    $isirealisasi[] = $datas->realisasi;
                                                }   
                                            ?>
                                            
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button id="editwigprogressBtn" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> ubah nilai realisasi</button>
                                                        <button id="sembunyiBtn" class="btn btn-info btn-sm">sembunyikan <i class="fas fa-chevron-up"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="editrealisasi" class="row" style="background-color:#f2f2f2;padding:10px;border-radius:5px;margin-bottom:10px;">
                                                <div class="col-md-12">
                                                    <form action="?page=wigprogress&id=<?= $data['id_wig'] ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Tanggal</label>
                                                            <input type="hidden" value="<?= $data['id_wig'] ?>" name="idwig">
                                                            <input type="hidden" name="counter" class="form-control" id="counter" value="<?= count(json_decode($dataval['value_wigprogress'])) ?>">
                                                            <div class="form-group" id="tgl-div">
                                                            <?php
                                                                $a=0;
                                                                foreach($json as $tanggal) {
                                                                    echo '<div id="TextBoxDiv1'.$a.'">';
                                                                    echo '<input type="date" style="margin-top:10px" class="form-control" placeholder="masukkan tanggal ..." name="tgl'.$a.'" value="'.$tanggal->tanggal.'" required>';
                                                                    echo '</div>';
                                                                    $a++;
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Target</label>
                                                            <div class="form-group" id="target-div">
                                                            <?php 
                                                                $b=0;
                                                                foreach($json as $target) {
                                                                    echo '<div id="TextBoxDiv2'.$b.'">';
                                                                    echo '<input type="text" style="margin-top:10px" class="form-control" placeholder="masukkan nilai target ..." name="target'.$b.'" value="'.$target->target.'" required>';
                                                                    echo '</div>';
                                                                    $b++;
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Realisasi</label>
                                                            <div class="form-group" id="real-div">
                                                            <?php 
                                                                $c=0;
                                                                foreach($json as $real) {
                                                                    echo '<div id="TextBoxDiv3'.$c.'">';
                                                                    echo '<input type="text" style="margin-top:10px" class="form-control" placeholder="masukkan nilai realisasi ..." name="real'.$c.'" value="'.$real->realisasi.'" required>';
                                                                    echo '</div>';
                                                                    $c++;
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type='button' class="btn btn-info" value='tambah tanggal dan realisasi' id='addButton'>
                                                                <input type='button' class="btn btn-danger" value='hapus tanggal dan realisasi' id='removeButton'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="submit" name="edit" class="btn btn-success" value="Simpan Perubahan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
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
    $('#sembunyiBtn').hide();
    $('#editrealisasi').hide();

    $('#editwigprogressBtn').click(function(){
      $('#sembunyiBtn').show(500);
      $('#editrealisasi').show(500);
    });

    $('#sembunyiBtn').click(function(){
      $('#sembunyiBtn').hide(500);
      $('#editrealisasi').hide(500);
    });
  });
</script>
<script>
$(function(){
    var counter = $('#counter').val();
    console.log(counter);
    $('#counter').val(counter);
    $("#addButton").click(function(){		

        var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'TextBoxDiv1' + counter),
            newTextBoxDiv2 = $(document.createElement('div')).attr("id", 'TextBoxDiv2' + counter),
            newTextBoxDiv3 = $(document.createElement('div')).attr("id", 'TextBoxDiv3' + counter);
        newTextBoxDiv1.after().html('<input type="date" style="margin-top:10px;" class="form-control" placeholder="masukkan tanggal ..." name="tgl'+counter+'" required>');
        newTextBoxDiv2.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan nilai target ..." name="target'+counter+'" required>');
        newTextBoxDiv3.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan nilai realisasi ..." name="real'+counter+'" required>');
        newTextBoxDiv1.appendTo("#tgl-div");
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


