<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Petugas</title>
</head>
<body>

                    <!-- Thor - Konten mysql -->
                    <?php
                        $id = $_GET['nip'];
                        $take = mysqli_query($db, "SELECT * FROM petugas JOIN kelamin ON petugas.id_kelamin = kelamin.id_kelamin 
                                                WHERE nip = $id");
                        $data1 = mysqli_fetch_assoc($take);
                    ?>
                    <div class="container m-5">
                        <form action="" method="GET" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nip" value="<?= $data1['nip'] ?>">
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
                                $kel = mysqli_query($db, "SELECT * FROM kelamin");
                                while($data = mysqli_fetch_assoc($kel)) {
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
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" value="<?= $data1['password'] ?>">
                        </div>
                        <button type="submit" class = "btn btn-success" name="submit">Ganti!</button>
                        </form>
                        <?php
                        if(isset($_GET['submit'])){
                            $nip = $_GET['nip'];
                            $nama = $_GET['nama'];
                            $kelamin = $_GET['id_kelamin'];
                            $alamat = $_GET['alamat'];
                            $password = $_GET['password'];

                            $query = mysqli_query ($db, 
                            "UPDATE petugas SET nip='$nip', nama='$nama', id_kelamin='$kelamin', alamat='$alamat', password='$password'
                            WHERE nip=$nip");
                            if($query){
                            echo "<script>alert(berhasil dirubah);
                            window.location.href='#'</script>";
                            }else{
                            echo 'Gagal Ditambahkan';
                            }
                            }
                        ?>

</body>
</html>