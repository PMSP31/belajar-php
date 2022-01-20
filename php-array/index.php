<?php
// array
$hari = ["Minggu", 'Senin', 'Selasa', 'Rabu'];
$angka = [2, 7, 1, 5];

// menampilkan semua isi array
// var_dump() / print_r()
/* var_dump($hari);
echo "<br/>";
print_r($hari); */

// menampilkan 1 elemen
/* echo $hari[1];
echo $angka[3]; */

// menambahkan elemen baru pada array
var_dump($hari);
echo "<br/>";
$hari[] = "Kamis";
var_dump($hari);
