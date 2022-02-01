<?php

// Class - Rangka dasar / bluprint untuk Object

use Product as GlobalProduct;

// Abstract Class
abstract class Product
{
    // PROPERTY
    private $judul,
        $penulis,
        $penerbit,
        $diskon = 0,
        $harga;

    // SETTER
    public function setJudul($judul)
    {
        $this->judul = $judul;
    }

    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }

    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

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

    // Abstract Method
    abstract public function getInfoProduct();

    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (USD {$this->harga})";
        return $str;
    }

    // GETTER
    public function getJudul()
    {
        return $this->judul;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function getPenerbit()
    {
        return $this->penerbit;
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
        $str = "Novel : " . $this->getInfo() . " - {$this->pages} Page.";
        return $str;
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
        $str = "Film : " . $this->getInfo() . " ~ {$this->hours} Hours.";
        return $str;
    }
}

// Object Type
class showInfoProduct
{
    public $listProduct = [];

    public function addProduct(Product $product)
    {
        $this->listProduct[] = $product;
    }

    public function show()
    {
        $str = "List Of Products : <br>";

        foreach ($this->listProduct as $lp) {
            $str .= "~ {$lp->getInfoProduct()} <br>";
        }

        return $str;
    }
}

// Object ~ instansiasi dari Class
$product1 = new Novel("Dilan", 'Pidi Baiq', 'Falcon Pictures', 15000000, 125);
$product2 = new Film("Spiderman", "Stanley", 'Columbia Pictures', 50000000, 3.5);

$products = new ShowInfoProduct();
$products->addProduct($product1);
$products->addProduct($product2);

echo $products->show();
