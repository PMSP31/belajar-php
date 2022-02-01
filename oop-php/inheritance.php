<?php

// Class - Rangka dasar / bluprint untuk Object

use Product as GlobalProduct;

class Product
{
    // PROPERTY
    public $judul,
        $penulis,
        $penerbit,
        $harga,
        $page,
        $jam;

    // CONSTRUCTOR
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $page = 0, $jam = 0,)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->page = $page;
        $this->jam = $jam;
    }

    // METHOD
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // Inheritance  Problem
    /* public function getInfoProduct()
    {
        $str = "{$this->type} : {$this->judul} | {$this->getLabel()} (USD {$this->harga})";
        return $str;
    } */
}

// INHERITANCE
class Novel extends GlobalProduct
{
    public function getInfoProduct()
    {
        $str = "Novel : {$this->judul} | {$this->getLabel()} (USD {$this->harga}) - {$this->page} Page.";
        return $str;
    }
}

class Film extends GlobalProduct
{
    public function getInfoProduct()
    {
        $str = "Film : {$this->judul} | {$this->getLabel()} (USD {$this->harga}) - {$this->jam} Hours.";
        return $str;
    }
}

// Object Type
class showInfoProduct
{
    // Object Type
    public function show(Product $product)
    {
        $str = "{$product->judul} | {$product->getLabel()} (Rp. {$product->harga})";
        return $str;
    }
}

// Object ~ instansiasi dari Class
$product1 = new Novel("Dilan", 'Pidi Baiq', 'Falcon Pictures', 15000000, 125, 0);
$product2 = new Film("Spiderman", "Stanley", 'Columbia Pictures', 50000000, 0, 3.5);

echo $product1->getInfoProduct();
echo "<br>";
echo $product2->getInfoProduct();
