<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
}


// Koneksi
require 'functions.php';
$id = $_GET["id"];
$laptop = query("SELECT * FROM laptop WHERE id =$id");

if (isset($_POST["update"])) {

  // Notifikasi 
  if (ubah($_POST) > 0) {
    echo "
        <script>
          alert('Data Berhasil Diupdate!');
          document.location.href = 'index.php';
        </script>
      ";
  } else {
    echo "
      <script>
        alert('Data Gagal Diupdate!');
        document.location.href = 'index.php';
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
          <h2 class="text-center">Ubah Data</h2>
          <hr>
        </div>
        <?php foreach ($laptop as $row) : ?>
          <div class="col-sm-6 col-sm-offset-3">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="id" hidden>ID</label>
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $row["id"] ?>">
              </div>
              <div class="form-group">
                <label for="nama">Nama Laptop</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Laptop" value="<?= $row["nama"] ?>" required>
              </div>
              <div class="form-group">
                <label for="processor">Processor</label>
                <input type="text" class="form-control" name="processor" id="processor" placeholder="Processor" value="<?= $row["processor"] ?>" required>
              </div>
              <div class="form-group">
                <label for="dimensi">Dimensi</label>
                <input type="text" class="form-control" name="dimensi" id="dimensi" placeholder="Dimensi" value="<?= $row["dimensi"] ?>" required>
              </div>
              <div class="form-group">
                <label for="resolusi">Resolusi</label>
                <input type="text" class="form-control" name="resolusi" id="resolusi" placeholder="Resolusi" value="<?= $row["resolusi"] ?>" required>
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <div class="form-group">
                  <center>
                    <img src="img/<?= $row["gambar"] ?>" class="thumbnail" alt="Responsive image" style="height: 300px;">
                  </center>
                </div>
              </div>
              <div class="form-group">
                <label for="gambar">Ubah Gambar</label>
                <input type="hidden" class="form-control" name="gambarLama" id="gambarLama" value="<?= $row["gambar"] ?>">
                <input type="file" name="gambar" id="gambar" placeholder="Gambar" value="<?= $row["gambar"] ?>">
              </div>
              <button type="submit" name="update" class="btn btn-primary">Update</button>
              <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are You Sure?');" type="submit" name="hapus" class="btn btn-danger">Hapus Barang</a>
            </form>
          </div>
        <?php endforeach; ?>
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