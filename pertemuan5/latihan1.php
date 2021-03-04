<?php
/* 
    Andi Rahman Hakim
    203040122
    github.com/uyuy06/pw2021_2030401
    Pertemuan 5( 23 Februari 2021 )
    Materi Minggu ini mempelajari mengenai Array
*/
?>

<?php 
// Array
// Variable yang dapat menampung banyak nilai
// Elemen pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan value
// keynya adalahinfex yang dimulai dari 0

// Membuat Array cara lama
$hari = array("Senin", "Selasa", "Rabu");
// cara Baru
$bulan = ["Januari", "Februari", "Maret"];
$arrl = [123, "tulisan", false];

// Menampilkan Array
// var_dump() / prin_r() 
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo "<br>";

// menampilkan 1 elemen pada array
// echo $arrl[0];
// echo "<br>";
// echo $bulan[1];

// menambahkan 1 elemen pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jum'at";
echo "<br>";
var_dump($hari);
?>