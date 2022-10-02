<?php
include ('config.php');
// session_start();
// if(!$_SESSION['username']){
//   header('location: login.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Tambah Data Siswa</title>
</head>
<body>

                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="dropdown">
                            <select class="form-control" aria-label="Default select example" name="id_kelamin">
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
                          <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <div class="dropdown">
                            <select class="form-control" aria-label="Default select example" name="id_kelas">
                              <?php
                                $kel = mysqli_query($db, "SELECT * FROM kelas");
                                while($data = mysqli_fetch_assoc($kel)) {
                              ?>
                            <option value="<?= $data['id_kelas']?>"> <?= $data['nama_kelas'] ?> </option>
                              <?php
                                }
                              ?>         
                            </select>              
                            </div>
                        </div>
                        <button type="submit" class = "btn btn-success" name="submit" id="submit">Tambah Data</button>
                        </form>

        <?php
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $kelam = $_POST['id_kelamin'];
            $alamat = $_POST['alamat'];
            $kelas = $_POST['id_kelas'];

            $query = mysqli_query ($db, "INSERT INTO siswa (nama, id_kelamin, alamat, id_kelas)
                                  VALUES('$nama', $kelam, '$alamat', $kelas)");
            if($query){
              echo 'Data Berhasil Ditambahkan, Silakan tambah data lagi / Home untuk kembali';
            }else{
              echo 'Gagal Ditambahkan';
            }
          }
        ?>
    </div>
    
</body>
</html>