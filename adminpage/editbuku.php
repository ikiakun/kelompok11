<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
</head>
<body>

                    <!-- Thor - Konten mysql -->
                    <?php
                        $id = $_GET['id_buku'];
                        $take = mysqli_query($db, "SELECT * FROM buku WHERE id_buku = $id");
                        $data1 = mysqli_fetch_assoc($take);
                    ?>
                    <div class="container m-5">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" class="form-control" name="penulis" value="<?= $data1['penulis'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="number" min="1900" class="form-control" name="tahun" value="<?= $data1['tahun'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="date" class="form-control" name="judul" value="<?= $data1['judul'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kota</label>
                            <input type="date" class="form-control" name="kota" value="<?= $data1['kota'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="date" class="form-control" name="penerbit" value="<?= $data1['penerbit'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cover</label>
                            <br>
                            <img src="cover/<?= $data1['cover'] ?>" alt="" class="img-thumbnail" style="width: 50px;">  
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ganti cover</label>
                            <input type="file" class="form-control" name="ganticover">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sinopsis</label>
                            <input type="date" class="form-control" name="sinopsis" value="<?= $data1['sinopsis'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="date" class="form-control" name="stok" value="<?= $data1['stok'] ?>">
                        </div>
                        <button type="submit" class = "btn btn-success" name="submit">Ganti!</button>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $penulis = $_POST['penulis'];
                            $tahun = $_POST['tahun'];
                            $judul = $_POST['judul'];
                            $kota = $_POST['kota'];
                            $penerbit = $_POST['penerbit'];
                            $cover = $_FILES['ganticover']['name'];
                            $lokasi = $_FILES['ganticover']['tmp_name'];
                            $sinopsis = $_POST['sinopsis'];
                            $stok = $_POST['stok'];

                            $query = mysqli_query ($db, 
                            "UPDATE buku SET penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', cover='$cover', sinopsis='$sinopsis', stok='$stok'
                            WHERE id_buku=$id");
                            if($query){
                            echo "<script>alert(berhasil dirubah);
                            window.location.href='index.php'</script>";
                            }else{
                            echo 'Gagal Ditambahkan';
                            }
                            }
                        ?>

</body>
</html>