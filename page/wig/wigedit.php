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
                        <h4><i class="fas fa-file-alt"></i> Form Tambah Data</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="?page=wigeditpro" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <div class="form-group">
                                                    <button class="btn btn-success"><i class="fas fa-map-marker"></i> <?= $data['id_wig'] ?></button>
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
                                            <div class="col-md-6">
                                                <div class="form-group" id="lm-div">
                                                    <label>LM</label>
                                                    <?php 
                                                        $json = json_decode($datalm['lm_pic']);
                                                        $a=0;
                                                        foreach($json as $item) {
                                                            echo '<div id="TextBoxDiv1'.$a.'">';
                                                            echo '<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan LM ..." name="lm'.$a.'" value="'.$item->lm.'" required>';
                                                            echo '</div>';
                                                            $a++;
                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="pic-div">
                                                    <label>PIC</label>
                                                    <?php 
                                                        $b=0;
                                                        foreach($json as $item) {
                                                            echo '<div id="TextBoxDiv2'.$b.'">';
                                                            echo '<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan PIC ..." name="pic'.$b.'" value="'.$item->pic.'" required>';
                                                            echo '</div>';
                                                            $b++;
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
