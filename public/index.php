<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
require SERVICES_DIR . "Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

//$product = (new \app\models\Product())->getById(1);
$product = (new \app\models\Product())->getAll();
//var_dump($product);


