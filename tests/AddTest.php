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
<<<<<<< HEAD
        $stack = [];
        $this->assertSame(8, add(3, 5));
        $this->assertSame(5, add(3, 2));
=======
        $this->assertSame($exp, add($a, $b));
    }
    public function addProvider()
    {
        return [
            [2, 3, 5],
            [4, 5, 9],
            [1, 1, 2]
        ];
>>>>>>> d4e8a6fffcfe9d32b561bcf148fd8ac7491d4f4a
    }
}
