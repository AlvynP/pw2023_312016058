<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

// kembalikan jika tidak ada id di url
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit;
}

// ambil id data dari url
$id = $_GET['id'];

// query databerdasarkan id
$d = query("SELECT * FROM data WHERE id = $id");

// cek apapkah tombol ubah sudah di tekan atau belum
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    //     echo "<script>
    //     alert('Data berhasil ditambahkan!'); document.location.href = 'index.php';
    // </script>";
    $_SESSION['eks'] = 'Data berhasil diubah!';
    header('location: index.php');
  } else {
    echo 'Data gagal diubah!';
    //     echo "<script>
    //     alert('Data gagal ditambahkan'); document.location.href = 'tambah.php';
    // </script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h3>Ubah Data</h3>
  <form class="form-inline" action="" method="POST">
    <input type="hidden" name="id" value="<?= $d['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" required name="nama" value="<?= $d['nama']; ?>" autofocus>
        </label>
      </li>
      <br>
      <li>
        <label>
          Email :
          <input type="email" required name="email" value="<?= $d['email']; ?>">
        </label>
      </li>
      <br>
      <li>
        <label>
          No. Handphone :
          <input type="tel" required name="hp" value="<?= $d['hp']; ?>">
        </label>
      </li>
      <br>
      <li>
        <label>
          Gambar :
          <input type="text" required name="gambar" value="<?= $d['gambar']; ?>">
        </label>
      </li>
      <br>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>




  <!-- <form action="" class="form-inline">
    <label for="nama">Nama:</label>
    <input type="text">
    <label for="email">Email:</label>
    <input type="email">
    <label for="hp">No. Handphone:</label>
    <input type="tel">
    <label for="gambar">Gambar:</label>
    <input type="text">
    <button type="submit">Tambah Data!</button>
  </form> -->
</body>

</html>