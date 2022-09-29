<?php
include 'config.php';
$take = mysqli_query($db,"SELECT * FROM buku");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>
                        <!-- Thor - Konten mysql -->
                         <div class="container text-center mt-4">
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
                                    $data = mysqli_query($db, "SELECT * FROM buku");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data/$batas);

                                    $result = mysqli_query($db,"SELECT * FROM buku ORDER BY id_buku LIMIT $halaman_awal,$batas");
                                    $no = $halaman_awal+1;
                                    while ($data = mysqli_fetch_array($result)) {
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
                                    <td colspan="2">
                                        <a href="editbuku.php?id_buku=<?= $data['id_buku'] ?>" class ="btn btn-warning">edit</a>
                                        <a href="deletebuku.php?id_buku=<?= $data['id_buku'] ?>" class="btn btn-danger">hapus</a>
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



</body>
</html>