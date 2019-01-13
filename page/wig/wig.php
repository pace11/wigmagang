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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    
                    <div class="card-header">
                        <?php if ($page == 'wig') { ?>
                            <a href="?page=wigtambah" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <?php } else { ?>
                            <h4>INPUT PROGRESS WIG</h4>
                        <?php } ?>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Target</th>
                                            <th>Satuan</th>
                                            <th>LM & PIC</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($conn,"SELECT * FROM tbl_wig") or die (mysqli_error($conn));
                                        while($data = mysqli_fetch_array($sql)){ ?>
                                            <tr>    
                                                <td><?= $no ?></td>
                                                <td><a class="btn btn-success btn-sm" href="#"><i class="fas fa-user"></i> <?= $data['id_wig'] ?></a></td>
                                                <td><?= $data['judul'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['target'] ?></td>
                                                <td><?= $data['satuan'] ?></td>
                                                <td>
                                                
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $data['id_wig']?>" class="collapsed" aria-expanded="false">
                                                        tampilkan
                                                        </a>
                                                    </div>
                                                    <div id="collapse_<?= $data['id_wig']?>" class="panel-collapse in collapse" style="">
                                                    <div class="card-body">
                                                        <?= GetLM($data['id_wig']) ?>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="?page=wigedit&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="?page=wighapus&id=<?php echo $data['id_wig']; ?>"><i class="fas fa-trash"></i> hapus</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <div class="card-footer">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>