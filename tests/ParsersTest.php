<?php
use function Ogurchik\parsers\areSameExtensions;
use PHPUnit\Framework\TestCase;
class ParsersTest extends TestCase
{
    public function testAreSameExtensions()
    {
            $first = "after.json";
            $second = "before.json";
            $this->assertTrue(areSameExtensions($first,$second));
            $this->expectException("This files have different extensions", areSameExtensions("groov.yml","hoop.json"));
            }            
            
}
