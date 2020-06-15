<?php
require $_SERVER['DOCUMENT_ROOT'] . "config/config.php";
require SERVICES_. "Autoloader.php";

use app\services\Autoloader;
use app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new Product();

var_dump($product);