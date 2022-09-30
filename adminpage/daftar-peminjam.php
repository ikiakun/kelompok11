<?php
    include 'config.php';
    
    session_start();

    $pinjam = mysqli_query($db, 'SELECT peminjaman.id_peminjaman as id, siswa.nama as nama_siswa, kelas.nama_kelas as kelas, peminjaman.tgl_peminjaman as tgl_pinj, peminjaman.tgl_pemgembalian as tgl_pengm, petugas.nama as nama_petugas FROM  peminjaman JOIN siswa ON peminjaman.nis = siswa.nis JOIN petugas ON peminjaman.nip = petugas.nip JOIN kelas ON siswa.id_kelas = kelas.id_kelas');
?>
<table>
    <thead>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Petugas</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php 
            while ($data = mysqli_fetch_array($pinjam)) {
        ?>
        <tr>
            <td><?= $data['nama_siswa'] ?></td>
            <td><?= $data['kelas'] ?></td>
            <td><?= $data['tgl_pinj'] ?></td>
            <td><?= $data['tgl_pengm'] ?></td>
            <td><?= $data['nama_petugas'] ?></td>
            <td><a href="kembali.php?id=<?= $data['id'] ?>">Mengembalikan</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>