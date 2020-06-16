<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
require SERVICES_DIR . "Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$product = new \app\models\Product();

//var_dump($product);