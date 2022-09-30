<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun Petugas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-4 mx-auto" style="margin-top: 50px;">
                
                <!-- Kotak Register -->
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="text-center mb-3">Register</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autofocus required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="dropdown">
                            <select class="form-control" aria-label="Default select example" name="jenis_kelamin">
                              <?php
                                $kel = mysqli_query($db, "SELECT jenis_kelamin FROM petugas");
                                while($data = mysqli_fetch_assoc($kel)) {
                              ?>
                            <option value="<?= $data['jenis_kelamin']?>"> <?= $data['jenis_kelamin'] ?> </option>
                              <?php
                                }
                              ?>         
                            </select>              
                            </div>
                        </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="konfirm" name="konfirm" placeholder="Konfirmasi Password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="show" onclick="showPassword()">
                                <label class="form-check-label text-secondary">Show Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-4">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- show Password -->
    <script>
        function showPassword(){
            if(document.getElementById('show').checked){
                document.getElementById('password').type = 'text';
                document.getElementById('konfirm').type = 'text';
            }else{
                document.getElementById('password').type = 'password';
                document.getElementById('konfirm').type = 'password';
            }
        }
    </script>

    <!-- Thor - mysqli konten -->
    <?php
        if(isset($_POST['submit'])){
        $username = $_POST['nama'];
        $password = md5($_POST['password']);
        $password2 = md5($_POST['konfirm']);
        
            if($password !== $password2){
                echo "<script>alert('Password tidak cocok!')</script>";
            }elseif($password == $password2){
            $query = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
            $data = mysqli_fetch_assoc($query);
                if($data){
                    echo "<script>alert('Nama sudah ada, KREATIFLAH!')</script>";
                }else{
                mysqli_query ($db, "INSERT INTO user(id_pangkat, username, password) 
                VALUES(2, '$username', $password)");
                echo "<script>alert('Berhasil membuat akun, silakan login');
                window.location='login.php';</script>";
                    }
            }
        }
    ?>
</body>
</html>