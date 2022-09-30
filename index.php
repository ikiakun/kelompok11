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
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto" style="margin-top: 120px;">
                
                <!-- Kotak Login -->
                <div class="card border-0 shadow">
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

    <!-- Show Password -->
    <script>
        function showPassword(){
            if(document.getElementById('show').checked){
                document.getElementById('password').type = 'text';
            }else{
                document.getElementById('password').type = 'password';
            }
        }
    </script>
</body>
</html>