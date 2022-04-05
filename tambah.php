<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
}


// Koneksi
require 'functions.php';

if (isset($_POST["submit"])) {

  // Notifikasi 
  if (tambah($_POST) > 0) {
    echo "
        <script>
          alert('Data Berhasil Ditambahkan!');
          document.location.href = 'index.php';
        </script>
      ";
  } else {
    echo "
      <script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'tambah.php';
    </script>
      ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
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
  </nav>
  <!-- Akhir Navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron text-center" style="height: 300px; background-position: 0 -360px;">
    <!-- <h1>Titip Dodolan ya</h1>
      <p>Loss ae</p> -->
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Contact -->
  <section class="contact" id="contact" style="background-color: white;">
    <div class="container">
      <div class="row" style="padding-bottom: 10px;">
        <div class="col-sm-12">
          <h2 class="text-center">Titip Dodolan</h2>
          <hr>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Nama Laptop</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Laptop" autocomplete="" required autofocus>
            </div>
            <div class="form-group">
              <label for="processor">Processor</label>
              <input type="text" class="form-control" name="processor" id="processor" placeholder="Processor" autocomplete="" required>
            </div>
            <div class="form-group">
              <label for="dimensi">Dimensi</label>
              <input type="text" class="form-control" name="dimensi" id="dimensi" placeholder="Dimensi" autocomplete="" required>
            </div>
            <div class="form-group">
              <label for="resolusi">Resolusi</label>
              <input type="text" class="form-control" name="resolusi" id="resolusi" placeholder="Resolusi" autocomplete="" required>
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" name="gambar" id="gambar" placeholder="Gambar" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir Contact -->

  <?php include "footer.php" ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>