<?php
namespace Ogurchik\generateDiff;
require __DIR__ ."/../vendor/autoload.php";

use genDiff\CheckFiles;
use genDiff\Parsers;

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
    $check = new CheckFiles($pathToFirstFile, $pathToSecondFile);
    $firstFile = new Parsers($pathToFirstFile);
    $secondFile = new Parsers($pathToSecondFile);
    $firstContent = $firstFile->parse();
    $secondContent = $secondFile->parse();
    $sameItems = array_intersect_assoc($firstContent, $secondContent);
    $removedItems = array_diff_key($firstContent, $secondContent);
    $addedItems = array_diff_key($secondContent, $firstContent);
    $changedItems = getChangeItem($firstContent, $secondContent);
    $output = "{\n";
    $output = $output . markupOutput($sameItems) . markupOutput($removedItems, "-") . markupOutput($addedItems, "+");
    foreach ($changedItems as $item) {
        $output .= "$item \n";
    }
    $output .= "}\n";
    echo $output[false];
    return $output;
}
