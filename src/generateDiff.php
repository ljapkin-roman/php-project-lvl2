<?php
namespace Ogurchik\generateDiff;

function isFileExists($file)
{
    print_r($file . "\n");
    if (!file_exists($file)) {
        throw new \Exception("{$file} is not exists");
    }
}
function getValidJson($str, $nameFile)
{
    $result = json_decode(file_get_contents($str), true);
    if (json_last_error()) {
        throw new \Exception("{$nameFile} is not valid json");
    }
    return $result;
}
function getRemovedItem($firstArr, $secondArr)
{
    
}
function generateDiff($firstFile, $secondFile)
{
    $pathToFirstFile ="./src/" . $firstFile;
    $pathToSecondFile ="./src/" . $secondFile;
    isFileExists($pathToFirstFile);
    isFileExists($pathToSecondFile);
    $data1 = getValidJson($pathToFirstFile, $firstFile);
    $data2 = getValidJson($pathToSecondFile, $secondFile);
    $sameItem = array_intersect_assoc($data1, $data2);
    $ = array_diff($data1, $data2);
    
}
