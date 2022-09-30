<?php
include ('config.php');
session_start();

if(isset($_SESSION['nis'])){
  header('location: home.php');
}

if(isset($_POST['login'])){
    $nis = $_POST['nis'];
    $password = $_POST['password'];

    $query = mysqli_query ($db, "SELECT * FROM usersiswa WHERE nis='$nis' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['nis'] = $data['nis'];
        $_SESSION['id_pangkat'] = $data['id_pangkat'];
        if($_SESSION['id_pangkat'] == 1){
          header('location: home.php');
        }elseif($_SESSION['id_pangkat'] == 2) {
          header('location: mhs_home.php');
        }
      } else{
        echo "<script>alert('Anda kurang beruntung')</script>";
      }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script type="text/javascript">
            function preventBack(){window.history.forward()}
            setTimeout("preventBack()",0)
              window.onunload=function(){null;} -->
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">KOMINFO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
  </div>
</nav>

<div class="container bg-secondary bg-opacity-10 border border-secondary p-3 mt-5">
<form action="" method="POST">
  <h3>Masuk Lur</h3>  
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="nis" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="paswot"required>
    <input type="checkbox" class="form-check-label" onclick="myFunction()">Show Password
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input">
    <label class="form-check-label">Remember me</label>
  </div> -->
  <button type="submit" class="btn btn-success" name="login">Login</button>
  <br>
  <a>Belum punya <s>jodoh</s> akun?</a>
  <br>
  <a href="register.php" type="submit" class="btn btn-primary" name="signup">Daftar</a>
  <br>
</form>


<script src="js/bootstrap.bundle.min.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("paswot");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>