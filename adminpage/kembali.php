<?php
    include 'config.php';
    
    session_start();

    $id = $_GET['id'];

    $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
    $data = mysqli_fetch_array($cari);

    if($data['tgl_pemgembalian'] > date('Y-m-d')){
        echo "TIdak Didenda";
    }else{
        echo "Didenda";
    }
    // echo $data['tgl_pemgembalian'] - date('Y-m-d');