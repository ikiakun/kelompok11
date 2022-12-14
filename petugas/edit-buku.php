<!-- M Ilham -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Perpustakaan | Edit Buku</title>

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
                        <a class="nav-link active" aria-current="page" href="daftar-buku.php">
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
                        <a class="nav-link" aria-current="page" href="daftar-peminjaman.php">
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

        <!-- Thor - Konten mysql -->
        <?php
            $id = $_GET['id'];
            $take = mysqli_query($db, "SELECT * FROM buku WHERE id_buku = $id");
            $data1 = mysqli_fetch_assoc($take);
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Buku <?= $data1['judul'] ?></h1>
            </div>

            <div class="row mt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Penulis Buku : </label>
                        <input type="text" name="penulis" class="form-control w-50" placeholder="Masukkan Nama Penulis Buku..." value="<?= $data1['penulis'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Tahun : </label>
                        <input type="number" min="1900" name="tahun" class="form-control w-50" placeholder="Masukkan Tahun..." value="<?= $data1['tahun'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Judul Buku : </label>
                        <input type="text" name="judul" class="form-control w-50" placeholder="Masukkan Judul Buku..." value="<?= $data1['judul'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Kota : </label>
                        <input type="text" name="kota" class="form-control w-50" placeholder="Masukkan Kota..." value="<?= $data1['kota'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Penerbit : </label>
                        <input type="text" name="penerbit" class="form-control w-50" placeholder="Masukkan Penerbit..." value="<?= $data1['penerbit'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Cover : </label>
                        <input type="file" class="form-control w-50" id="ganticover" name="ganticover">
                        <input type="hidden" name="namacover" class="form-control w-50" placeholder="Masukkan Sinopsis..." value="<?= $data1['cover'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Sinopsis : </label>
                        <input type="text" name="sinopsis" class="form-control w-50" placeholder="Masukkan Sinopsis..." value="<?= $data1['sinopsis'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Stok : </label>
                        <input type="number" min="1" name="stok" class="form-control w-50" placeholder="Masukkan Stok Buku..." value="<?= $data1['stok'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success mb-3" name="submit" id="submit">Edit Data Buku</button>
                </form>
            </div>
        </main>
    </div>
</div>


<?php
// Thor
if(isset($_POST['submit'])){
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $judul = $_POST['judul'];
    $kota = $_POST['kota'];
    $penerbit = $_POST['penerbit'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];
    
    if($_FILES['ganticover']['name']){
        $cover = $_FILES['ganticover']['name'];
        $lokasi = $_FILES['ganticover']['tmp_name'];

        if(array_key_exists('namacover', $_POST)){
            $filename = $_POST['namacover'];
            
            if(file_exists("../assets/cover/".$filename)){
                unlink("../assets/cover/".$filename);
            }
        }

        $upload = move_uploaded_file($lokasi, "../assets/cover/". $cover);

        $query = mysqli_query ($db, "UPDATE buku SET penulis = '$penulis', tahun = '$tahun', judul = '$judul', kota = '$kota', penerbit = '$penerbit', cover = '$cover', sinopsis = '$sinopsis', stok = '$stok' WHERE id_buku = '$id'");
    
        if($query){
            echo "<script>alert('Berhasil!')</script>";
        }else{
            echo "<script>alert('Gagal!')</script>";
        }
    }else{
        $query = mysqli_query($db, "UPDATE buku SET penulis = '$penulis', tahun = '$tahun', judul = '$judul', kota = '$kota', penerbit = '$penerbit', sinopsis = '$sinopsis', stok = '$stok' WHERE id_buku = '$id'");
    
        if($query){
            echo "<script>alert('Berhasil!')</script>";
        }else{
            echo "<script>alert('Gagal!')</script>";
        }
    }
}
?>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
