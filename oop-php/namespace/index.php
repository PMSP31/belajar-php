<?php

require 'App/init.php';

/* $product1 = new Novel("Dilan", 'Pidi Baiq', 'Falcon Pictures', 15000000, 125);
$product2 = new Film("Spiderman", "Stanley", 'Columbia Pictures', 50000000, 3.5);

$products = new ShowInfoProduct();
$products->addProduct($product1);
$products->addProduct($product2);

echo $products->show();
*/

use App\Product\User as ProductUser;
use App\Service\User as ServiceUser;

new ProductUser();
new ServiceUser();
