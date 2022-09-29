<?php
include 'config.php';

$id = $_GET['nis'];
$delete = mysqli_query($db, "DELETE FROM siswa WHERE nis='$id'");

    if ($delete) { 
        echo "<script>alert("Berhasil menghapus");
                document.location = "home.php";
                </script>"
    }else {
        echo "coba lagi";
    }
?>