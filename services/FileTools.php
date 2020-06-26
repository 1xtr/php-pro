<?php


namespace app\services;


class FileTools
{
    public function getHash(string $string) :string
    {
        return md5($string . "a5n29s13a17");
    }

    public function checkImage(string $object) :bool
    {
        $regExpString = '/^((474946383[79]61)|(ffd8)|(89504e470d0a1a0a))/'; // строка поиска
        $fileData = unpack('H16', $this->getFirstBytes($object));
        $firstBytes = array_pop($fileData);
        if (preg_match($regExpString, $firstBytes)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $file
     * @param int $bytes
     * @return bool|false|string
     */
    public function getFirstBytes(string $file, int $bytes = 16) {
        unset($fileData);
        if (!$f = fopen($file, 'rb')) {
            return false;
        }
        $fileData = fread($f, $bytes);
        fclose($f);
        return $fileData;
    }
}