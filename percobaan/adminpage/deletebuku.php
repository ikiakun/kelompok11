<!-- Thor - Konten mysql -->
<?php
include 'config.php';

$id = $_GET['id_buku'];
$delete = mysqli_query($db, "DELETE FROM buku WHERE id_buku='$id'");

    if ($delete) { 
        echo "<script>alert('Berhasil menghapus');
                document.location = 'home.php';
                </script>";
    }else {
        echo "coba lagi";
    }
?>