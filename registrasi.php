<?php 
  // Koneksi
  require 'functions.php';

  if(isset($_POST["daftar"])){

    // Notifikasi
    if(registrasi($_POST) > 0){
      echo "
        <script>
          alert('Registrasi Berhasil!');
        </script>
      ";
    }else{
      echo mysqli_error($conn);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PilutPi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
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
          <div class="col-sm-6 col-sm-offset-6" style="background-color:white; padding-bottom:60px; border-radius: 10px; opacity:.8;" >
            <h3 class="text-center">Sign Up</h3><br>
            <form action="" method="post" style="padding: 0 50px;">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" autofocus autocomplete="" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="" required>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" autocomplete="" required>
                </div>
                <div class="form-group">
                <button type="submit" name="daftar" class="form-control btn btn-primary">Sign Up</button>
                </div>
                <div class="text-center">
                <hr style="width: 100%; border: 1px solid #eee">
                <a href="login.php" class="small ">I Have a Account</a>
                </div>
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