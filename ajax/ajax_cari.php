<?php
require '../functions.php';
// echo 'hello';

// $keyword = $_GET['keyword'];
// echo $keyword;

$data = cari($_GET['keyword']);
?>
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