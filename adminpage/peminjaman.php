<?php
include 'config.php';

session_start();
?>



<form action="proses-pinjam.php" method="POST">
    NIP : <input type="text" name="nip" readonly value="<?= $_SESSION['nip']; ?>"> <br>
    NIS : <input type="text" name="nis"> <br>
    <button type="submit" name="pinjam">Submit</button>
</form>