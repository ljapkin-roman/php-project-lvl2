<?php
namespace genDiff;

require __DIR__ ."/../vendor/autoload.php";
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class Parsers
{
        public $file;
        private $contentFile;
        public function __construct($file)
        {
                $this->file = $file;
                $this->contentFile = [];
        }
        public function parse()
        {
            $tmp = explode(".", $this->file);
            $extension = $tmp[count($tmp) - 1];
            if ($extension === "json") {
                    $this->contentFile = $this->parserJson($this->file);
            }
            if ($extension === "yml") {
                    $this->contentFile = $this->parserYml($this->file);
            }
            return $this->contentFile;
        }
        private function parserJson($file)
        {
            $result = json_decode(file_get_contents($file), true);
            if (json_last_error()) {
                throw new \Exception("{$pathToFile} is not valid json\n");
            }
            return $result;
        }
        private function parserYml($file)
        {
           return Yaml::parseFile($file); 
        }
}
