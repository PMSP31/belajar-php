<?php

// Class - Rangka dasar / bluprint untuk Object

use Product as GlobalProduct;

class Product
{
    /* 
        Visibility
        Public ~ bisa digunakan untuk semua class,
        Protected ~ hanya bisa digunakan pada class dan turunannya / inheritance,
        Private ~ hanya bisa digunakan pada class yang terkait
    */
    // PROPERTY
    public $judul,
        $penulis,
        $penerbit;
    protected $diskon = 0;
    private $harga;

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
        return "$this->penulis, $this->penerbit";
    }

    // Inheritance  Problem
    public function getInfoProduct()
    {
        $str = "{$this->judul} | {$this->getLabel()} (USD {$this->harga})";
        return $str;
    }

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

// INHERITANCE
class Novel extends GlobalProduct
{
    public $pages;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $pages = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->pages = $pages;
    }

    public function getInfoProduct()
    {
        $str = "Novel : " . parent::getInfoProduct() . " - {$this->pages} Page.";
        return $str;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }
}

class Film extends GlobalProduct
{
    public $hours;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $hours = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->hours = $hours;
    }

    public function getInfoProduct()
    {
        $str = "Film : " . parent::getInfoProduct() . " ~ {$this->hours} Hours.";
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
$product1 = new Novel("Dilan", 'Pidi Baiq', 'Falcon Pictures', 15000000, 125);
$product2 = new Film("Spiderman", "Stanley", 'Columbia Pictures', 50000000, 3.5);

echo $product1->getInfoProduct();
echo "<br>";
echo $product2->getInfoProduct();
echo "<hr>";

$product1->setDiskon(50);
echo $product1->getHarga();
