<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Perpustakaan | Edit</title>

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
        }else if($_SESSION['level'] != 1){
            header('location: dashboard.php');
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
                        <a class="nav-link" aria-current="page" href="daftar-peminjaman.php">
                        <i class="fa-solid fa-file-lines mx-2"></i>
                        Laporan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="laporan-denda.php">
                        <i class="fa-solid fa-file-circle-xmark mx-2"></i>
                        Laporan Denda
                        </a>
                    </li>
                    <!-- Batas-admin_M Ilham -->
                    <?php 
                        if($_SESSION['level'] == 1){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="daftar-petugas.php">
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
            <!-- Thor - Konten mysql -->
            <?php
                $id = $_GET['id'];
                $take = mysqli_query($db, "SELECT * FROM petugas WHERE nip = $id");
                $data1 = mysqli_fetch_assoc($take);
            ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Data Petugas <?= $data1['nama'] ?></h1>
            </div>
            <div class="row mt-3">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama petugas</label>
                        <input type="text" name="nama" id="nama" class="form-control w-50" placeholder="Masukkan Nama petugas..." value="<?= $data1['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Jenis Kelamin : </label>
                        <input class="form-check-input" type="radio" name="jk" value="L" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Laki-laki
                        </label>
                        <input class="form-check-input" type="radio" name="jk" value="P">
                        <label class="form-check-label" for="exampleRadios1">
                            Perempuan
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Alamat : </label>
                        <input type="text" name="alamat" class="form-control w-50" placeholder="Masukkan Alamat..." value="<?= $data1['alamat'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Password : </label>
                        <input type="password" id="password" name="password" class="form-control w-50" placeholder="Masukkan Password..." required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Konfirmasi Password : </label>
                        <input type="password" id="konfirmasi" name="konfirmasi" class="form-control w-50" placeholder="Konfirmasi Password..." required>
                    </div>
                    <div class="checkbox mb-3">
                        <label class="text-secondary">
                            <input type="checkbox" id="show" onclick="showPassword()"> Show Password
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit" id="submit">Tambah Data Petugas</button>
                </form>
            </div>
        </main>

    </div>
</div>

    <!-- Thor - mysqli konten -->
    <?php
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $kelamin = $_POST['jk'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];
            $password2 = $_POST['konfirmasi'];

                if($password == $password2) {
                    $query = mysqli_query($db, "UPDATE petugas SET nama = '$nama', jenis_kelamin = '$kelamin', alamat = '$alamat', password = '$password' WHERE nip = $id");

                    if($query){
                        echo "<script>alert('Berhasil Mengubah Data Petugas');
                            window.location='daftar-petugas.php';</script>";
                    }else{
                        echo "<script>alert('Gagal Mengubah Data Petugas')</script>";
                    }
                    
                }else{
                    echo "<script>alert('Password tidak cocok!')</script>";
                }
            }
        ?>

    <!-- Show Password -->
    <script>
        function showPassword(){
            if(document.getElementById('show').checked){
                document.getElementById('password').type = 'text';
                document.getElementById('konfirmasi').type = 'text';
            }else{
                document.getElementById('password').type = 'password';
                document.getElementById('konfirmasi').type = 'password';
            }
        }
    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
