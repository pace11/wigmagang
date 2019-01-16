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
                                                <button id="lihatgrafik" class="btn btn-danger btn-sm"><i class="fas fa-chart-bar"></i> lihat grafik</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="chart">
                                                    <canvas id="barChart" style="height:230px"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <form action="?page=wigprogress&id=<?= $data['id_wig'] ?>" method="post" enctype="multipart/form-data">
                                        
    
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="?page=wig" class="btn btn-info">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

