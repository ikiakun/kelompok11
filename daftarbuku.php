<?php
include ('config.php');
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
            <ul class="navbar nav">
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
            </ul>
        </div>
    </nav>

    <div class="row justify-content-center mt-3">
        <div class="card border-0 w-75" style="background-color: bisque;">
            <div class="card-body">
                <div class="row"></div>
                <div class="col-5">
                    <h3 class="mt-3 fw-bold" style="color: darkslateblue;">Hi There!</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nostrum rem nesciunt nemo, illo officia itaque provident sunt aliquid sapiente?</p>
                </div>
                <div class="col-3">
                    <img src="assets/img/abstr.png" alt="" height="100px">
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="container text-center mt-4">
            <table class="table table-striped table-hover mt-4">
            <thread>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tahun</th>
                <th scope="col">Judul</th>
                <th scope="col">Kota</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Cover</th>
                <th scope="col">Sinopsis</th>
                <th scope="col">Stok</th>
                </tr>
            </thread>
            <tbody>
                <?php
                while($data = mysqli_fetch_array($take)){
                
                ?>
                <tr>
                <td><?= $data['id_buku'] ?> </td>
                <td><?= $data['penulis'] ?> </td>
                <td><?= $data['tahun'] ?> </td>
                <td><?= $data['judul'] ?> </td>
                <td><?= $data['kota'] ?> </td>
                <td><?= $data['penerbit'] ?> </td>
                <td>
                    <img src="cover/<?= $data['cover'] ?>" alt="" class="img-thumbnail" style="width: 50px;">  
                </td>
                <td><?= $data['sinopsis'] ?> </td>
                <td><?= $data['stok'] ?> </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </div> -->

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>