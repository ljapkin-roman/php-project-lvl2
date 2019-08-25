<?php
$autoload = __DIR__ . '/../src/add.php';
require_once $autoload;
use PHPUnit\Framework\TestCase;
class AddTest extends TestCase
{
    public function testAdd()
    {
        $stack = [];
        $this->assertSame(8, add(3, 5));
        $this->assertSame(5, add(3, 2));
    }
}
