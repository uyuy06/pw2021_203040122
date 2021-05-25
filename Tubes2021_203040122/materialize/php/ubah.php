<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data buku berdasarkan id
$book = query("SELECT * FROM tools WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

  // cek apakah data berhasil di ubahkan atau tidak
  if (ubah($_POST) > 0) {
    echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php';
			</script>
		";
  } else {
    echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'admin.php';
			</script>
		";
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
      background-color: white;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
      <h1>Form Ubah Data Store</h1>

      <form method="post" action="">
        <ul>
          <input type="hidden" name="id" id="id" value="<?= $book['id']; ?>">
          <li>
            <label for="Picture">Picture : </label> <br>
            <input type="file" name="Picture" id="Picture" required value="<?= $book["Picture"]; ?>"><br>
          </li>
          <li>
            <label for="Name">Name : </label>
            <input type="text" name="Name" id="Name" required value="<?= $book["Name"]; ?>"><br>
          </li>
          <li>
            <label for="Description">Duration : </label>
            <input type="text" name="Duration" id="Duration" required value="<?= $book["Duration"]; ?>"><br>
          </li>
          <li>
            <label for="Price">Price : </label>
            <input type="text" name="Price" id="Price" required value="<?= $book["Price"]; ?>"><br>
          <li>
          <li>
            <button type="submit" name="ubah">Ubah Data!</button>
            <button type="submit">
              <a href="admin.php" style="text-decoration: none; color:black;">Kembali</a>
            </button>
          </li>
        </ul>
      </form>
  </div>

</body>

</html>