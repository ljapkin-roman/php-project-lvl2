<?php
$autoload = __DIR__ . '/../src/add.php';
require_once $autoload;
use PHPUnit\Framework\TestCase;
class AddTest extends TestCase
{
    /**
     * @dataProvider addProvider
     */
    public function testAdd($a, $b, $exp)
    {

        $this->assertSame($exp, add($a, $b));
    }
    public function addProvider()
    {
        return [
            [2, 3, 5],
            [4, 5, 9],
            [1, 1, 2]
        ];
    }
}
