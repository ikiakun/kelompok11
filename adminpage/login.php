<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php
    include 'config.php'; 

    session_start();

    if(isset($_POST['login'])){
        $nama = $_POST['nama'];
        $pass = $_POST['password'];

        $login = mysqli_query($db, "SELECT * FROM petugas WHERE nama = '$nama'");
        $data = mysqli_fetch_array($login);

        if($pass == $data['password']){
            $_SESSION['nip'] = $data['nip'];
            echo "<script>alert('Berhasil Login');
                document.location = 'peminjaman.php';
                </script>";
        }else{
            echo "<script>alert('Gagal Login');
                document.location = 'login.php';
                </script>";
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto" style="margin-top: 120px;">
                
                <!-- Kotak Login -->
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="text-center mb-3">Log in</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name" autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="show" onclick="showPassword()">
                                <label class="form-check-label text-secondary">Show Password</label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100 mb-4">Sign In</button>
                            <p class="text-secondary text-center">Don't Have An Account? <a href="register.php" class="fw-bold link-dark">Register</a> </p>
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