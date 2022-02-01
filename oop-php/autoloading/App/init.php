<?php

// Require semua Class
/* require 'Product/InfoProduct.php';
require 'Product/Product.php';
require 'Product/Novel.php';
require 'Product/Film.php';
require 'Product/ShowInfoProduct.php'; */

// Autoloading ~ memanggil semua file dalam folder
spl_autoload_register(function ($class) {
    require 'Product/' . $class . '.php';
});
