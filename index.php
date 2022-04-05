<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
}

require 'functions.php';
// query data
// laptop

// $jumlahDataPerhalaman = 3;
// $jumlahData = count(query("SELECT * FROM laptop"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// var_dump($halamanAktif);


$laptop = query("SELECT * FROM laptop");



// Portfolio
$portfolio = query("SELECT * FROM portfolio");
?>

<!DOCTYPE html>
<html lang="en" id="home">
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

        <a href="#home" class="navbar-brand page-scroll">PilutPi</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right" style="padding-right:15px;">
          <li><a href="#about" class="page-scroll">About</a></li>
          <li><a href="#portofolio" class="page-scroll">Portfolio</a></li>
          <li><a href="#market" class="page-scroll">Market</a></li>
          <li style="padding-right: 10px;"><a href="#contact" class="page-scroll">Contact</a></li>
          <a href="logout.php" type="button" class="btn btn-primary navbar-btn">Logout</a>
          <!-- <li style="padding-right: 10px;"><button type="button" class="btn btn-primary navbar-btn">Sign Up</button></li> -->
        </ul>
      </div>

    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron text-center">
    <a href="#"><img src="img/pilut.JPG" class="img-circle"></a>
    <h1>Lutfi Rizalul Fiqri</h1>
    <p><a href="">College</a> | <a href="">Staf IT</a> | <a href="">HMP</a></p>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- About -->
  <section class="about" id="about">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">About</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-2">
          <p class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque vitae cum, odit itaque nulla, illo repellat asperiores repellendus at autem quaerat voluptatum atque quo et mollitia eaque facere aperiam ut! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quod magnam debitis quasi corrupti dolorum incidunt, sed placeat odit repellendus animi quae iure voluptas, unde rerum architecto numquam doloremque. Atque.</p>
        </div>
        <div class="col-sm-4">
          <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iure doloribus sequi nulla amet ab delectus fugiat eum rem. Excepturi quisquam reprehenderit porro vel cum voluptas dicta, soluta pariatur aliquam. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti suscipit, libero nesciunt, ad voluptatibus quisquam ratione temporibus eum totam quae qui asperiores aut minus sunt rem rerum exercitationem maiores voluptate?</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir About -->

  <!-- Portofolio -->
  <section class="portofolio" id="portofolio" style="padding-bottom: 15px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Portfolio</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <?php foreach ($portfolio as $gam) : ?>
          <div class="col-sm-4">
            <a href="" class="thumbnail">
              <img src="img/portofolio/<?= $gam["gambar"]; ?>">
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- Akhir Portofolio -->

  <!-- Market -->
  <section class="market" id="market">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Market</h2>
          <hr>
        </div>
      </div>

      <div class="row">
        <?php foreach ($laptop as $row) : ?>
          <div class="col-sm-4" id="jualan" style="padding-top: 10px;">
            <a href="ubah.php?id=<?= $row["id"]; ?>" class="thumbnail" id="jualan" style="margin: 5px;">
              <h4 class="text-center"><?= $row["nama"]; ?></h4>
              <img src="img/<?= $row["gambar"]; ?>">
              <ul>
                <!-- <li style='list-style-type: none;'>Nama : </li> -->
                <li style='list-style-type: none;'>Processor : <?= $row["processor"]; ?></li>
                <li style='list-style-type: none;'>Dimensi : <?= $row["dimensi"]; ?></li>
                <li style='list-style-type: none;'>Resolusi : <?= $row["resolusi"]; ?></li>
              </ul>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row" style="padding-bottom: 15px; padding-top:10px;">
        <div class="col-sm-12 text-center">
          <a href="tambah.php" class="btn btn-success">Titip Dodolan</a>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir dari Market -->


  <!-- Contact -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="row" style="padding-bottom: 15px;">
        <div class="col-sm-12">
          <h2 class="text-center">Contact</h2>
          <hr>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
          <form>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <select class="form-control">
              <option>-- Pilih Kategori --</option>
              <option>Photograph</option>
              <option>Web Developer</option>
            </select>
            <div class="form-group">
              <label for="pesan">Pesan</label>
              <textarea class="form-control" rows="6" placeholder="Pesan" id="pesan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir Contact -->

  <?php include "footer.php" ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>