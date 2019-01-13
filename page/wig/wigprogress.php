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
    $getdata = mysqli_query($conn, "SELECT * FROM tbl_wig WHERE id_wig='$_GET[id]'") or die (mysqli_error($conn));
    $data    = mysqli_fetch_array($getdata);

    $getval = mysqli_query($conn, "SELECT value_wigprogress FROM tbl_wigprogress WHERE id_wig='$_GET[id]'") or die (mysqli_error($conn));
    $dataval    = mysqli_fetch_array($getval);

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
                                <form action="?page=wigprogress&id=<?= $data['id_wig'] ?>" method="post" enctype="multipart/form-data">
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
                                                    <input type="hidden" value="<?= $data['id_wig'] ?>" name="idwig">
                                                    <a href="#" class="btn btn-success btn-sm"><?= $data['judul'] ?></a>
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
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="text" class="form-control" id="datepicker" placeholder="masukkan tanggal ..." name="tanggal" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Realisasi</label>
                                                    <input type="number" name="realisasi" min="1" placeholder="masukkan nilai realisasi ..." class="form-control">
                                                </div>
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
                        $realisasi = $_POST['realisasi'];
                        $id_wig = $_POST['idwig'];

                        $isi['tanggal'] = $tanggal;
                        $isi['realisasi'] = $realisasi;
                        $value[] = $isi;

                        echo "<pre>";
                        print_r($value);
                        echo "</pre>";

                        // $query = mysqli_query($conn, "INSERT INTO tbl_wigprogress SET
                        //                     tanggal     = '$tanggal',
                        //                     rea")


                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
