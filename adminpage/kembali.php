<?php
    include 'config.php';
    
    session_start();

    $id = $_GET['id'];

    $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
    $data = mysqli_fetch_array($cari);

    if($data['tgl_pemgembalian'] > date('Y-m-d')){
        $denda = 0;
        echo $denda;
    }else{
        $datetime1 = strtotime($data['tgl_pemgembalian']);
        $datetime2 = strtotime(date('Y-m-d'));

        $secs = $datetime2 - $datetime1;// == <seconds between the two times>
        $days = $secs / 86400;

        echo $days;
    }
    // echo $data['tgl_pemgembalian'] - date('Y-m-d');