<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
</head>
<body>

                    <!-- Thor - Konten mysql -->
                    <?php
                        $id = $_GET['nis'];
                        $take = mysqli_query($db, "SELECT * FROM siswa JOIN kelamin JOIN kelas 
                                                ON siswa.id_kelamin = kelamin.id_kelamin
                                                AND siswa.id_kelas = kelas.id_kelas 
                                                WHERE nip = $id");
                        $data1 = mysqli_fetch_assoc($take);
                    ?>
                    <div class="container m-5">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" name="nis" value="<?= $data1['nis'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data1['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="dropdown">
                            <select class="form-select" aria-label="Default select example" name="id_kelamin">
                            <?php
                                $jur = mysqli_query($db, "SELECT * FROM kelamin");
                                while($data = mysqli_fetch_assoc($jur)) {
                            ?>
                            <option value="<?= $data['id_kelamin']?>"> <?= $data['kelamin'] ?> </option>
                                <?php
                                }
                                ?>         
                                </select>              
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $data1['alamat'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">kelas</label>
                            <div class="dropdown">
                            <select class="form-select" aria-label="Default select example" name="id_kelas">
                            <?php
                                $jur = mysqli_query($db, "SELECT * FROM kelas");
                                while($data = mysqli_fetch_assoc($jur)) {
                            ?>
                            <option value="<?= $data['id_kelas']?>"> <?= $data['nama_kelas'] ?> </option>
                                <?php
                                }
                                ?>         
                                </select>              
                            </div>
                        </div>
                        <button type="submit" class = "btn btn-success" name="submit">Ganti!</button>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $nip = $_POST['nip'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $password = $_POST['password'];

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