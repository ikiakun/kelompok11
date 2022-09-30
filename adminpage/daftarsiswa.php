<?php
include 'config.php';
$take = mysqli_query($db,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- ICON FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>
        <!-- Navbar -->
        <nav class="navbar bg-white">
        <div class="container">
            <a href="" class="navbar-brand fw-bold" style="color: darkslateblue;">PerpusQta</a>
            <form class="d-flex w-50 mx-auto" role="search">
                <input class="form-control me-2 w-100" type="search" placeholder="Cari Buku...">
                <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <a href="" class="btn rounded-pill" style="width: 100px;color: darkslateblue; border-color: darkslateblue;">Login</a>
            <!-- <ul class="navbar nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nama User
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Peminjaman</a></li>
                        <li><a class="dropdown-item" href="#">Log out</a></li>
                    </ul>
                </li>
            </ul> -->
        </div>
    </nav>
                        <!-- Thor - Konten mysql -->
                        <div class="container text-center mt-4">
                            <table class="table table-striped table-hover mt-4">
                            <thread>
                                <tr>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thread>
                            <tbody>
                                <?php
                                    while($data = mysqli_fetch_array($take)){                           
                                ?>
                                <?php
                                    $batas = 10;
                                    if(isset($_GET['halaman'])){
                                        $halaman = (int)$_GET['halaman'];
                                    }else{
                                        $halaman = 1;
                                    }
                                    if($halaman > 1){
                                        $halaman_awal = ($halaman * $batas) - $batas;
                                    }else{
                                        $halaman_awal = 0;
                                    }
                                    $data = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data/$batas);

                                    $result = mysqli_query($db,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                                                                ORDER BY nis LIMIT $halaman_awal,$batas");
                                    $no = $halaman_awal+1;
                                    while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= $data['nis'] ?> </td>
                                    <td><?= $data['nama'] ?> </td>
                                    <td><?= $data['jenis_kelamin'] ?> </td>
                                    <td><?= $data['alamat'] ?> </td>
                                    <td><?= $data['nama_kelas'] ?> </td>
                                    <td colspan="2">
                                        <a href="editsiswa.php?nis=<?= $data['nis'] ?>" class ="btn btn-warning">edit</a>
                                        <a href="deletesiswa.php?nis=<?= $data['nis'] ?>" class="btn btn-danger">hapus</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </div>
                        
    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>