<?php
namespace Ogurchik\parsers;
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
function parserYml($file)
{
    try {
        $content = Yaml::parseFile($file);
    } catch (ParseException $exception) {
        printf("Unable to parse the Yaml file: %s", $exception->getMessage());
    }
}

function parserJson($file)
{
    $result = json_decode(file_get_contents($file), true);
    if (json_last_error()) {
        throw new \Exception("{$pathToFile} is not valid json\n");
    }
    return $result;

}
