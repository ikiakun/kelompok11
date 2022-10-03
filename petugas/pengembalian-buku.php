<?php
    include '../config.php';
    
    session_start();

    $id = $_GET['id'];
    
    $hari = date('Y-m-d');

    $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
    $data = mysqli_fetch_array($cari);

    $cari_buku = mysqli_query($db, "SELECT * FROM detail_peminjaman WHERE id_peminjaman = '$id'");
    
    $buku = array();
    
    while($data_buku = mysqli_fetch_array($cari_buku)){
        $id_buku = $data_buku['id_buku'];

        $cari_data_buku = mysqli_query($db, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
        $cari_buku_data = mysqli_fetch_array($cari_data_buku);

        $stok = $cari_buku_data['stok'] + 1;
        $update_stok = mysqli_query($db, "UPDATE buku SET stok = '$stok' WHERE id_buku = '$id_buku'");

        $buku[] = $data_buku;
    }

    $jml_buku = count($buku);
    // echo $jml_buku;
    // die();

    if($data['tgl_pemgembalian'] > date('Y-m-d')){
        $denda = 0;
    }else{
        $hariini = strtotime(date('Y-m-d'));
        $deadline = strtotime($data['tgl_pemgembalian']);

        $secs = $hariini - $deadline;// == <seconds between the two times>
        $days = $secs / 86400;

        $denda = ($days*5000)*$jml_buku;
    }


    $input = mysqli_query($db, "INSERT INTO pengembalian VALUES ('','$id','$hari','$denda')");

    if($input){
        $cari = mysqli_query($db, "SELECT * FROM pengembalian WHERE id_peminjaman = '$id' and tanggal_pengembalian = '$hari' and denda = '$denda'");
        $data = mysqli_fetch_array($cari);

        $id_pengembalian = $data[0];

        $input_detail = mysqli_query($db, "INSERT INTO detail_pengembalian VALUES ('', '$id_pengembalian','1','0')");

        if($input_detail){
            echo "<script>alert('Berhasil!!');
                document.location = 'daftar-peminjaman.php';
                </script>";
        }else{
            echo "<script>alert('Gagal!!');
                document.location = 'daftar-peminjaman.php';
                </script>";
        }
    }else{
        echo "<script>alert('Gagal!');
        document.location = 'daftar-peminjaman.php';
        </script>";
    }
    // echo $data['tgl_pemgembalian'] - date('Y-m-d');