<?php
session_start();
// koneksi file
require 'functions.php';
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}
// tampung ke dalam variabel
$data = query("SELECT * FROM data");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $data = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="w3schools/style.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h3>Data</h3>
    <div class="nul">
      <span><a href="tambah.php"><button class="w3-button w3-blue"><img src="icon/plus.svg" alt=""> Tambah Data</button></a><a href="logout.php"><button class="w3-button log w3-black">Logout</button></a></span>
      <form action="" class="cari" method="POST">
        <input type="text" name="keyword" placeholder="masukan keyword pencarian.." size="40" autocomplete="off" autofocus class="keyword">
        <button class="w3-button tombol-cari" type="submit" name="cari">Cari</button>
      </form>
    </div>
    <?php if (isset($_SESSION['eks'])) : ?>
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong><?php echo $_SESSION['eks']; ?></strong>
        <!-- <strong>Danger!</strong> Indicates a dangerous or potentially negative action. -->
      </div>
    <?php
      unset($_SESSION['eks']);
    endif; ?>
    <div class="tex">
      <table id="customers" border="1" cellpadding="10" cellspasicing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php if (empty($data)) : ?>
          <tr>
            <td colspan="4">
              <p>data tidak ditemukan</p>
            </td>
          </tr>
        <?php endif; ?>
        <?php $i = 1;
        foreach ($data as $d) : ?>
          <tbody>
            <tr>
              <td><?= $i++; ?></td>
              <td><img src="img/<?= $d['gambar']; ?>" alt=""></td>
              <td><?= $d['nama']; ?></td>
              <td>
                <a href="detail.php?id=<?= $d['id']; ?>"><button class="w3-button w3-blue">Details</button></a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>