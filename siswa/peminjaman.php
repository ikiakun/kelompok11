<?php
include '../config.php';
$take = mysqli_query($db,"SELECT * FROM buku");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- ICON FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    
</head>
<body>
    <?php
        include "../config.php";

        session_start();

        if(!$_SESSION){
            header('location: login.php');
        }else if(!$_SESSION['nis']){
            header('location: ../petugas/dashboard.php');
        }

        // Logout_M Ilham
        if(isset($_POST['logout'])){
                session_destroy();
                header('Location: login.php');
            }

        $nis = $_SESSION['nis'];
        $query = mysqli_query ($db, "SELECT * FROM siswa WHERE nis = '$nis'");
        $data = mysqli_fetch_array($query);
    ?>
    <!-- Navbar -->
    <nav class="navbar bg-white">
        <div class="container">
            <a href="" class="navbar-brand fw-bold" style="color: darkslateblue;">Perpustakaan</a>
            <form class="d-flex w-50 mx-auto" role="search">
                <input class="form-control me-2 w-100" type="search" placeholder="Cari Buku...">
                <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navbar nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, <?= $data['nama'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                        <li><a class="dropdown-item" href="#">Peminjaman</a></li>
                        <li>
                            <form method="POST">
                                <button type="submit" class="nav-link dropdown-item text-dark" name="logout">Log out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
    <main class="col">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Laporan Peminjaman <?= $data['nama'] ?></h1>
            </div>
            <div class="row">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th class="w-25">Nama</th>
                            <th>Kelas</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Petugas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nis = $data['nis'];
                        
                        $pinjam = mysqli_query($db, "SELECT siswa.nis as nis, peminjaman.id_peminjaman as id, siswa.nama as nama_siswa, kelas.nama_kelas as kelas, peminjaman.tgl_peminjaman as tgl_pinj, peminjaman.tgl_pemgembalian as tgl_pengm, petugas.nama as nama_petugas FROM  peminjaman JOIN siswa ON peminjaman.nis = siswa.nis JOIN petugas ON peminjaman.nip = petugas.nip JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE peminjaman.nis = '$nis'");
    
                            while ($data = mysqli_fetch_array($pinjam)) {
                        ?>
                        <tr>
                            <td><?= $data['nis'] ?></td>
                            <td><?= $data['nama_siswa'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['tgl_pinj'] ?></td>
                            <td><?= $data['tgl_pengm'] ?></td>
                            <td><?= $data['nama_petugas'] ?></td>
                            <td>
                                <?php 
                                    $kembalian = mysqli_query ($db, "SELECT * FROM pengembalian WHERE id_peminjaman='$data[id]'");
                                    $data1 = mysqli_fetch_array($kembalian);


                                            
                                if (!$data1) {
                                    ?>
                                <p class="text-warning">Belum Dikembalikan</p>
                                <?php 
                                    }else{
                                        if($data1['denda'] == 0){
                                ?>
                                    <p class="text-success">Sudah Dikembalikan</p>
                                <?php
                                        }else{
                                ?>
                                    <p class="text-danger">Telat (Denda : <?= $data1['denda'] ?>)</p>
                                <?php }}?>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?= $data['id'] ?>">
                                Details
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="Modal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Details Peminjaman <?= $data['nama_siswa'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <?php
                                                            $detail = mysqli_query($db, "SELECT * FROM detail_peminjaman JOIN peminjaman ON detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman JOIN buku ON detail_peminjaman.id_buku = buku.id_buku WHERE detail_peminjaman.id_peminjaman = '$data[id]'");
                                                            
                                                            while ($det_buku = mysqli_fetch_array($detail)) {
                                                        ?>
                                                        <div class="card mb-3">
                                                            <div class="row g-0">
                                                                <div class="col-md-4">
                                                                <img src="../assets/img/wallpaperbetter.jpg" class="img-fluid rounded-start" alt="...">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><?= $det_buku['judul'] ?></h5>
                                                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>