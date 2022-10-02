<?php
include 'config.php';

$id = $_GET['nip'];
$delete = mysqli_query($db, "DELETE FROM petugas WHERE nip='$id'");

    if ($delete) { 
        echo "<script>alert('Berhasil menghapus');
                document.location = 'daftarpetugas.php';
                </script>";
    }else {
        echo "coba lagi";
    }
?>