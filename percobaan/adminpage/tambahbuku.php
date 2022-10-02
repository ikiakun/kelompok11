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
    <title>Tambah Data Buku</title>
</head>
<body>

                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" class="form-control" name="penulis" id="penulis">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Tahun</label>
                          <input type="number" min="1900" class="form-control" name="tahun" id="tahun">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kota</label>
                            <input type="text" class="form-control" name="kota" id="kota">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cover</label>
                            <input type="file" class="form-control" name="cover">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sinopsis</label>
                            <input type="text" class="form-control" name="sinopsis" id="sinopsis">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" id="stok">
                        </div>
                      <button type="submit" class="btn btn-success" name="submit" id="submit">Tambah Data Buku</button>
                        </form>

        <?php
        if(isset($_POST['submit'])){
            $penulis = $_POST['penulis'];
            $tahun = $_POST['tahun'];
            $judul = $_POST['judul'];
            $kota = $_POST['kota'];
            $penerbit = $_POST['penerbit'];

            $cover = time().$_FILES['cover']['name'];
            $lokasi = $_FILES['cover']['tmp_name'];
            $upload = move_uploaded_file($lokasi, "../assets/cover/". $cover);

            $sinopsis = $_POST['sinopsis'];
            $stok = $_POST['stok'];

            $query = mysqli_query ($db, "INSERT INTO buku (id_buku, penulis, tahun, judul, kota, penerbit, cover, sinopsis, stok)
                                  VALUES('', '$penulis', $tahun, '$judul', '$kota', '$penerbit', '$cover', '$sinopsis', '$stok')");
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