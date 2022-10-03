<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Perpustakaan | Daftar Peminjaman</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
    }

    .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
    }

    .bi {
    vertical-align: -.125em;
    fill: currentColor;
    }

    .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
    }

    .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    }
    </style>

    <!-- ICON FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <link href="../assets/dashboard/dashboard.css" rel="stylesheet">
</head>
<body>
    <?php 
        include "../config.php";

        session_start();

        if(!$_SESSION){
            header('location: login.php');
        }else if(!$_SESSION['level']){
            header('location: ../siswa/index.php');
        }

        // Logout_M Ilham
        if(isset($_POST['logout'])){
                session_destroy();
                header('Location: login.php');
            }
        
        // Data User_M Ilham
        $nip = $_SESSION['nip'];
        $query = mysqli_query ($db, "SELECT * FROM petugas WHERE nip='$nip'");
        $data = mysqli_fetch_array($query);

        ?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Perpustakaan</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form method="POST">
                <button type="submit" class="nav-link btn btn-dark fw-bold px-3 mx-5" name="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</button>
            </form>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <!-- Navbar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <h5 class="heading d-flex justify-content-between align-items-center px-3 mb-3 text-muted text-uppercase">
                    <span>Hello, <?= $data['nama'] ?></span>
                </h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="dashboard.php">
                        <i class="fa-solid fa-gauge mx-2"></i>
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="peminjaman.php">
                        <i class="fa-solid fa-file-circle-plus mx-2"></i>
                        Peminjaman Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="daftar-buku.php">
                        <i class="fa-solid fa-book-bookmark mx-2"></i>
                        Daftar Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="daftar-siswa.php">
                        <i class="fa-solid fa-users mx-1"></i>
                        Daftar Siswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="daftar-peminjaman.php">
                        <i class="fa-solid fa-file-lines mx-2"></i>
                        Laporan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="laporan-denda.php">
                        <i class="fa-solid fa-file-excel mx-2"></i>
                        Laporan Denda
                        </a>
                    </li>
                    <!-- Batas-admin_M Ilham -->
                    <?php 
                        if($_SESSION['level'] == 1){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="daftar-petugas.php">
                        <i class="fa-solid fa-users-viewfinder mx-1"></i>
                        Daftar Petugas
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Laporan Peminjaman</h1>
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
                            <th colspan="2" class="w-25">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $pinjam = mysqli_query($db, 'SELECT siswa.nis as nis, peminjaman.id_peminjaman as id, siswa.nama as nama_siswa, kelas.nama_kelas as kelas, peminjaman.tgl_peminjaman as tgl_pinj, peminjaman.tgl_pemgembalian as tgl_pengm, petugas.nama as nama_petugas FROM  peminjaman JOIN siswa ON peminjaman.nis = siswa.nis JOIN petugas ON peminjaman.nip = petugas.nip JOIN kelas ON siswa.id_kelas = kelas.id_kelas');
    
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
                            <td>
                                <?php 
                                    $kembalian = mysqli_query ($db, "SELECT * FROM pengembalian WHERE id_peminjaman='$data[id]'");
                                    $data1 = mysqli_fetch_array($kembalian);


                                            
                                if (!$data1) {
                                    ?>
                                <a href="pengembalian-buku.php?id=<?= $data['id'] ?>" class="btn btn-primary">Mengembalikan</a>
                                <?php 
                                    }else{
                                ?>
                                <button type="button" class="btn btn-primary" disabled>Sudah Mengembalikan</button>
                                <?php }?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
