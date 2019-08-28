<?php
$autoload = __DIR__ . '/../src/generateDiff.php';
require_once $autoload;
use function Ogurchik\generateDiff\generateDiff;
use PHPUnit\Framework\TestCase;
class DiffTest extends TestCase
{
        /**
         * @dataProvider addProvider
         */
        public function testGenerateDiff($first, $second, $exp)
        {
            $this->assertSame($exp, generateDiff($first, $second));
        }
        public function addProvider()
        {
               $exp = "{
    host: hexlet.io
  - proxy: 123.234.53.22
  + verbose: 1
  + kolt: 240
  - timeout: 50 
  + timeout: 20 
}
";
               $first = "src/before.json";
               $second = "src/after.json";
               return [
                       [$first, $second, $exp]
               ];
        }
}

