<?php

// Class - Rangka dasar / bluprint untuk Object
class Product
{
    // PROPERTY
    // default value property
    public $judul = "judul",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0;

    // METHOD
    public function getLabel()
    {
        // ambil data dari class yang sama pada method
        return "$this->judul, $this->penerbit";
    }
}

// Object ~ instansiasi dari Class
/* $product1 = new Product();
// give value for property
$product1->judul = "Spiderman";
// var_dump($product1);

$product2 = new Product();
// if not assign value, will be set default value
// add new property
$product2->salam = "Halo";
var_dump($product2); */

$product3 = new Product();
$product3->judul = "Dilan";
$product3->penulis = "Pidi Baiq";
$product3->penerbit = "Falcon Pictures";
$product3->harga = 55000;

$product4 = new Product();
$product4->judul = "Spiderman";
$product4->penulis = "Stanley";
$product4->penerbit = "Sony Pictures";
$product4->harga = 1500000;

echo $product3->getLabel();
echo "<br>";
echo $product4->getLabel();
