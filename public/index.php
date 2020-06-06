<?php
require __DIR__ . '/../config/config.php';
require SERVICES_DIR . 'Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new \models\Product();

var_dump($product);