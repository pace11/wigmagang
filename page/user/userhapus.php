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
                        <h4><i class="fas fa-exclamation-circle"></i> Hapus Data</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-danger">
                                    <h5>Peringatan !</h5>
                                    <p>Anda yakin ingin menghapus data ini ?</p>
                                <form action="?page=objekwisatahapus" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_kategori" value="<?= $_GET['id'] ?>">
                                    <input class="btn btn-danger" type="submit" name="submit" value="Ya">
                                    <a class="btn btn-info" href="?page=objekwisata"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                                </form>
                                </div>
                            </div>
                        </div>
                            <?php 
                            if(isset($_POST['submit'])){
                                $id_kategori = $_POST['id_kategori'];
                                $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_pariwisata WHERE id_kategori='$id_kategori'"));
                                unlink("img/$data[nama_foto]");
                                $delete = mysqli_query($conn,"DELETE FROM tbl_pariwisata WHERE id_kategori='$id_kategori'") or die (mysqli_error($conn));
                                if ($delete){
                                    echo    '<div class="row">'.
                                                '<div class="col-md-12">'.
                                                    '<div class="alert alert-success alert-dismissible">'.
                                                    '<h5><i class="icon fa fa-check"></i> Alert!</h5>'.
                                                    'Data berhasil dihapus.</div>'.
                                                '</div>'.
                                            '</div>';
                                    echo "<meta http-equiv='refresh' content='1;
                                    url=?page=objekwisata'>";
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