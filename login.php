<?php
session_start();

if (isset($_COOKIE['login'])) {
  if ($_COOKIE['login'] == 'true') {
    $_SESSION['login'] = true;
  }
}
if (isset($_SESSION["login"])) {
  header("location: index.php");
}
// Koneksi
require 'functions.php';

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {

    // cek password

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {


      $_SESSION["login"] = true;

      // cookie
      if (isset($_POST['remember'])) {
        setcookie('login', 'true', time() + 60);
      }

      header("Location: index.php");
      exit;
    } else {
      echo "
        <script>
          alert('Password Salah!');
        </script>
        ";
    }
  }
  // else{
  //   mysqli_error($conn);
  // }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body style="background-image: url('img/georgie-cobbs-bKjHgo_Lbpo-unsplash.jpg'); background-attachment: fixed;
    background-size: cover;">
  <!-- Navbar -->
  <!-- <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="index.php" class="navbar-brand page-scroll">PilutPi</a>
        </div>
      </div>
    </nav> -->
  <!-- Akhir Navbar -->

  <!-- Contact -->
  <div class="container" style="margin-top: 60px; padding-top:50px;">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6" style="background-color:white; padding-bottom:60px; border-radius: 10px; opacity:.8;">
        <h3 class="text-center">Login</h3><br>
        <form action="" method="post" style="padding: 0 50px;">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus autocomplete="" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="" required>
          </div>
          <div class="form-group text-center">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
          </div>
          <div class="form-group">
            <button type="submit" name="login" class="form-control btn btn-primary">Log In</button>
          </div>
          <hr style="width: 100%; border: 1px solid #eee">
          <a href="registrasi.php" type="submit" name="login" class="form-control btn btn-primary">Sign Up</a>
        </form>
      </div>
    </div>
  </div>
  <!-- akhir Contact -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>