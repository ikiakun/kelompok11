<?php
include 'config.php';
$take = mysqli_query($db,"SELECT * FROM petugas JOIN kelamin ON petugas.id_kelamin = kelamin.id_kelamin");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Petugas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- ICON FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>
                        <!-- Thor - Konten mysql -->
                        <div class="container text-center mt-4">
                            <table class="table table-striped table-hover mt-4">
                            <thread>
                                <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Password</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thread>
                            <tbody>
                                <?php
                                    while($data = mysqli_fetch_array($take)){                           
                                ?>
                                <tr>
                                    <td><?= $data['nip'] ?> </td>
                                    <td><?= $data['nama'] ?> </td>
                                    <td><?= $data['kelamin'] ?> </td>
                                    <td><?= $data['alamat'] ?> </td>
                                    <td><?= $data['password'] ?> </td>
                                    <td colspan="2">
                                        <a href="editpetugas.php?nip=<?= $data['nip'] ?>" class ="btn btn-warning">edit</a>
                                        <a href="deletepetugas.php?nip=<?= $data['nip'] ?>" class="btn btn-danger">hapus</a>
                                    </td>
                                </tr>
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