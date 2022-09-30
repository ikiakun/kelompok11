<?php
include "config.php";

// session_start();
// if(isset($_SESSION['nis'])){
//     header('location: home.php');
//   }
  
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];
    
    $query = mysqli_query($db, "SELECT * FROM usersiswa WHERE nis = '$nis'");
    $data = mysqli_fetch_assoc($query);
    if($data['nis']){
        if($data['password'] == $password){
            $_SESSION['nis'] = $nis;
            echo "<script>alert('Login Berhasil');
            window.location.replace('home.php');</script>";
        }else{
            echo "<script>alert('Password Salah')</script>";
        }
    }else{
        echo "<script>alert('Username tidak terdaftar')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="stylesiswa.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<<<<<<< HEAD
    <!-- ICON FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- Wow Animate -->
    <link rel="stylesheet" href="assets/WOW-master/css/libs/animate.css">
    <!-- CSS Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    
=======
>>>>>>> e5fcfcb6c063874ee42f194a4710e8e616143b80
</head>
<body>

    <div class="container">
<<<<<<< HEAD
        <!-- card1 -->
        <div class="row justify-content-center mt-3">
            <div class="card border-0" style="background-color: bisque;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h1 class="mt-5 fw-bold wow fadeInLeft" style="color: darkslateblue;">Hi There!</h1>
                            <p class="text-secondary wow fadeInLeft">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem fuga magni ipsa expedita officia distinctio ducimus molestias soluta delectus ipsum laborum nam, eaque iste eligendi quidem. Explicabo, dolore architecto! Voluptas aspernatur id sunt distinctio nobis?</p>
                            <a href="" class="tombol-biru btn mb-5 ">Read more</a>
                        </div>
                        <div class="col" style="background: url(assets/img/abstr.png) no-repeat; background-size: 43%; background-position: center;">
                            <!-- <img src="assets/img/abstr.png" alt="" height="300px" class="mx-auto d-block"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <h4 class="mt-3 fw-bold" style="color: darkslateblue;">Daftar Buku : </h4>
        <div class="row justify-content-center">
            <!-- Thor -->
            <?php
                while($data = mysqli_fetch_array($take)){
            ?>
            <div class="col-2 mt-3">
                <div class="card border-0">
                    <img src="assets/img/books.jpg" class="card-img-top" alt="...">
=======
        <div class="row">
            <div class="col-4 mx-auto" style="margin-top: 120px;">
                
                <!-- Kotak Login -->
                <div class="card border-0 shadow">
>>>>>>> e5fcfcb6c063874ee42f194a4710e8e616143b80
                    <div class="card-body">
                        <h1 class="text-center mb-3">Login Siswa</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold">NIS</label>
                                <input type="text" class="form-control" id="nama" name="nis" placeholder="Masukkan NIS" autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="show" onclick="showPassword()">
                                <label class="form-check-label text-secondary">Show Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-4" name="login">Login</button>
                            <p class="text-secondary text-center">Belum punya <s>jodoh</s> akun? <a href="registersiswa.php" class="fw-bold link-dark">Daftar disini</a> </p>
                            <p class="text-secondary text-center">Bukan siswa? <a href="petugaspage/loginpetugas.php" class="fw-bold link-dark">Login disini</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
    <!-- Wow animate -->
    <script src="assets/WOW-master/dist/wow.js"></script>
    <script>
        wow = new WOW(
                    {
                      boxClass:     'wow',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       true,       // default
                      live:         true        // default
                    }
                    )
                    wow.init();
=======

    <!-- Show Password -->
    <script>
        function showPassword(){
            if(document.getElementById('show').checked){
                document.getElementById('password').type = 'text';
            }else{
                document.getElementById('password').type = 'password';
            }
        }
>>>>>>> e5fcfcb6c063874ee42f194a4710e8e616143b80
    </script>
</body>
</html>