<?php
// koneksi data base
$conn = mysqli_connect('localhost', 'root', '', 'doc');



// ambil isi data base
$result = mysqli_query($conn, "SELECT * FROM data");
// var_dump($result);


// ubah data menjadi array
// $row = mysqli_fetch_row($result);    //array numerik
// $row = mysqli_fetch_assoc($result);    //array associatif
// $row = mysqli_fetch_array($result);    //&&
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
// var_dump($rows);



// tampung ke dalam variabel
$data = $rows;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Data</h3>
  <table border="1" cellpadding="10" cellspasicing="0">
    <thead>
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No. HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <?php $i = 1;
    foreach ($data as $d) : ?>
      <tbody>
        <tr>
          <td><?= $i++; ?></td>
          <td><img src="img/<?= $d['gambar']; ?>" width="60" alt=""></td>
          <td><?= $d['nama']; ?></td>
          <td><?= $d['email']; ?></td>
          <td><?= $d['hp']; ?></td>
          <td>
            <a href="">Ubah</a> | <a href="">Hapus</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>

</html>