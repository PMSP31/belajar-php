<?php

class Film extends Product implements InfoProduct
{
    public $hours;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $hours = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->hours = $hours;
    }

    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (USD {$this->harga})";
        return $str;
    }

    public function getInfoProduct()
    {
        $str = "Film : " . $this->getInfo() . " ~ {$this->hours} Hours.";
        return $str;
    }
}
