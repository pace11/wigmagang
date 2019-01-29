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
    <?php 
        $get_id = mysqli_query($conn, "SELECT id_wig FROM tbl_wig WHERE SUBSTRING(id_wig,1,3)='WIG'") or die (mysqli_error($conn));
        $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_wig,-4,4) as hasil FROM tbl_wig WHERE SUBSTRING(id_wig,1,3)='WIG' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
        $hit    = mysqli_num_rows($get_id);
        if ($hit == 0){
            $id_k   = "WIG0001";
        } else if ($hit > 0){
            $row    = mysqli_fetch_array($trim_id);
            $kode   = $row['hasil']+1;
            $id_k   = "WIG".str_pad($kode,4,"0",STR_PAD_LEFT); 
        }
        
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        
                        <div class="card-header">
                            <h4><i class="fas fa-file-alt"></i> Form Tambah Data</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="?page=wigtambahpro" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4"> 
                                                    <div class="form-group">
                                                        <button class="btn btn-success"><i class="fas fa-map-marker"></i> <?= $id_k ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input type="hidden" value="<?= $id_k ?>" name="idkategori">
                                                        <input type="hidden" name="iduser" value="<?= $userdata['username'] ?>">
                                                        <input type="text" autocomplete="off" class="form-control" name="judul" placeholder="masukkan judul wig ..." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="text" autocomplete="off" class="form-control" id="datepicker" placeholder="masukkan tanggal ..." name="tanggal" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Target WIG</label>
                                                        <input type="number" name="target" min="1" placeholder="masukkan target ..." class="form-control">
                                                        <input type="hidden" name="counter" class="form-control" id="counter" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Satuan</label>
                                                        <select class="form-control" name="satuan">
                                                        <option value="" style="display:none;">-- pilih salah satu --</option>
                                                        <?php
                                                            $satuan = mysqli_query($conn, "SELECT * FROM tbl_lovsatuan");
                                                            while ($row = mysqli_fetch_array($satuan)){
                                                                echo "<option value=$row[id_lovsatuan]>$row[id_lovsatuan]</option> \n";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" id="lm-div">
                                                        <label>LM</label>
                                                        <input type="text" autocomplete="off" class="form-control" placeholder="masukkan LM ..." name="lm0" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" id="pic-div">
                                                        <label>PIC</label>
                                                        <input type="text" autocomplete="off" class="form-control" placeholder="masukkan PIC ..." name="pic0" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type='button' class="btn btn-info" value='tambah LM dan PIC' id='addButton'>
                                                        <input type='button' class="btn btn-danger" value='hapus LM dan PIC' id='removeButton'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-info" value="Simpan">
                            <a href="?page=wig" class="btn btn-danger">Batal</a>
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
    $("#datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true, 
      todayHighlight: true
    });
  });
</script>
<script>
$(function(){
    var counter = $('#counter').val();
    $('#counter').val(counter);
    $("#addButton").click(function(){		
	    if(counter>9){
            alert("Maksimal 10 Textbox");
            return false;
	    }   
      
        var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'TextBoxDiv1' + counter),
            newTextBoxDiv2 = $(document.createElement('div')).attr("id", 'TextBoxDiv2' + counter);
        newTextBoxDiv1.after().html('<input type="text" style="margin-top:10px;" autocomplete="off" class="form-control" placeholder="masukkan LM ..." name="lm'+counter+'" required>');
        newTextBoxDiv2.after().html('<input type="text" style="margin-top:10px;" autocomplete="off" class="form-control" placeholder="masukkan PIC ..." name="pic'+counter+'" required>');
        newTextBoxDiv1.appendTo("#lm-div");
        newTextBoxDiv2.appendTo("#pic-div");		
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
    });
  });
</script>
