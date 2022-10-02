<?php
include '../config.php';
session_start();

// Proses Peminjaman_M Ilham

$nip = $_POST['nip'];
$nis = $_POST['nis'];
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+3 day'));

$cari_siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nis = '$nis'");
$data_siswa = mysqli_fetch_array($cari_siswa);

if($data_siswa){
    if(isset($_POST['buku'])){
        $input = mysqli_query($db, "INSERT INTO peminjaman (nis, nip, tgl_peminjaman, tgl_pemgembalian) VALUES ('$nis','$nip','$tgl_pinjam','$tgl_kembali')");

        if($input){
            $cari = mysqli_query($db, "SELECT * FROM peminjaman WHERE nis = '$nis' and nip = '$nip' and tgl_peminjaman = '$tgl_pinjam' and tgl_pemgembalian = '$tgl_kembali'");
            $data = mysqli_fetch_array($cari);
            $id = $data[0];

            for($i = 0; $i < count($_POST['buku']); $i++){
                $id_buku = $_POST['buku'][$i];

                if($_POST['jumlah'][$i] == ''){
                    $kuantitas = 1;
                }else{
                    $kuantitas = $_POST['jumlah'][$i];
                }

                $input_detail = mysqli_query($db, "INSERT INTO detail_peminjaman VALUES ('', '$id_buku','$id','$kuantitas')");
            }

            echo "<script>alert('Berhasil!');
                document.location = 'dashboard.php';
                </script>";
        }else{
            echo "<script>alert('Gagal!');
                document.location = 'peminjaman.php';
                </script>";
        }
    }else{
        echo "<script>alert('Pilih Minimal 1 Buku!');
        document.location = 'peminjaman.php';
        </script>";
    }
}else{
    echo "<script>alert('NIS Tidak Ditemukan!');
        document.location = 'peminjaman.php';
        </script>";
}
?>