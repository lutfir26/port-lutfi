<?php
// Koneksi
$host = "localhost";
$username = "root";
$password = "";
$database = "latihanlutfi";

$conn = mysqli_connect($host, $username, $password, $database);

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;
  $nama = htmlspecialchars($data["nama"]);
  $processor = htmlspecialchars($data["processor"]);
  $dimensi = htmlspecialchars($data["dimensi"]);
  $resolusi = htmlspecialchars($data["resolusi"]);
  // $gambar = htmlspecialchars( $data["gambar"]);

  // upload
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $queri = "INSERT INTO laptop VALUES ('', '$nama', '$processor', '$dimensi', '$resolusi', '$gambar')";
  mysqli_query($conn, $queri);
  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // notifikasi pilih gambar
  if ($error === 4) {
    echo "
    <script>
      alert('Pilih Gambar Terlebih Dahulu!');
    </script>
    ";
    return false;
  }

  // cek ekstensi gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
    <script>
      alert('Yang Anda Upload Bukan Gambar!');
    </script>
    ";
    return false;
  }

  // membatasi ukuran gambar
  if ($ukuranFile > 1000000) {
    echo "
    <script>
      alert('Ukuran Gambar Terlalu Besar!');
    </script>
    ";
    return false;
  }
  // generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  // masuk ke direktori
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

function ubah($data)
{
  global $conn;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $processor = htmlspecialchars($data["processor"]);
  $dimensi = htmlspecialchars($data["dimensi"]);
  $resolusi = htmlspecialchars($data["resolusi"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }



  $queri = "UPDATE laptop SET nama='$nama', processor='$processor', dimensi='$dimensi',resolusi='$resolusi',gambar='$gambar' WHERE id=$id";
  mysqli_query($conn, $queri);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM laptop WHERE id=$id");

  return mysqli_affected_rows($conn);
}





// Login



function registrasi($data)
{
  global $conn;
  $nama = strtoupper(stripslashes($data["nama"]));
  $username = strtolower(stripslashes($data["username"]));
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('Username Sudah Terdaftar!');
       </script>
    ";
    return false;
  }

  // Konfirmasi Password
  if ($password !== $password2) {
    echo "
      <script>
          alert('Konfirmasi Password Tidak Sesuai!');
        </script>
    ";
    return false;
  }


  $password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO user VALUES ('', '$nama', '$username', '$email', '$password')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
