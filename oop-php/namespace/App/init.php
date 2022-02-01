<?php

// Require semua Class
/* require 'Product/InfoProduct.php';
require 'Product/Product.php';
require 'Product/Novel.php';
require 'Product/Film.php';
require 'Product/ShowInfoProduct.php';
require 'Product/User.php';

require 'Service/User.php'; */

// Autoloading ~ memanggil semua file dalam folder
spl_autoload_register(function ($class) {
    // App\Product\User = ["App","Product","User"]
    $class = explode('\\', $class);
    // $class = User
    $class = end($class);
    require_once __DIR__ . '/Product/' . $class . '.php';
});

spl_autoload_register(function ($class) {
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Service/' . $class . '.php';
});
