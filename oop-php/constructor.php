<?php

// Class - Rangka dasar / bluprint untuk Object
class Product
{
    // PROPERTY
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    // CONSTRUCTOR
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // METHOD
    public function getLabel()
    {
        return "$this->judul, $this->penerbit";
    }
}

// Object ~ instansiasi dari Class
$product1 = new Product("Dilan", 'Pidi Baiq', 'Falcon Pictures', 15000000);
$product2 = new Product("Spiderman", "Stanley", 'Sony Pictures', 50000000);

echo $product1->getLabel();
echo "<br>";
echo $product2->getLabel();
