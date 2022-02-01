<?php

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
