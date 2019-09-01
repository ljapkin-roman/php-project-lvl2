<?php
namespace Ogurchik\parsers;

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
function getExtension($firstFile, $secondFile)
{

}
