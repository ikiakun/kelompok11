<!-- Ilham Alfa -->
<?php
include 'config.php';

session_start();
$buku = mysqli_query($db,"SELECT * FROM buku");
?>



<form action="proses-pinjam.php" method="POST">
    NIP : <input type="text" name="nip" readonly value="<?= $_SESSION['nip']; ?>"> <br>
    NIS : <input type="text" name="nis"> <br>

    <?php while($data = mysqli_fetch_array($buku)){ ?>

    <input type="checkbox" name="buku[]" id="buku[]" value="<?= $data[0] ?>"> <?= $data[1] ?><br>
    jumlah <input type="number" min="0" name="jumlah[]"> <br>

    <?php } ?>

    <button type="submit" name="pinjam">Submit</button>
</form>