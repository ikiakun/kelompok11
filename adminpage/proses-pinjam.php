<?php
include 'config.php';
session_start();

// for($i = 0; $i < count($_POST['buku']) ; $i++){
//     $id_buku = $_POST['buku'][$i];
//     $kuantitas = $_POST['jumlah'][$i];

//     echo $kuantitas;
// }
// die();

$nip = $_POST['nip'];
$nis = $_POST['nis'];
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+3 day'));

$input = mysqli_query($db, "INSERT INTO peminjaman (nis, nip, tgl_peminjaman, tgl_pemgembalian) VALUES ('$nis','$nip','$tgl_pinjam','$tgl_kembali')");

if($input){
    $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE nis = '$nis' and nip = '$nip' and tgl_peminjaman = '$tgl_pinjam' and tgl_pemgembalian = '$tgl_kembali'");
    $data = mysqli_fetch_array($cari);
    $id = $data[0];

    for($i = 0; $i < count($_POST['buku']) ; $i++){
        $id_buku = $_POST['buku'][$i];
        $kuantitas = $_POST['jumlah'][$i];

        $input_detail = mysqli_query($db, "INSERT INTO detail_peminjaman VALUES ('', '$id_buku','$id','$kuantitas')");
    }

    echo "<script>alert('Berhasil');
        document.location = 'daftar-pinjaman.php';
        </script>";
}else{
    echo "<script>alert('Gagal');
        document.location = 'peminjaman.php';
        </script>";
}
?>