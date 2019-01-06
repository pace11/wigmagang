<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Objek Wisata</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
                    <li class="breadcrumb-item active">Objek Wisata</li>
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
                        <h4><i class="fas fa-file-alt"></i> Form Tambah Data</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <?php 
                        
                        if (isset($_POST['submit'])){
                            
                            $idkategori     = $_POST['idkategori'];
                            $iduser         = $_POST['iduser'];
                            $judul          = $_POST['judul'];
                            $tanggal        = date("Y-m-d", strtotime($_POST['tanggal']));
                            $target         = $_POST['target'];
                            $satuan         = $_POST['satuan'];
                            $counter        = $_POST['counter'];

                                $input = mysqli_query($conn,"INSERT INTO tbl_wig SET
                                        id_wig          = '$idkategori',
                                        username        = '$iduser',
                                        judul           = '$judul',
                                        tanggal         = '$tanggal',
                                        target          = '$target',
                                        satuan          = '$satuan'
                                        ") or die (mysqli_error($conn));

                                for ($a=0;$a<$counter;$a++) {
                                    $lm  = $_POST["lm".$a.""];
                                    $pic = $_POST["pic".$a.""];
                                    $input = mysqli_query($conn,"INSERT INTO tbl_lm SET
                                        id_wig          = '$idkategori',
                                        lm              = '$lm',
                                        pic             = '$pic'
                                        ") or die (mysqli_error($conn));
                                }

                                if ($input){
                                    echo    '<div class="row">'.
                                                '<div class="col-md-12">'.
                                                    '<div class="alert alert-success alert-dismissible">'.
                                                    '<h5><i class="icon fa fa-check"></i> Alert!</h5>'.
                                                    'Data berhasil disimpan.</div>'.
                                                '</div>'.
                                            '</div>';
                                    echo "<meta http-equiv='refresh' content='1;
                                    url=?page=wig'>";
                                }
                            } 
                        ?>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>