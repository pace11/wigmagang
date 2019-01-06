<?php 

function getData($params){
    include "../lib/koneksi.php";
    if ($params == 'objekwisata'){
        $get = mysqli_query($conn, "SELECT * FROM tbl_pariwisata 
                                    JOIN tbl_daerah ON tbl_pariwisata.id_daerah=tbl_daerah.id_daerah
                                    WHERE SUBSTRING(tbl_pariwisata.id_kategori,1,2)='OW'") or die(mysqli_error($conn));
    } else if ($params == 'hotel'){   
        $get = mysqli_query($conn, "SELECT * FROM tbl_pariwisata 
                                    JOIN tbl_daerah ON tbl_pariwisata.id_daerah=tbl_daerah.id_daerah
                                    WHERE SUBSTRING(tbl_pariwisata.id_kategori,1,1)='H'") or die(mysqli_error($conn));
    } else if ($params == 'kuliner'){
        $get = mysqli_query($conn, "SELECT * FROM tbl_pariwisata 
                                    JOIN tbl_daerah ON tbl_pariwisata.id_daerah=tbl_daerah.id_daerah
                                    WHERE SUBSTRING(tbl_pariwisata.id_kategori,1,1)='K'") or die(mysqli_error($conn));
    } else if ($params == 'olehkhas'){
        $get = mysqli_query($conn, "SELECT * FROM tbl_pariwisata 
                                    JOIN tbl_daerah ON tbl_pariwisata.id_daerah=tbl_daerah.id_daerah
                                    WHERE SUBSTRING(tbl_pariwisata.id_kategori,1,3)='OKP'") or die(mysqli_error($conn));
    } else if ($params == 'getall') {
        $get = mysqli_query($conn, "SELECT * FROM tbl_pariwisata 
                                    JOIN tbl_daerah ON tbl_pariwisata.id_daerah=tbl_daerah.id_daerah") or die(mysqli_error($conn));
    }   
        while($data=mysqli_fetch_array($get)){
            $datas [] = [
                'idKategori'        => $data['id_kategori'],
                'idDaerah'          => $data['id_daerah'],
                'kategori'          => $data['kategori'],
                'nama'              => $data['nama'],
                'alamat'            => $data['alamat'],
                'kota'              => $data['kota'],
                'kabupaten'         => $data['kabupaten'],
                'lat'               => (double) $data['latitude'],
                'lng'               => (double) $data['longitude'],
                'luasDaerah'        => $data['luas_daerah'],
                'namaPimpinan'      => $data['nama_pimpinan'],
                'saranaPrasarana'   => $data['sarana_prasarana'],
                'imgSource'         => $data['nama_foto'],
            ];
        }
        $allData = array('status'=> 200,'message'=>'success','data'=>$datas);
        $json = json_encode($allData, JSON_PRETTY_PRINT);
        return $json;
}


    if ($_GET['kategori'] == 'objekwisata'){
        echo getData('objekwisata');
    } else if ($_GET['kategori'] == 'hotel'){
        echo getData('hotel');
    } else if ($_GET['kategori'] == 'kuliner'){
        echo getData('kuliner');
    } else if ($_GET['kategori'] == 'olehkhas'){
        echo getData('olehkhas');
    } else {
        echo getData('getall');
    }
