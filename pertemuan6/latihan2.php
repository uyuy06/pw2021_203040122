<?php
/* 
    Andi Rahman Hakim
    203040122
    github.com/uyuy06/pw2021_203040122
    Pertemuan 6( 24 Februari 2021 )
    Materi Minggu ini mempelajari mengenai Associative Array
*/
?>

<?php
// $mahasiswa = [
//     ["Andi Rahman Hakim", "203040122", "TIF", "Andi Rahman Hakim"],
//     ["Leonardo Rmadani", "203040152", "TI", "LRtI@gmail.com"],
//     ["Satrio Wega", "203040153", "TM", "SWtM@gmail.com"]
// ];

// Array Associative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nama" => "Andi Rahman Hakim", 
        "nrp" => "203040122",
        "email" => "acliliitle166@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "uyuy.jpg"
    ],
    [
        "nama" => "Geraldi Pamungkas", 
        "nrp" => "203040152",
        "email" => "GPtM@gmail.com",
        "jurusan" => "Teknik Mesin",
        "gambar" => "uyuy.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    
<h1>Daftar Mahasiswa</h1>

<?php foreach ( $mahasiswa as $mhs ) : ?>
<ul>
    <li>
        <img src="img/<?= $mhs["gambar"]; ?>">
    </li>
    <li>Nama : <?= $mhs["nama"]; ?></li>
    <li>NRP : <?= $mhs["nrp"]; ?></li>  
    <li>Jurusan : <?= $mhs["email"]; ?></li>
    <li>Email : <?= $mhs["jurusan"]; ?></li>
</ul>
<?php endforeach; ?>

</body>
</html>