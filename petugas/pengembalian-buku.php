<?php
    include '../config.php';
    
    session_start();

    $id = $_GET['id'];
    
    $hari = date('Y-m-d');

    $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
    $data = mysqli_fetch_array($cari);

    if($data['tgl_pemgembalian'] > date('Y-m-d')){
        $denda = 0;
    }else{
        $hariini = strtotime(date('Y-m-d'));
        $deadline = strtotime($data['tgl_pemgembalian']);

        $secs = $hariini - $deadline;// == <seconds between the two times>
        $days = $secs / 86400;

        $denda = ($days+1)*5000;
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