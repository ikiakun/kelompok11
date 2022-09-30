<?php
include 'config.php';
session_start();

$nip = $_POST['nip'];
$nis = $_POST['nis'];
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+3 day'));

$input = mysqli_query($db, "INSERT INTO peminjaman (nis, nip, tgl_peminjaman, tgl_pemgembalian) VALUES ('$nis','$nip','$tgl_pinjam','$tgl_kembali')");

if($input){
    $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE nis = '$nis' and nip = '$nip' and tgl_peminjaman = '$tgl_pinjam' and tgl_pemgembalian = '$tgl_kembali'");
    $data = mysqli_fetch_array($cari);
    $id = $data[0];

    echo "<script>alert('Berhasil');
        document.location = 'pinjam-buku.php?id=$id';
        </script>";
}else{
    echo "<script>alert('Gagal');
        document.location = 'peminjaman.php';
        </script>";
}
?>