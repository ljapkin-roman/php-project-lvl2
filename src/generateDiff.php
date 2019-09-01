<?php
namespace Ogurchik\generateDiff;

use function Ogurchik\parsers\areSameExtensions;

function isFileExists($file)
{
    if (!file_exists($file)) {
        throw new \Exception("{$file} is not exists\n");
    }
}
function getValidJson($pathToFile)
{
    $result = json_decode(file_get_contents($pathToFile), true);
    if (json_last_error()) {
        throw new \Exception("{$pathToFile} is not valid json\n");
    }
    return $result;
}

function getChangeItem($firstArr, $secondArr)
{
        $changeItems = [];
    foreach ($secondArr as $index => $value) {
        if (array_key_exists($index, $firstArr) && $firstArr[$index] !== $secondArr[$index]) {
            $changeItems[] = "  - $index: $firstArr[$index]";
            $changeItems[] = "  + $index: $secondArr[$index]";
        }
    }
        return $changeItems;
}

function markupOutput($arr, $sign = "")
{
        $str = "";
    foreach ($arr as $index => $value) {
        switch ($sign) {
            case ("+"):
                $str .= "  + {$index}: {$value}\n";
                break;
            case (""):
                $str .= "    {$index}: {$value}\n";
                break;
            case ("-"):
                $str .= "  - {$index}: {$value}\n";
                break;
        }
    }
        return $str;
}

function generateDiff($pathToFirstFile, $pathToSecondFile)
{
        try {
            areSameExtensions($pathToFirstFile, $pathToSecondFile);
        } catch(Exception $e) {
        print_r("throw exception ".$e->getMessage());
            }
    isFileExists($pathToFirstFile);
    isFileExists($pathToSecondFile);
    $data1 = getValidJson($pathToFirstFile);
    $data2 = getValidJson($pathToSecondFile);
    $sameItems = array_intersect_assoc($data1, $data2);
    $removedItems = array_diff_key($data1, $data2);
    $addedItems = array_diff_key($data2, $data1);
    $changedItems = getChangeItem($data1, $data2);
    $output = "{\n";
    $output = $output . markupOutput($sameItems) . markupOutput($removedItems, "-") . markupOutput($addedItems, "+");
    foreach ($changedItems as $item) {
        $output .= "$item \n";
    }
    $output .= "}\n";
    print_r($output);
    return $output;
}
