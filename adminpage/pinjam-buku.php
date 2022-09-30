<?php
include 'config.php';

session_start();

$buku = mysqli_query($db,"SELECT * FROM buku");
?>

<form action="">
    <?php while($data = mysqli_fetch_array($buku)){ ?>

        <input type="checkbox" name="" id="">

    <?php } ?>
</form>