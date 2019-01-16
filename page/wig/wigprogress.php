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
                                        <?php if ($hitval) { ?>
                                        <div class="row">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Tanggal</th>
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
                                                        echo "<td><a href='#' class='btn btn-success btn-sm'><i class='fas fa-calendar-alt'></i> ".$item->tanggal."</a></td>";
                                                        echo "<td><a href='#' class='btn btn-info btn-sm'>".$item->realisasi."</a></td>";
                                                        echo "</tr>";
                                                        $no++;
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button id="lihatgrafik" class="btn btn-info btn-sm"><i class="fas fa-chart-bar"></i> lihat grafik</button>
                                                <button id="editwigprogress" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> ubah nilai realisasi</button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <form action="?page=wigprogress&id=<?= $data['id_wig'] ?>" method="post" enctype="multipart/form-data">
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="hidden" value="<?= $data['id_wig'] ?>" name="idwig">
                                                    <input type="text" class="form-control" id="datepicker" placeholder="masukkan tanggal ..." name="tanggal" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Realisasi</label>
                                                    <input type="number" name="realisasi" min="1" placeholder="masukkan nilai realisasi ..." class="form-control" autocomplete="off" required>
                                                    <input type="hidden" value="<?= $hitval ?>" name="hitval">
                                                    
                                                    <?php
                                                        if ($hitval>0) 
                                                        {
                                                            $datas = json_decode($dataval['value_wigprogress']);
                                                            foreach($datas as $items){
                                                                $isi['tanggal'] = $items->tanggal;
                                                                $isi['realisasi'] = $items->realisasi;
                                                                $dataArr[] = $isi;
                                                            }
                                                                $valDataArr = json_encode($dataArr);
                                                    ?>
                                                    <textarea style="display:none;" name="DataArray"><?= $valDataArr ?></textarea>
                                                    <?php } ?>
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
                        $idwig = $_POST['idwig'];
                        $hitval = $_POST['hitval'];
                        if ($hitval > 0){
                            $arr = json_decode($_POST['DataArray']);
                        }

                        $isi['tanggal'] = $tanggal;
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
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
