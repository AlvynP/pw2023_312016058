<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

// ambildata dari url
$id = $_GET['id'];

// query data berdasarkan id
$d = query("SELECT * FROM data WHERE id = $id");
// var_dump($d);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
  <link rel="stylesheet" href="w3schools/style.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>


  <div class="w3-container containerw3">
    <h2>Detail Data</h2>

    <div class="w3-card-4 w3-dark-grey w3-center" style="width:20%">

      <div class="w3-container w3-center">
        <h3>Wanted</h3>
        <img src="img/<?= $d['gambar']; ?>" alt="Avatar" height="220" style="width:80%">
        <h5><?= $d['nama']; ?></h5>
        <h6>Email: <?= $d['email']; ?></h6>
        <h6>No. Hp : <?= $d['hp']; ?></h6>

        <div class="w3-section">
          <a href="ubah.php?id=<?= $d['id']; ?>"><button class="w3-button w3-green">Ubah</button></a>
          <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"><button class="w3-button w3-red">Hapus</button></a>
        </div>
        <a href="index.php"><button class="w3-button w3-black">kembali</button></a>
      </div>

    </div>
  </div>



</body>

</html>