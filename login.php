<?php
session_start();
require 'functions.php';
if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

//  ketika tombol login di tekan
if (isset($_POST['login'])) {
  $login = login($_POST);
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
  <h3>Login</h3>
  <!-- A button to open the popup form -->
  <button class="open-button" onclick="openForm()">Open Form</button>

  <!-- The form -->
  <div class="form-popup" id="myForm">
    <form action="" method="POST" class="form-container">
      <h1>Login</h1>
      <?php if (isset($login['error'])) : ?>
        <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
      <?php endif; ?>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Email" id="username" autocomplete="off" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" id="psw" name="password" autocomplete="off" required>

      <button type="submit" name="login" class="btn">Login</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>


  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>
</body>

</html>