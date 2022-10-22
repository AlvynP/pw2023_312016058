<?php

function conn()
{
  return mysqli_connect('localhost', 'root', '', 'doc');
}

function query($query)
{
  $conn = conn();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = conn();

  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $hp = htmlspecialchars($data['hp']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO data VALUES 
  (null, '$gambar', '$nama', '$email', '$hp')";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = conn();
  mysqli_query($conn, "DELETE FROM data WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function ubah($data)
{
  $conn = conn();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $hp = htmlspecialchars($data['hp']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE data SET nama = '$nama', email = '$email', hp = '$hp', gambar = '$gambar' WHERE id = $id";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = conn();

  $query = "SELECT * FROM data WHERE nama LIKE '%$keyword%' OR hp LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


function login($data)
{
  $conn = conn();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek username
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {

    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header('Location: index.php');
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password salah!<br>Silahkan<a href="registrasi.php"> buat akun</a> terlebih dahulu'
  ];
}


function register($data)
{
  $conn = conn();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username atau password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
                alert('username / password tida boleh kosong'); document.location.href = 'registrasi.php';
            </script>";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
                alert('username sudah terdaftar'); document.location.href = 'registrasi.php';
            </script>";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
                alert('konfirmasi password tidak sesuai'); document.location.href = 'registrasi.php';
            </script>";
    return false;
  }

  // jika password lebih kecil dari  digit
  if (strlen($password1) < 5) {
    echo "<script>
                alert('password terlalu pendek'); document.location.href = 'registrasi.php';
            </script>";
    return false;
  }

  // jika username dan password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // tambahkan ke database
  $query = "INSERT INTO user VALUES (null, '$username', '$password_baru')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}
