<?php

class Novel extends Product implements InfoProduct
{
    public $pages;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $pages = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->pages = $pages;
    }

    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (USD {$this->harga})";
        return $str;
    }

    public function getInfoProduct()
    {
        $str = "Novel : " . $this->getInfo() . " - {$this->pages} Page.";
        return $str;
    }
}
