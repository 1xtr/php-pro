<?php


class Autoloader
{
    public function loadClass(string $classname)
    {
        $classname = preg_replace('/\\\\/', '/', $classname);
        $fileName = $_SERVER['DOCUMENT_ROOT'] . $classname . '.php';
        if (file_exists($fileName)) {
            require $fileName;
            return true;
        }
        return false;
    }
}