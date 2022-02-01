<?php
/* 
// Constant ~ Variable yang nilainya tidak bisa berubah
// define tidak bisa dimasukan kedalam class, sehingga tidak bisa OOP
define('NAMA', 'Paul Mahardika');
// const dapat dimasukan kedalam class
const UMUR = 17;

echo NAMA;
echo UMUR; */

// penggunaan const dalam class
/* class Coba
{
    const NAMA = "Paul Mahardika";
}

// akses const dalam class sama seperti pemanggilan static
echo Coba::NAMA; */

// Magic Constant
echo __LINE__;
echo __FILE__;
echo __DIR__;
