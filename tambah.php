<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

// cek apapkah tombol tambah sudah di tekan atau belum
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    //     echo "<script>
    //     alert('Data berhasil ditambahkan!'); document.location.href = 'index.php';
    // </script>";
    $_SESSION['eks'] = 'Data berhasil di tambahkan!';
    header('location: index.php');
  } else {
    echo 'Data gagal ditambahkan!';
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
  <h3>Tambah Data</h3>
  <form class="form-inline" action="" method="POST">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" required name="nama" autofocus>
        </label>
      </li>
      <br>
      <li>
        <label>
          Email :
          <input type="email" required name="email">
        </label>
      </li>
      <br>
      <li>
        <label>
          No. Handphone :
          <input type="tel" required name="hp">
        </label>
      </li>
      <br>
      <li>
        <label>
          Gambar :
          <input type="text" required name="gambar">
        </label>
      </li>
      <br>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
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