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
        $getdata = mysqli_query($conn, "SELECT * FROM tbl_wig WHERE id_wig='$_GET[id]'") or die (mysqli_error($conn));
        $data    = mysqli_fetch_array($getdata);

        $getlm = mysqli_query($conn, "SELECT lm_pic FROM tbl_lm WHERE id_wig='$_GET[id]'") or die (mysqli_error($conn));
        $datalm    = mysqli_fetch_array($getlm);

    ?>
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
                                        <form action="?page=wigeditpro" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Polaritas</label>
                                                        <select class="form-control" name="polaritas">
                                                            <option style="display:none;">-- pilih salah satu --</option>
                                                            <option value="positif" <?= ($data['polaritas'] == 'positif') ? 'selected' : '' ?>>Positif</option>
                                                            <option value="negatif" <?= ($data['polaritas'] == 'negatif') ? 'selected' : '' ?>>Negatif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tipe</label>
                                                        <select class="form-control" name="tipe">
                                                            <option style="display:none;">-- pilih salah satu --</option>
                                                            <option value="komulatif" <?= ($data['tipe'] == 'komulatif') ? 'selected' : '' ?>>Komulatif</option>
                                                            <option value="nonkomulatif" <?= ($data['tipe'] == 'nonkomulatif') ? 'selected' : '' ?>>Non Komulatif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input type="hidden" value="<?= $data['id_wig'] ?>" name="idkategori">
                                                        <input type="hidden" name="iduser" value="<?= $userdata['username'] ?>">
                                                        <input type="text" class="form-control" name="judul" placeholder="masukkan judul wig ..." value="<?= $data['judul'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="text" class="form-control" id="datepicker" placeholder="masukkan tanggal ..." name="tanggal" value="<?= date('d-m-Y', strtotime($data['tanggal'])) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Target WIG</label>
                                                        <input type="number" name="target" min="1" placeholder="masukkan target ..." class="form-control" value="<?= $data['target'] ?>" required>
                                                        <input type="hidden" name="counter" class="form-control" id="counter" value="<?= count(json_decode($datalm['lm_pic'])) ?>">
                                                        <input type="hidden" name="counter-one" class="form-control" value="<?= count(json_decode($datalm['lm_pic'])) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Satuan</label>
                                                        <select class="form-control" name="satuan">
                                                            <?php
                                                                $satuan = mysqli_query($conn, "SELECT * FROM tbl_lovsatuan");
                                                                while ($row = mysqli_fetch_array($satuan)){ ?>
                                                                    <option value="<?= $row['id_lovsatuan'] ?>"<?php if($row['id_lovsatuan'] == $data['satuan']){echo "selected";} ?>><?= $row['id_lovsatuan'] ?></option>
                                                            <?php   }   ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group" id="lm-div">
                                                        <label>LM</label>
                                                        <?php 
                                                            $json = json_decode($datalm['lm_pic']);
                                                            $a=0;
                                                            foreach($json as $item) {
                                                                echo '<div id="TextBoxDiv1'.$a.'">';
                                                                echo '<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan LM ..." name="lm'.$a.'" value="'.$item->lm.'" autocomplete="off" readonly required>';
                                                                echo '</div>';
                                                                $a++;
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" id="pic-div">
                                                    <textarea name="step-one" style="display:none;" class="form-control"><?= json_encode($json) ?></textarea>
                                                        <label>PIC</label>
                                                        <?php 
                                                            $b=0;
                                                            foreach($json as $item) {
                                                                echo '<div id="TextBoxDiv2'.$b.'">';
                                                                echo '<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan PIC ..." name="pic'.$b.'" value="'.$item->pic.'" autocomplete="off" readonly required>';
                                                                echo '</div>';
                                                                $b++;
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" id="pol-div">
                                                        <label>Polaritas</label>
                                                        <?php 
                                                            $c=0;
                                                            foreach($json as $item) { ?>
                                                                <div id="TextBoxDiv3<?= $c ?>">
                                                                    <input type="text" style="margin-top:10px;" class="form-control" value="<?= $item->polaritas ?>" readonly>
                                                                </div>
                                                        <?php
                                                                $c++;    
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" id="tip-div">
                                                        <label>Tipe</label>
                                                        <?php 
                                                            $d=0;
                                                            foreach($json as $item) { ?>
                                                                <div id="TextBoxDiv4<?= $d ?>">
                                                                    <input type="text" style="margin-top:10px;" class="form-control" value="<?= $item->tipe ?>" readonly>  
                                                                </div>
                                                        <?php
                                                                $d++;    
                                                            }
                                                        ?>
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
            newTextBoxDiv2 = $(document.createElement('div')).attr("id", 'TextBoxDiv2' + counter),
            newTextBoxDiv3 = $(document.createElement('div')).attr("id", 'TextBoxDiv3' + counter),
            newTextBoxDiv4 = $(document.createElement('div')).attr("id", 'TextBoxDiv4' + counter);
        newTextBoxDiv1.after().html('<input type="text" style="margin-top:10px;" autocomplete="off" class="form-control" placeholder="masukkan LM ..." name="lm'+counter+'" required>');
        newTextBoxDiv2.after().html('<input type="text" style="margin-top:10px;" autocomplete="off" class="form-control" placeholder="masukkan PIC ..." name="pic'+counter+'" required>');
        newTextBoxDiv3.after().html('<select style="margin-top:10px;" class="form-control" name="pol'+counter+'"><option style="display:none;">--pilih salah satu --</option><option value="positif">Positif</option><option value="negatif">Negatif</option></select>');
        newTextBoxDiv4.after().html('<select style="margin-top:10px;" class="form-control" name="tip'+counter+'"><option style="display:none;">--pilih salah satu --</option><option value="komulatif">Komulatif</option><option value="nonkomulatif">Non Komulatif</option></select>');
        newTextBoxDiv1.appendTo("#lm-div");
        newTextBoxDiv2.appendTo("#pic-div");	
        newTextBoxDiv3.appendTo("#pol-div");
        newTextBoxDiv4.appendTo("#tip-div");	
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
        $("#TextBoxDiv4" + counter).remove();
    });
  });
</script> 
