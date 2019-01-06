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
<?php 
    $get_id = mysqli_query($conn, "SELECT id_kategori hasil FROM tbl_pariwisata WHERE SUBSTRING(id_kategori,1,2)='OW'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_kategori,-4,4) as hasil FROM tbl_pariwisata WHERE SUBSTRING(id_kategori,1,2)='OW' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "OW-0001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "OW-".str_pad($kode,4,"0",STR_PAD_LEFT); 
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
                            <div class="col-md-6">
                                <form action="?page=objekwisatatambahpro" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <button class="btn btn-success"><i class="fas fa-map-marker"></i> OBJEK WISATA</button>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="hidden" value="<?= $id_k ?>" name="idkategori">
                                            <input type="hidden" name="kategori" value="objekwisata">
                                            <input type="text" class="form-control" name="nama" placeholder="masukkan nama objek wisata ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="masukkan alamat objek wisata ..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>ID Daerah</label>
                                                <select class="form-control" name="iddaerah">
                                                    <option value="">-- pilih salah satu --</option>
                                                    <?php
                                                    $daerah = mysqli_query($conn, "SELECT * FROM tbl_daerah ORDER BY id_daerah ASC");
                                                    while ($row = mysqli_fetch_array($daerah)){
                                                        echo "<option value=$row[id_daerah]>($row[id_daerah]) $row[kota] - $row[kabupaten]</option> \n";
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" class="form-control" name="lat" placeholder="masukkan latitude ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" class="form-control" name="lng" placeholder="masukkan longitude ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Luas Daerah</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="luasdaerah" placeholder="masukkan luas daerah ..." required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Ha</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pimpinan</label>
                                            <input type="text" class="form-control" name="namapimpinan" placeholder="masukkan nama pimpinan ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Sarana dan Prasarana</label>
                                            <input type="text" class="form-control" name="sarana" placeholder="masukkan sarana dan prasarana ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Objek Wisata</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="foto" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Browse</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-info" value="Simpan">
                        <a href="?page=objekwisata" class="btn btn-danger">Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>