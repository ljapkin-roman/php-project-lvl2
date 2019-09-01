<?php
namespace Ogurchik\src\checkFiles;

function isFileExists($file)
{
    if (!file_exists($file)) {
        throw new \Exception("{$file} is not exists\n");
    }
    return true;
}

function areSameExtensions($firstFile, $secondFile)
{
        $tmp = explode(".", $firstFile);
        $ext1 = $tmp[count($tmp) - 1];
        $tmp = explode(".", $secondFile);
        $ext2 = $tmp[count($tmp) - 1];
        if ($ext1 === $ext2) {
                return true;
        }
        throw new \Exception("This files have different extensions");
}
