<?php

namespace app\services;

class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass(string $classname)
    {
        $classname = str_replace('app\\', ROOT_DIR, $classname);
        $filename = $classname . $this->fileExtension;
        $filename = preg_replace('/\\\\/', '/', $filename);
        $filename = realpath($filename);
//        $classname = str_replace('app\\', ROOT_DIR, $classname);
//        $filename = realpath(`$classname . $this->fileExtension`);
        //var_dump($filename);
        if (file_exists($filename)) {
            require $filename;
            return true;
        }

        return false;
    }
}