<?php 
//fungsi untuk melakukan koneksi ke database
function koneksi() {
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "tubes_pw_203040122");

    return $conn;
}

//function untuk melakukan query dan memasukannya ke dalam array
function query($sql) {
    $conn = koneksi();
    $result = mysqli_query($conn, $sql);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    $picture = htmlspecialchars($data['picture']);
    $name = htmlspecialchars($data['name']);
    $duration = htmlspecialchars($data['duration']);
    $price = htmlspecialchars($data['price']);

    $query = "INSERT INTO tools
				VALUES
			('', '$picture', '$name', '$duration', '$price')
			";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM tools WHERE id = $id");
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data["id"]);
    $picture = htmlspecialchars($data["Picture"]);
    $name = htmlspecialchars($data["Name"]);
    $duration = htmlspecialchars($data["Duration"]);
    $price = htmlspecialchars($data["Price"]);

    $query = "UPDATE tools SET
				Picture = '$picture',
				Name = '$name',
				Duration = '$duration',
				Price = '$price'
			    WHERE id = '$id'
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    $conn = koneksi();
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    //  cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah digunakan');
            </script>";
            return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru
    $query_tambah = "INSERT INTO user VALUES('', '$username', '$password')";
    mysqli_query($conn, $query_tambah);

    return mysqli_affected_rows($conn);
}
?>