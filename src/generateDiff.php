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
/*function getRemovedItem($firstArr, $secondArr)
{
        $removedItems = [];
        foreach ($seconArr as $index => $value) {
                if (!array_key_exists($index, $firstArr)) {
                        $removedItems[$index] = $value;
                }
        }
        return $removedItems;
}*/
function getChangeItem($firstArr, $secondArr)
{
        $changeItems = [];
        foreach ($secondArr as $index => $value) {
                if (array_key_exists($index, $firstArr) && $firstArr[$index] !== $secondArr[$index]) {
                   $changeItems[$index][] = $firstArr[$index]; 
                   $changeItems[$index][] = $secondArr[$index]; 
                }
        }
        return $changeItems;
}
function markupOutput($str, $sign = "", $arr)
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
    $sameItems = array_intersect_assoc($data1, $data2);
    $removedItems = array_diff_key($data1, $data2);
    $changedItems = getChangeItem($data1, $data2);
    $output = "{\n";
}
