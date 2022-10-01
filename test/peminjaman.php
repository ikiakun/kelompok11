<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Perpustakaan | Dashboard</title>

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
        }

        // Logout_M Ilham
        if(isset($_POST['logout'])){
                session_destroy();
                header('Location: login.php');
            }
        
        // Data User_M Ilham
        $nip = $_SESSION['nip'];
        $query = mysqli_query ($db, "SELECT * FROM petugas WHERE nip='$nip'");
        $data = mysqli_fetch_assoc($query);

        // Data Buku_M Ilham
        $buku = mysqli_query($db,"SELECT * FROM buku");
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
                        <a class="nav-link active" aria-current="page" href="peminjaman.php">
                        <i class="fa-solid fa-file-circle-plus mx-2"></i>
                        Peminjaman Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                        <i class="fa-solid fa-book-bookmark mx-2"></i>
                        Daftar Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                        <i class="fa-solid fa-users mx-1"></i>
                        Daftar Siswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                        <i class="fa-solid fa-file-lines mx-2"></i>
                        Laporan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                        <i class="fa-solid fa-file-excel mx-2"></i>
                        Laporan Denda
                        </a>
                    </li>
                    <!-- Batas-admin_M Ilham -->
                    <?php 
                        if($_SESSION['level'] == 1){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
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
                <h1 class="h2">Peminjaman</h1>
            </div>
            <div class="container">
                <!-- Peminjaman_M Ilham -->
                <form action="proses-pinjam.php" method="POST">
                    <input type="text" name="nip" hidden value="<?= $_SESSION['nip']; ?>"> <br>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">NIS Siswa</label>
                        <input type="text" name="nis" class="form-control w-50" placeholder="Masukkan NIS Siswa" required>
                    </div>
                    <hr>
                    <h6 class="text-secondary">Pilih Buku : </h6>
                    <div class="row mt-3">
                    <?php while($data = mysqli_fetch_array($buku)){ ?>
                        <div class="col-4">
                            <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../assets/img/books.jpg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <input type="checkbox" name="buku[]" id="buku[]" value="<?= $data[0] ?>" onclick="reveal()"> <small class="text-muted"> Pilih Buku</small><br>
                                    <h5 class="card-title"><?= $data['judul'] ?></h5>
                                    <p class="card-text"><?= $data['penulis'] ?></p>
                                    <p class="card-text">Stok : <?= $data['stok'] ?> Buah</p>
                                    <input type="number" min="0" name="jumlah[]" id="jumlah[]" class="form-control" disabled hidden placeholder="Masukkan Jumlah Buku"> <br>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    <?php } ?>
                    </div>
                    <button type="submit" name="pinjam" class="btn btn-primary mb-3 float-end">Submit</button>
                </form>
            </div>
        </main>
    </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Reveal_M Ilham -->
    <script>
        function reveal(){
            let checkbox = document.getElementsByName('buku[]');
            let jml = document.getElementsByName('jumlah[]');

            for (let i = 0; i < checkbox.length; i++) {
            if(checkbox[i].checked == true){
                jml[i].disabled = false;
                jml[i].hidden = false;
            }else{
                jml[i].disabled = true;
                jml[i].hidden = true;
            }
        }
        }
    </script>
</body>
</html>
