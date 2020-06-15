<?php
namespace app\services;

require __DIR__ . '/../config/config.php';

class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass(string $classname)
    {
        var_dump($classname);
        $classname = str_replace('app\\', ROOT_DIR, $classname);
        $fileName = realpath("{$classname}{$this->fileExtension}");
        var_dump($fileName);
        var_dump($fileName);
        if (file_exists($fileName)) {
            require $fileName;
            return true;
        }
        return false;
    }
}
