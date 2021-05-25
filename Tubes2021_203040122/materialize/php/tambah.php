<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['tambah'])) {

  // cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'admin.php';
			</script>
		";
  } else {
    echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'admin.php';
			</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      background-color: black;
      color: white;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>Form Tambah Data</h3>
    <form action="" method="post">
      <ul>
        <li>
          <label for="name">Picture :</label><br>
          <input type="file" name="picture" id="picture" required><br><br>
        </li>
        <li>
          <label for="name">Name :</label><br>
          <input type="name" name="name" id="name" required><br><br>
        </li>
        <li>
          <label for="name">Description :</label><br>
          <input type="description" name="description" id="description" required><br><br>
        </li>
        <li>
          <label for="name">Price :</label><br>
          <input type="price" name="price" id="price" required><br><br>
        </li>
        <br>
        <button type="submit" name="tambah">Tambah Data!</button>
        <button type="submit">
          <a href="admin.php" style="text-decoration : none; color: black;">Kembali</a>
        </button>
      </ul>
    </form>
  </div>
</body>

</html>