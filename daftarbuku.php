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
</head>
<body>
    
                         <div class="container text-center mt-4">
                            <table class="table mt-4">
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
                                <td><?= $data['no'] ?> </td>
                                <td><?= $data['penulis'] ?> </td>
                                <td><?= $data['tahun'] ?> </td>
                                <td><?= $data['judul'] ?> </td>
                                <td><?= $data['kota'] ?> </td>
                                <td><?= $data['Penerbit'] ?> </td>
                                <td>
                                    <img src="cover/<?= $data['cover'] ?>" alt="" class="img-thumbnail" style="width: 50px;">  
                                </td>
                                <td><?= $data['Sinopsis'] ?> </td>
                                <td><?= $data['Stok'] ?> </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </div>



</body>
</html>