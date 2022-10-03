<!-- M Ilham -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login | Pegawai</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    }

    @media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
    }

    .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
    }

    .bi {
    vertical-align: -.125em;
    fill: currentColor;
    }

    .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
    }

    .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/login/login.css" rel="stylesheet">
</head>
<body>
    <?php 
        // THOR
        include "../config.php";

        session_start();

        if($_SESSION){
            header('location: dashboard.php');
        }

        if(isset($_POST['login'])){
            $nip = $_POST['nip'];
            $password = $_POST['password'];

            $query = mysqli_query ($db, "SELECT * FROM petugas WHERE nip='$nip' AND password='$password'");
            $data = mysqli_fetch_assoc($query);

            if($data){
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['level'] = $data['id_level'];
                
                header('location: dashboard.php');
            }else{
                echo "<script>alert('Login Gagal!')</script>";
            }
        }

        
    ?>

    <main class="form-signin w-100 m-auto">
    <form method="POST">
        <h1 class="h2 mb-3 fw-normal">LOG IN <label class="text-secondary">| Pegawai</label> </h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" required>
            <label for="floatingInput">Masukkan NIP</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <label for="floatingPassword">Masukkan Password</label>
        </div>

        <div class="checkbox mb-3">
        <label class="text-secondary">
            <input type="checkbox" id="show" onclick="showPassword()"> Show Password
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Log in</button>
    </form>
    <label class="mt-3 text-secondary">Login Sebagai Siswa? <a href="../siswa/login.php" class="link-dark">Klik Di sini</a></label>
    </main>

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
